<?php 

    /* Member upgrade level 2 */
    function upgrade_user_level($uid){
        $user = digital_user_token(); 
        $token = $user->access_token;
        $api_url = env('DIGITAL_API').'/res.users/'.$uid;

        $curl = curl_init();
        
        curl_setopt_array($curl, array(
        CURLOPT_URL => $api_url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS => array(
            'login'         => env('DIGITAL_LOGIN'),
            'password'      => env('DIGITAL_PASSWORD'),
            'db'            => env('DIGITAL_DATABASE'),
            'user_level'    => '2'
        ),
        CURLOPT_HTTPHEADER => array(
            'access-token: '.$token,
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);
    }

    /* get user token from digital */
    function digital_user_token(){
        $api_url = env('DIGITAL_API').'/auth/token';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'login'             => env('DIGITAL_LOGIN'),
                'password'          => env('DIGITAL_PASSWORD'),
                'db'                => env('DIGITAL_DATABASE'),
                'source_of_origin'  => env('DIGITAL_SOURCE')
            ),
            CURLOPT_HTTPHEADER => array(
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);
    }

    /* new customer created at digital */
    function new_member_create($data){
        $user = digital_user_token(); 
        
        $token = $user->access_token;
        $api_url = env('DIGITAL_API').'/cus-registraction';

        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => $api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'login'             => env('DIGITAL_LOGIN'),
                'password'          => env('DIGITAL_PASSWORD'),
                'db'                => env('DIGITAL_DATABASE'),
                'mobile'            => $data->mobile,
                'name'              => $data->name,
                'nrc'               => $data->nrc,
                'dob'               => $data->dob,
                'gender'            => $data->gender,
                'city_id'           => $data->city_id,
                'township_id'       => $data->township_id,
                'state_id'          => $data->state_id,
                'street'            => $data->address,
                'nrc_front_photo'   => $data->nrc_front_photo,
                'nrc_back_photo'    => $data->nrc_back_photo,
                'face_photo'        => $data->selfie_photo
            ),
            CURLOPT_HTTPHEADER => array(
                'access-token: '.$token,
            ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        return json_decode($response);
    }

    /* Member status */
    function member_status($params){
        $today = date('Y-m-d');
        $response = array();
        $response['pending']    = array();
        $response['approved']   = array();
        $response['rejected']   = array();

        if($params == 'today'){
            $status = DB::table('members as m')
            ->select(DB::raw('m.status, COUNT(*) as total'))
            ->groupBy('m.status')
            ->where('registered_at','like',$today.'%')
            ->get();
        }else{
            $status = DB::table('members as m')
            ->select(DB::raw('m.status, COUNT(*) as total'))
            ->groupBy('m.status')
            ->get();
        }

        foreach ($status as $key => $value) {
            $key == 0 ? $response['pending'] = $value:$response['pending'] = array();
            $key == 1 ? $response['approved'] = $value:$response['approved'] = array();
            $key == 2? $response['rejected'] = $value:$response['rejected'] = array();
        }

        return $response;
    }

    /* Member status */
    function latest_member_lists($limit){
        $members = DB::table('members as m')
        ->select('id','name','ref','mobile','status','registered_at')
        ->orderBy('registered_at','desc')
        ->limit($limit)
        ->get();

        return $members;
    }

    /* Push notificatioins */
    function sendNewMemberNotification($title,$body){
        $firebaseToken = DB::table('users')->whereNotNull('device_token')->pluck('device_token')->all();

        $SERVER_API_KEY = env('SERVER_API_KEY');

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $title,
                "body" => $body,
                "content_available" => true,
                "priority" => "high",
                "icon"=>"https://www.royalx.net/assets/images/favicon.png",
                "image"=>"https://www.royalx.net/assets/images/favicon.png"
            ]
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, env('SERVER_API'));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);

       //dd($response);
    }

    /* generate tokens */
    function generateRandomString($length = 20) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /* AES encryption */
    function encryptcode($data) {
        $options = 0;
        $encryptedValue = openssl_encrypt($data, env('CIPHER_VALUE'), env('SECRET_KEY'), $options, env('IV_VALUE'));

        return $encryptedValue;  
    }

    /* AES decryption */
    function decryptcode($data){ 
        $options = 0;
        $decryptedValue = openssl_decrypt($data, env('CIPHER_VALUE'), env('SECRET_KEY'), $options, env('IV_VALUE'));

        return $decryptedValue;  
    }

    /* Download digital data */
    function downloaded_digital_data($start,$end){
        $user       = digital_user_token(); 
        $token      = $user->access_token;

        $api_url    = env('DIGITAL_API').'/contact-cus/read';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'login'         => env('DIGITAL_LOGIN'),
                'password'      => env('DIGITAL_PASSWORD'),
                'db'            => env('DIGITAL_DATABASE'),
                'from_date'     => '\''.$start.'\'',
                'to_date'       => '\''.$end.'\''
            ),
            CURLOPT_HTTPHEADER => array(
                'access-token: '.$token,
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);
    }

    function status($status){
        if($status == 0){
            return '<span class="badge rounded-pill bg-warning">pending</span>';
        }else if($status == 1){
            return '<span class="badge rounded-pill bg-success">approved</span>';
        }else{
            return '<span class="badge rounded-pill bg-danger">rejected</span>';
        }

    }

    /** user folder  **/
	function folder($role){
        if($role == 1){
			//Admin
			return 'admin';
		}elseif($role == 2){
			//Staff
			return 'staff';
		}
    }

    function profile(){
        $user  = DB::table('users as u')->where('u.id',Auth::id())->first();

        return $user;
    }

    function assets(){
        $user   = profile();
        $asset  = folder($user->role);

        return $asset;
    }

    function check_customer_type($ref){
        $code = substr($ref,0,3);

        if(str_contains($code,"E")){
            return 'ecommerce';
        }elseif(str_contains($code,"PUB")){
            return 'publisher';
        }elseif(str_contains($code,"BP")){
            return 'business';
        }elseif(str_contains($code,"CC")){
            return 'corporate customer';
        }else{
            return 'individual';
        }
    }

    function uuid(){
        return sprintf( '%04x-%04x%04x-%04x%04x%04x',
            // 32 bits for "time_low"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
        
            // 16 bits for "time_mid"
            mt_rand( 0, 0xffff ),
        
            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand( 0, 0x0fff ) | 0x4000,
        
            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand( 0, 0x3fff ) | 0x8000,
        
            // 48 bits for "node"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
        );
    }

    function getRandomStringRand($length = 12){
        $stringSpace = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $stringLength = strlen($stringSpace);
        $randomString = '';
        for ($i = 0; $i < $length; $i ++) {
            $randomString = $randomString . $stringSpace[rand(0, $stringLength - 1)];
        }
        return $randomString;
    }

 ?>