//checked auth
        $member = DB::table('members')->where('id',$membership_id)->first();
        if($member){
            if($member->active == 1){
                $token = DB::table('tokens')->where('membership_id',$member->id)->first();
                if($token){
                    if($today > $token->expired_at){
                        //member token expired
                        $http_code              = 401;
                        $response['success']    = 1;
                        $response['message']    = "Token is expired.";
                        
                    }else{
                        //response member info
                        $data['membership_id']      = $member->id;
                        $data['digital_id']         = $member->digital_id;
                        $data['name']               = $member->name;
                        $data['mobile']             = $member->mobile;
                        $data['login']              = $member->ref;
                        $data['nrc']                = $member->nrc;
                        $data['dob']                = $member->dob;
                        $data['gender']             = $member->gender;
                        $data['state']              = array($member->state_id,$member->state_name);
                        $data['township']           = array($member->township_id,$member->township_name);
                        $data['selfie_photo']       = $member->selfie_photo;
                        $data['nrc_front_photo']    = $member->nrc_front_photo;
                        $data['nrc_back_photo']     = $member->nrc_back_photo;
                        $data['user_level']         = $member->user_level;
                        $data['address']            = $member->address;
                        $data['comment']            = $member->note;
                        $data['registered_at']      = $member->created_at;
                        $data['token']              = $token->token;
                        $data['expired_at']         = $token->expired_at;

                        $http_code                  = 200;
                        $response['success']        = 1;
                        $response['message']        = "Member info";
                        $response['data']           = $data;
                    } 
                }else{
                    //member token expired
                    $http_code              = 401;
                    $response['success']    = 1;
                    $response['message']    = "Token is invalid.";
                }
            }else{
                //invalid member info
                $http_code              = 401;
                $response['success']    = 0;
                $response['message']    = "your account has been suspended.";
            }
        }else{
            //invalid member info
            $http_code              = 401;
            $response['success']    = 0;
            $response['message']    = "User not found in our system.";
        }