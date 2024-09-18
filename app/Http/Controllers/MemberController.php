<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Auth;

class MemberController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {   
        $asset = assets();
        $member = DB::table('members')->where('id',$id)->first();

        return view($asset.'.members.view',compact('member'));
    }

    public function edit(string $id)
    {
       
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    public function digital_data(){
        $asset = assets();
        $json = 'json/digital-data';

        return view($asset.'.digital-data.list',compact('json'));
    }

    public function members_status($status){
        $asset = assets();
        $json = 'json/members/'.$status;

        return view($asset.'.members.list',compact('json','status'));
    }

    public function json_digital_data(){
        $members = DB::table('digital_members')->orderBy('id','asc')->paginate(100);

        return response()->json($members);
    }

    public function json_members_status($status){
        if($status == 'unverified'){
            $members = DB::table('members')->select('id','digital_id','name','mobile','ref','status','active','registered_at','user_level')->where('status',0)->orderBy('id','desc')->paginate(200);
        }else if($status == 'processing'){
            $members = DB::table('members')->select('id','digital_id','name','mobile','ref','status','active','registered_at','user_level')->where('status',1)->orderBy('id','desc')->paginate(200);
        }else if($status == 'verified'){
            $members = DB::table('members')->select('id','digital_id','name','mobile','ref','status','active','registered_at','user_level')->where('status',2)->orderBy('id','desc')->paginate(200);
        }else if($status == 'rejected'){
            $members = DB::table('members')->select('id','digital_id','name','mobile','ref','status','active','registered_at','user_level')->where('status',3)->orderBy('id','desc')->paginate(200);
        }else{
            $members = DB::table('members')->select('id','digital_id','name','mobile','ref','status','active','registered_at','user_level')->orderBy('id','desc')->paginate(200);
        }
        

        return response()->json($members);
    }

    public function saveToken(Request $request)
    {
        //echo $request->token;
        $id = Auth::user()->id;
        DB::table('users')->where('id',$id)->update([
            'device_token'=>$request->token
        ]);
        return response()->json(['token saved successfully.']);
    }


    public function sendNotification(Request $request)
    {
        $firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();

        $SERVER_API_KEY = 'AAAAvUdCiVE:APA91bGck9BpN58Q71Op8xTy9zf1czOFAVl3_sB7vgNOFinuhy5x7hu41s96N9ILMVhp082nK7jy_Euba7EHSkfnlDo-7xbGY6QO4ex1kATZzCGhSdnF3dvLF_BZxINr-JNHxJ_8vsAAk-k2lgtCjQpcCgiXUc6NhA';

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => 'Testing',
                "body" => 'hello testing',
                "content_available" => true,
                "priority" => "high",
            ]
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);

        dd($response);
    }

    public function push_notifications(Request $request){
        return view('notifications.form');
    }

    public function member_logs(){
        $asset = assets();
        $json = 'json/member-logs';

        return view($asset.'.members.logs',compact('json'));
    }

    public function json_member_logs(){
        $logs = DB::table('member_logs')->orderBy('id','desc')->paginate(200);

        return response()->json($logs);
    }

    public function download_digital_data(Request $request){
        $response   = array();
        $total      = 0;
        $start      = $request->start_date;
        $end        = $request->end_date;


        $data = downloaded_digital_data($start,$end);

        foreach($data as $member){
            $check = DB::table('digital_members')->select('mobile')->where('mobile',$member->mobile)->first();

            if(!$check){
                $total++;
                DB::table('digital_members')->insert([
                    'digital_id'        => $member->uid,
                    'icode'             => $member->login,
                    'name'              => $member->name,
                    'mobile'            => $member->mobile,
                    'state_name'        => $member->state,
                    'address'           => $member->address,
                    'nrc'               => $member->nrc,
                    'nrc_front_photo'   => $member->nrc_front_photo,
                    'nrc_back_photo'    => $member->nrc_back_photo,
                    'selfie_photo'      => $member->face_photo,
                    'active'            => $member->active,
                    'sync'              => 0,
                    'created_at'        => date('Y-m-d H:i:s'),
                    'updated_at'        => date('Y-m-d H:i:s'),
                ]);
            }else{
                DB::table('digital_members')->where('mobile',$member->mobile)->update([
                    'icode'             => $member->login,
                    'name'              => $member->name,
                    'state_name'        => $member->state,
                    'address'           => $member->address,
                    'nrc'               => $member->nrc,
                    'nrc_front_photo'   => $member->nrc_front_photo,
                    'nrc_back_photo'    => $member->nrc_back_photo,
                    'selfie_photo'      => $member->face_photo,
                    'active'            => $member->active,
                    'sync'              => 0,
                    'created_at'        => date('Y-m-d H:i:s'),
                    'updated_at'        => date('Y-m-d H:i:s'),
                ]);
            }
        }

        $response['start']      = $start;
        $response['end']        = $end;
        $response['message']    = 'Total '.$total.' records have been downloaded.';

        return response()->json($response);

    }

    public function synced_data_with_digital(Request $request){
        $update      = 0;
        $create      = 0;
        $digital_members = DB::table('digital_members')->where('sync','0')->orderBy('id','asc')->limit($request->limit)->get();
    
        foreach($digital_members as $member){
            $check = DB::table('members')->where('mobile',$member->mobile)->first();
            if($check){
                //updated member data
                ++$update;
                $id = DB::table('members')->where('mobile',$member->mobile)->update([
                    //'uid'               => 0,
                    'name'              => $check->name,
                    'mobile'            => $check->mobile,
                    'nrc'               => $check->nrc,
                    //'dob'             => $check->dob,
                    //'gender'          => $check->gender,
                    'state_name'        => $check->state_name,
                    'city_name'         => $check->city_name,
                    'township_name'     => $check->township_name,
                    'address'           => $check->address,
                    'nrc_front_photo'   => $check->nrc_front_photo,
                    'nrc_back_photo'    => $check->nrc_back_photo,
                    'selfie_photo'      => $check->selfie_photo,
                    //'user_level'      => 1,
                    'status'            => 1,
                    'active'            => $check->active,
                    'created_at'        => date('Y-m-d H:i:s'),
                    'updated_at'        => date('Y-m-d H:i:s'),
                ]);
            }else{
                //created new member data
                ++$create;
                $id = DB::table('members')->insertGetId([
                    'digital_id'        => $member->digital_id,
                    'name'              => $member->name,
                    'mobile'            => $member->mobile,
                    'icode'             => $member->icode,
                    'passcode'          => '',
                    'nrc'               => $member->nrc,
                    'dob'               => $request->dob,
                    'gender'            => $request->gender,
                    'state_name'        => $member->state_name,
                    'city_name'         => $member->city_name,
                    'township_name'     => $member->township_name,
                    'address'           => $member->address,
                    'nrc_front_photo'   => $member->nrc_front_photo,
                    'nrc_back_photo'    => $member->nrc_back_photo,
                    'selfie_photo'      => $member->selfie_photo,
                    //'user_level'        => 1,
                    'status'            => 1,
                    'active'            => $member->active,
                    'created_at'        => date('Y-m-d H:i:s'),
                    'updated_at'        => date('Y-m-d H:i:s'),
                ]);
            }

            //update sync status
            DB::table('digital_members')->where('id',$member->id)->update([
                'sync' => 1,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            
        }

        $response['success'] = 1;
        $response['message'] = 'Records new('.$create.') and update('.$update.') has been synced.';

        return response()->json($response);
    }

    public function member_tokens(){
        $asset = assets();
        $json = 'json/member-tokens';

        return view($asset.'.members.tokens',compact('json'));
    }

    public function json_member_tokens(){
        $tokens = DB::table('tokens')
        ->leftjoin('members','members.id','=','tokens.membership_id')
        ->select('members.id','members.name','members.ref','tokens.token','tokens.created_at','tokens.expired_at')
        ->orderBy('tokens.id','desc')
        ->paginate(200);

        return response()->json($tokens);
    }

    public function member_histories($id){
        $asset = assets();
        $member = DB::table('members')->where('id',$id)->first();
        $histories = DB::table('histories')->where('membership_id',$id)->get();

        return view($asset.'.members.history',compact('member','histories'));
    }
    
    public function search_member($term){
        $members = DB::table('members as m')
            ->orWhere('m.name','like',$term.'%')
            ->orWhere('m.mobile','like',$term.'%')
            ->orWhere('m.ref','like',$term.'%')
            ->orWhere('m.nrc','like',$term.'%')
            ->orWhere('m.dob','like',$term.'%')
            ->orderBy('m.id','desc')
            ->paginate(100);

        return response()->json($members);
    }

}
