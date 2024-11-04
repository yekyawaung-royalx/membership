<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{
    /* check member's mobile number is exsits to register */
    public function check_mobile_to_register(Request $request){
        $response       = array();
        $mobile         = $request->mobile;
        $required       = array();
        $validate       = 1;

        $request->mobile =='' ? array_push($required,'mobile is required'):$validate -= 1;

        if($validate == 0){
            $member = DB::table('members')->select('mobile')->where('mobile',$mobile)->first();
            if(!$member){
                //ready for new member and continue otp process
                $http_code              = 200;
                $response['success']    = 1;
                $response['message']    = "Mobile is available to register.";
            }else{
                //already member
                $http_code              = 200;
                $response['success']    = 0;
                $response['message']    = "Mobile is already exists.";
            }
        }else{
            //required fields
            $http_code              = 200;
            $response['success']    = 0;
            $response['message']    = $required;
        }

        return response()->json($response, $http_code);
    }

    /* check member's mobile number is exsits for OTP */
    public function check_mobile_to_send_otp(Request $request){
        $response       = array();
        $mobile         = $request->mobile;
        $required       = array();
        $validate       = 1;

        $request->mobile =='' ? array_push($required,'mobile is required'):$validate -= 1;

        if($validate == 0){
            $member = DB::table('members')->select('id','mobile')->where('mobile',$mobile)->first();
            if($member){
                //saved member action logs
                $id = DB::table('member_logs')->insertGetId([
                    'membership_id'     => $member->id,
                    'slug'              => 'otp',
                    'source'            => 'mobile',
                    'log'               => 'OPT requested by '.$mobile.'.',
                    'created_at'        => date('Y-m-d H:i:s'),
                    'updated_at'        => date('Y-m-d H:i:s'),
                ]);

                $token = DB::table('tokens')->where('membership_id',$member->id)->first();
                if($token){
                    $get_token = DB::table('tokens')->where('membership_id',$member->id)->first()->token;
                 }else{
                    //create new token
                    $get_token = encryptcode(generateRandomString());

                    //create new token (lifetime for 1 day)
                    DB::table('tokens')->insertGetId([
                        'membership_id'     => $member->id,
                        'token'             => $get_token,
                        'expired_at'        => date('Y-m-d H:i:s',strtotime("+ 1 day")),
                        'created_at'        => date('Y-m-d H:i:s'),
                        'updated_at'        => date('Y-m-d H:i:s'),
                    ]);
                }

                //ready for new member and continue otp process
                $http_code                  = 200;
                $response['success']        = 1;
                $response['membership_id']  = $member->id;
                $response['token']          = $get_token;
                $response['message']        = "We sent OTP to your mobile number.";
            }else{
                //already member
                $http_code              = 200;
                $response['success']    = 0;
                $response['message']    = "Mobile number not found in our system.";
            }
        }else{
            //required fields
            $http_code              = 403;
            $response['success']    = 0;
            $response['message']    = $required;
        }

        return response()->json($response, $http_code);
    }

    /* get token for registered member */
    public function get_token(Request $request){
        $today      = date('Y-m-d H:i:s');
        $response   = array();
        $login      = $request->login;
        $passcode   = encryptcode($request->passcode);

        $token = $request->header('token');
        //check token in header
        if($token){
            $check = DB::table('tokens')->where('membership_id',$id)->where('token',$token)->first();
                if($check){
                    //member login success
                    if($today < $check->expired_at){
                        $member = DB::table('members')->where('id',$id)->where('passcode',$old_passcode)->first();
                        if($member){
                                //member login
                                DB::table('members')->where('id',$id)->update([
                                    'passcode'      => $new_passcode,
                                    'updated_at'    => date('Y-m-d H:i:s'),
                                ]);

                                //saved member action logs
                                $id = DB::table('member_logs')->insertGetId([
                                    'membership_id'     => $id,
                                    'slug'              => 'passcode',
                                    'source'            => 'mobile',
                                    'log'               => 'Passcode has been changed by '.$member->name.'.',
                                    'created_at'        => date('Y-m-d H:i:s'),
                                    'updated_at'        => date('Y-m-d H:i:s'),
                                ]);

                                $http_code              = 200;
                                $response['success'] = 1;
                                $response['message']    ="New passcode has been changed.";
                        }else{
                                //invalid member
                                $http_code              = 401;
                                $response['success'] = 0;
                                $response['message']    = "Old passcode is invalid.";
                        }
                    }else{
                        //member token expired
                        $http_code              = 401;
                        $response['success']    = 1;
                        $response['message']    = "Token is expired.";
                    } 
                }else{
                  //invalid token
                    $http_code              = 401;
                    $response['success']    = 0;
                    $response['message']    = "Token is invalid.";  
                }
        }else{
            //missing token in header
            $http_code              = 401;
            $response['success']    = 0;
            $response['message']    = "Missing token in header.";
        }

        return response()->json($response, $http_code);
    }

    /* member login */
    public function member_login(Request $request){
        $response = array();
        $data     = array();
        $today    = date('Y-m-d H:i:s');
        $login    = $request->login;
        $passcode = encryptcode($request->passcode);

        //checked auth
        $member = DB::table('members')->select(
            'id','digital_id','name','user_level','mobile','ref','passcode','nrc','dob',
            'user_level','address','note','registered_at','active'
        )->orWhere('ref',$login)->orWhere('mobile',$login)->first();

        if($member){
            if($member->passcode == $passcode){
                if($member->active == 1){
                    $token = DB::table('tokens')->where('membership_id',$member->id)->first();
                    if($token){
                        if($today > $token->expired_at){
                            //generate new token 
                            $new_token = encryptcode(generateRandomString());

                            //update new token (lifetime for 1 day)
                            DB::table('tokens')->where('membership_id',$member->id)->update([
                                'token'         => $new_token,
                                'expired_at'    => date('Y-m-d H:i:s',strtotime("+ 1 day")),
                                'updated_at'    => date('Y-m-d H:i:s'),
                            ]);
                            
                        }else{
                            //get current token
                        } 
                    }else{
                        //create new token
                        $new_token = encryptcode(generateRandomString());

                        //create new token (lifetime for 1 day)
                        DB::table('tokens')->insertGetId([
                            'membership_id'     => $member->id,
                            'token'             => $new_token,
                            'expired_at'        => date('Y-m-d H:i:s',strtotime("+ 1 day")),
                            'created_at'        => date('Y-m-d H:i:s'),
                            'updated_at'        => date('Y-m-d H:i:s'),
                        ]);
                    }

                    $get_token = DB::table('tokens')->where('membership_id',$member->id)->first();

                    //response member info
                    $data['membership_id']  = $member->id;
                    $data['id']             = $member->digital_id;
                    $data['login']          = $member->ref;
                    $data['company_type']   = check_customer_type($member->ref);
                    $data['token']          = $get_token->token;
                    $data['expired_at']     = $get_token->expired_at;

                    $http_code              = 200;
                    $response['success']    = 1;
                    $response['message']    = "Member login successful";
                    $response['user']       = $data;
                }else{
                    //invalid member info
                    $http_code              = 401;
                    $response['success']    = 0;
                    $response['message']    = "Your account has been suspended.";
                }      
            }else{
                //invalid member info
                $http_code              = 401;
                $response['success']    = 0;
                $response['message']    = "These credentials do not match our records.";
            }
        }else{
            //invalid member info
            $http_code              = 401;
            $response['success']    = 0;
            $response['message']    = "User not found in our system.";
        }

       return response()->json($response,$http_code);
    }

    /* profile */
    public function profile(Request $request){
        $today      = date('Y-m-d H:i:s');
        $response   = array();
        $required   = array();
        $validate   = 1;

        $request->membership_id =='' ? array_push($required,'membership_id is required'):$validate -= 1;
        $token = $request->header('token');
           
        if($token){
            $member = DB::table('members')->where('id',$request->membership_id)->first();
            if($member){
                if($member->active == 1){
                    $token = DB::table('tokens')->where('membership_id',$request->membership_id)->where('token',$token)->first();
                    if($token){
                        if($today > $token->expired_at){
                            //member token expired
                            $http_code              = 401;
                            $response['success']    = 1;
                            $response['message']    = "Token is expired.";
                            
                        }else{
                            //response member info
                            $data['membership_id']      = $member->id;
                            $data['id']                 = $member->digital_id;
                            $data['name']               = $member->name;
                            $data['mobile']             = $member->mobile;
                            $data['company_type']       = check_customer_type($member->ref);
                            $data['ref']                = $member->ref;
                            $data['nrc']                = $member->nrc;
                            $data['dob']                = $member->dob;
                            $data['gender']             = $member->gender;
                            $data['state']              = array($member->state_id,$member->state_name);
                            $data['city']               = array($member->city_id,null);
                            $data['township']           = array($member->township_id,$member->township_name);
                            $data['selfie_photo']       = $member->selfie_photo;
                            $data['nrc_front_photo']    = $member->nrc_front_photo;
                            $data['nrc_back_photo']     = $member->nrc_back_photo;
                            $data['user_level']         = $member->user_level;
                            $data['status']              = member_kyc_status($member->status);
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
                    $response['message']    = "Your account has been suspended.";
                }
            }else{
                //invalid member info
                $http_code              = 401;
                $response['success']    = 0;
                $response['message']    = "User not found in our system.";
            }
        }else{
            //missing token in header
            $http_code              = 401;
            $response['success']    = 0;
            $response['message']    = "Missing token in header.";
        }

        return response()->json($response,$http_code);
    }

    /* member registration */
    public function member_register(Request $request){
        $data     = array();
        $response = array();
        $required = array();
        $validate = 12;

        $request->name              =='' ? array_push($required,'name is required'):$validate -= 1;
        $request->mobile            =='' ? array_push($required,'mobile is required'):$validate -= 1;
        $request->passcode          =='' ? array_push($required,'passcode is required'):$validate -= 1;
        $request->nrc               =='' ? array_push($required,'nrc is required'):$validate -= 1;
        $request->dob               =='' ? array_push($required,'dob is required'):$validate -= 1;
        $request->gender            =='' ? array_push($required,'gender is required'):$validate -= 1;
        $request->state_id          =='' ? array_push($required,'state_id is required'):$validate -= 1;
        $request->township_id       =='' ? array_push($required,'township_id is required'):$validate -= 1;
        $request->address           =='' ? array_push($required,'address is required'):$validate -= 1;
        $request->nrc_front_photo   =='' ? array_push($required,'nrc_front_photo is required'):$validate -= 1;
        $request->nrc_back_photo    =='' ? array_push($required,'nrc_back_photo is required'):$validate -= 1;
        $request->selfie_photo      =='' ? array_push($required,'selfie_photo is required'):$validate -= 1;

        if($validate == 0){
            $mobile           = $request->mobile;

            $member = DB::table('members')->select('mobile')->where('mobile',$mobile)->first();
            if($member){

                $http_code              = 403;
                $response['success']    = 0;
                $response['message']    = "Already member.";
            }else{
                $passcode = encryptcode($request->passcode);

                //state
                $state = DB::table('regions')->select('digital_id','en_name')->where('id',$request->state_id)->first();
                //township
                $township = DB::table('townships')->select('digital_id','digital_city_id','en_name')->where('id',$request->township_id)->first();

                //register for new member
                $id = DB::table('members')->insertGetId([
                    'name'              => $request->name,
                    'mobile'            => $request->mobile,
                    'passcode'          => $passcode,
                    'nrc'               => $request->nrc,
                    'dob'               => $request->dob,
                    'gender'            => $request->gender,
                    'state_id'          => $state->digital_id,
                    'state_name'        => $state->en_name,
                    'city_id'           => $township->digital_city_id,
                    'township_id'       => $township->digital_id,
                    'township_name'     => $township->en_name,
                    'address'           => $request->address,
                    'nrc_front_photo'   => $request->nrc_front_photo,
                    'nrc_back_photo'    => $request->nrc_back_photo,
                    'selfie_photo'      => $request->selfie_photo,
                    'user_level'        => 1,
                    'status'            => 0,
                    'active'            => 1,
                    'registered_at'     => date('Y-m-d H:i:s'),
                    'created_at'        => date('Y-m-d H:i:s'),
                    'updated_at'        => date('Y-m-d H:i:s'),
                ]);



                $new_member = DB::table('members')->where('id',$id)->first();
                if($new_member){
                    $new = new_member_create($new_member);

                    //updated digital_id and ref
                    $member = DB::table('members')->where('id',$id)->update([
                        'digital_id'    => $new->id,
                        'ref'           => $new->login,
                        'status'        => 0,
                        'registered_at' => array_key_exists('created_at',(array) $new)? $new->created_at:date('Y-m-d H:i:s'),
                        'updated_at'    => date('Y-m-d H:i:s')
                    ]);
                }

                //saved member action logs
                DB::table('member_logs')->insertGetId([
                    'membership_id'     => $id,
                    'ref'     => $new->login,
                    'slug'              => 'register',
                    'source'            => 'mobile',
                    'log'               => 'New member '.$request->name.' has been registered.',
                    'created_at'        => date('Y-m-d H:i:s'),
                    'updated_at'        => date('Y-m-d H:i:s'),
                ]);

                //generate new token
                $new_token = encryptcode(generateRandomString());
                $expired_at = date('Y-m-d H:i:s',strtotime("+ 1 day"));

                //created member's token into token table
                DB::table('tokens')->insertGetId([
                    'membership_id' => $id,
                    'ref'           => $new->login,
                    'token'         => $new_token,
                    'expired_at'    => $expired_at,
                    'created_at'    => date('Y-m-d H:i:s'),
                    'updated_at'    => date('Y-m-d H:i:s'),
                ]);

                $data['membership_id']  = $id;
                $data['id']             = $new->id;
                $data['login']          = $new->login;  
                $data['name']           = $request->name;    
                $data['mobile']         = $request->mobile;
                $data['token']          = $new_token;
                $data['expired_at']     = $expired_at;

                sendNewMemberNotification('Membership Registration',$request->name.' has been registered.');

                //save register into laravel.log
                Log::info((array)$new);

                //member registration successful
                $http_code              = 201;
                $response['success']    = 1;
                $response['message']    = "New member has been registered";
                $response['data']       = $data;
            }
        }else{
            //required fields
            $http_code              = 200;
            $response['success']    = 0;
            $response['message']    = $required;
        }

       return response()->json($response, $http_code);
    }
    
    /* reset member's passcode */
    public function member_passcode_reset(Request $request){
        $response = array();
        $required = array();
        $validate = 2;

        $token = $request->header('token');
        $request->mobile        =='' ? array_push($required,'mobile is required'):$validate -= 1;
        $request->passcode      =='' ? array_push($required,'passcode is required'):$validate -= 1;

        $id          = $request->membership_id;
        $passcode    = encryptcode($request->passcode);

        if($token){
            $token = DB::table('tokens')->where('token',$token)->first();
            if($token){   
                if($validate == 0){
                    $member = DB::table('members')->where('mobile',$request->mobile)->first();
                    if($member){
                        //update new passcode
                        DB::table('members')->where('id',$member->id)->update([
                            'passcode'      => $passcode,
                            'updated_at'    => date('Y-m-d H:i:s'),
                        ]);

                        //saved member action logs
                        $id = DB::table('member_logs')->insertGetId([
                            'membership_id'     => $member->id,
                            'slug'              => 'passcode',
                            'source'            => 'mobile',
                            'log'               => 'Passcode has been reset by '.$member->name.'.',
                            'created_at'        => date('Y-m-d H:i:s'),
                            'updated_at'        => date('Y-m-d H:i:s'),
                        ]);
                        
                        $http_code              = 200;
                        $response['success']    = 1;
                        $response['message']    = "Passcode has been reset.";
                }else{
                        //invalid member
                        $response['success'] = 0;
                        $response['message']    = "Invalid user.";
                }
                }else{
                    $http_code              = 403;
                    $response['success']    = 0;
                    $response['message'] = $required;
                }
            }else{
                $http_code              = 401;
                $response['success']    = 1;
                $response['message']    = "Token is invalid.";
            }
        }else{
            //missing token in header
            $http_code              = 401;
            $response['success']    = 0;
            $response['message']    = "Missing token in header.";
        }

       return response()->json($response);
    }

    /* change member's passcode */
    public function member_passcode_change(Request $request){
        $today      = date('Y-m-d H:i:s');
        $response   = array();
        $required   = array();
        $validate   = 3;

        $request->membership_id =='' ? array_push($required,'membership_id is required'):$validate -= 1;
        $request->old_passcode  =='' ? array_push($required,'old_passcode is required'):$validate -= 1;
        $request->new_passcode  =='' ? array_push($required,'new_passcode is required'):$validate -= 1;

        $id                 = $request->membership_id;
        $old_passcode       = encryptcode($request->old_passcode);
        $new_passcode       = encryptcode($request->new_passcode);

        $token = $request->header('token');
        //check token in header
        if($token){
            $member = DB::table('members')->select('id','name','active')->where('id',$request->membership_id)->first();
            if($member){
                if($member->active == 1){
                    $token = DB::table('tokens')->where('membership_id',$request->membership_id)->where('token',$token)->first();
                    if($token){
                        if($today > $token->expired_at){
                            //member token expired
                            $http_code              = 401;
                            $response['success']    = 1;
                            $response['message']    = "Token is expired.";
                            
                        }else{
                            $passcode = DB::table('members')->where('id',$id)->where('passcode',$old_passcode)->first();
                            if($passcode){
                                //change new password
                                DB::table('members')->where('id',$id)->update([
                                    'passcode'      => $new_passcode,
                                    'updated_at'    => date('Y-m-d H:i:s'),
                                ]);
    
                                //saved member action logs
                                $id = DB::table('member_logs')->insertGetId([
                                    'membership_id'     => $id,
                                    'slug'              => 'passcode',
                                    'source'            => 'mobile',
                                    'log'               => 'Passcode has been changed by '.$member->name.'.',
                                    'created_at'        => date('Y-m-d H:i:s'),
                                    'updated_at'        => date('Y-m-d H:i:s'),
                                ]);
    
                                $http_code              = 200;
                                $response['success']    = 1;
                                $response['message']    ="New passcode has been changed.";
                            }else{
                                //invalid current password
                                $http_code              = 401;
                                $response['success'] = 0;
                                $response['message']    = "Old passcode is invalid.";
                            }
                        } 
                    }else{
                        //member token expired
                        $http_code              = 401;
                        $response['success']    = 1;
                        $response['message']    = "Token is invalid.";
                    }
                }else{
                    //acc has been banned
                    $http_code              = 401;
                    $response['success']    = 0;
                    $response['message']    = "Your account has been suspended.";
                }
            }else{
                //invalid member info
                $http_code              = 401;
                $response['success']    = 0;
                $response['message']    = "User not found in our system.";
            }
        }else{
            //missing token in header
            $http_code              = 401;
            $response['success']    = 0;
            $response['message']    = "Missing token in header.";
        }

        return response()->json($response,$http_code);
    }

    /* register at digital system */
    public function digital_register(Request $request){
        $response   = array();
        $check      = 0;

        $member = DB::table('members')->where('id',$request->id)->first();
        if($member){
            $new = new_member_create($member);

            if(array_key_exists('id',(array)$new)){
                //update uid & ref
                $member = DB::table('members')->where('id',$request->id)->update([
                    'digital_id'    => $new->id,
                    'ref'           => $new ->login,
                    'status'        => 1,
                    'updated_at'    => date('Y-m-d H:i:s')
                ]);
            
                $response['success']    = 1;
                $response['login']      = $new->login;
                $response['message']    = 'New member has been registered.';
            }else{
                $member = DB::table('members')->where('id',$request->id)->update([
                    'ref'         => $new ->login,
                    'updated_at'    => date('Y-m-d H:i:s')
                ]);

                $response['success']    = 0;
                $response['login']      = $new->login;
                $response['message']    = 'Member is already exists.';
            }
        }
        
        return response()->json($response);
    }

    /* approved user level upgrade */
    public function approved_user_level(Request $request){
        $response = array();
        $check = 0;

        $member = DB::table('members')->where('digital_id',$request->digital_id)->first();
        if($member){
            if($member->user_level == 1){
                //upgrade member level
                DB::table('members')->where('digital_id',$request->digital_id)->update([
                    'user_level'    => 2,
                    'status'    => 2,
                    'updated_at'    => date('Y-m-d H:i:s')
                ]);

                //saved member action logs
                $id = DB::table('member_logs')->insertGetId([
                    'membership_id'     => $member->id,
                    'slug'              => 'account',
                    'source'            => 'web',
                    'log'               => $member->name.' has been upgraded lvl 2 by '.$request->user.'.',
                    'created_at'        => date('Y-m-d H:i:s'),
                    'updated_at'        => date('Y-m-d H:i:s'),
                ]);

                $http_code              = 200;
                $response['success']    = 1;
                $response['level']      = 2;
                $response['message']    = 'Member approved level 2.';
            }else{

                $http_code              = 200;
                $response['success']    = 0;
                $response['level']      = 2;
                $response['message']    = 'Member already level 2.';
            }
        }else{
            $http_code           = 401;
            $response['success'] = 0;
            $response['message'] = 'Member not found.';
        }
        
        return response()->json($response);
    }

    /* rejected user level upgrade */
    public function rejected_user_kyc(Request $request){
        $response = array();
        $check = 0;

        $issue = implode(',', $request->issues);

        $member = DB::table('members')->where('digital_id',$request->digital_id)->first();
        $log = DB::table('rejected_logs')->where('ref',$request->digital_id)->first();

        if($member){
            if($member->user_level == 1){
                //upgrade member level
                DB::table('members')->where('digital_id',$request->digital_id)->update([
                    'status'    => 3,
                    'updated_at'    => date('Y-m-d H:i:s')
                ]);

                //saved member action logs
                $id = DB::table('member_logs')->insertGetId([
                    'ref'     => $member->id,
                    'slug'              => 'account',
                    'source'            => 'web',
                    'log'               => $member->name.' has been rejected lvl 2 by '.$request->user.'.',
                    'created_at'        => date('Y-m-d H:i:s'),
                    'updated_at'        => date('Y-m-d H:i:s'),
                ]);

                //saved member action logs
                if($log){
                    //update
                    $id = DB::table('rejected_logs')->where('ref',$request->digital_id)->update([
                        'ref'     => $member->id,
                        'rules'              => $issue,
                        'created_at'        => date('Y-m-d H:i:s'),
                        'updated_at'        => date('Y-m-d H:i:s'),
                    ]);
                }else{
                    //create
                    $id = DB::table('rejected_logs')->insertGetId([
                        'ref'     => $member->id,
                        'rules'              => $issue,
                        'created_at'        => date('Y-m-d H:i:s'),
                        'updated_at'        => date('Y-m-d H:i:s'),
                    ]);
                }
                

                $http_code              = 200;
                $response['success']    = 1;
                $response['level']      = 2;
                $response['message']    = 'Member rejected to upgrade level 2.';
            }else{

                $http_code              = 200;
                $response['success']    = 0;
                $response['level']      = 2;
                $response['message']    = 'Member already level 2.';
            }
        }else{
            $http_code           = 401;
            $response['success'] = 0;
            $response['message'] = 'Member not found.';
        }
        
        return response()->json($response);
    }

    /* update member information */
    public function update_info(Request $request){
        $response = array();


        $member = DB::table('members')->where('id',$request->membership_id)->first();
        if($member){
            $status = $request->action == 'edit'? $member->status:1;

            //saved previous version in histories
            DB::table('histories')->insertGetId([
                'membership_id' => $member->id,
                'digital_id'    => $member->digital_id,
                'name'          => $member->name,
                'mobile'        => $member->mobile,
                'passcode'      => $member->passcode,
                'dob'           => $member->dob,
                'gender'        => $member->gender,
                'nrc'           => $member->nrc,
                'state_name'    => $member->state_name,
                'township_name' => $member->township_name,
                'address'       => $member->address,
                'user_level'    => $member->user_level,
                'active'        => $member->active,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ]);

            //state
            $state = DB::table('regions')->select('digital_id','en_name')->where('id',$request->state_id)->first();
            //township
            $township = DB::table('townships')->select('digital_id','digital_city_id','en_name')->where('id',$request->township_id)->first();

            //updated current member info
            DB::table('members')->where('id',$request->membership_id)->update([
                'name'              => $request->name? $request->name:$member->name,
                'mobile'            => $request->mobile? $request->mobile:$member->mobile,
                'dob'               => $request->dob? $request->dob:$member->dob,
                'gender'            => $request->gender? $request->gender:$member->gender,
                'nrc'               => $request->nrc? $request->nrc:$member->nrc,
                'state_id'              => $request->state_id? $request->state_id:$member->state_id,
                'state_name'        => $request->state_id? $state->en_name:$member->state_name,
                'city_id'               => $request->township_id? $township->digital_city_id:$member->township_id,
                'township_id'       => $request->township_id? $township->digital_id:$member->township_id,
                'township_name'     => $request->state_id? $township->en_name:$member->township_name,
                'address'           => $request->address? $request->address:$member->address,
                'user_level'        => $request->user_level? $request->user_level:$member->user_level,
                'selfie_photo'   => $request->selfie_photo? $request->selfie_photo:$member->selfie_photo,
                'nrc_front_photo'   => $request->nrc_front_photo? $request->nrc_front_photo:$member->nrc_front_photo,
                'nrc_back_photo'    => $request->nrc_back_photo? $request->nrc_back_photo:$member->nrc_back_photo,
                'selfie_photo'      => $request->selfie_photo? $request->selfie_photo:$member->selfie_photo,
                'active'            => $request->active? $request->active:$member->active,
                'status'            => $status,
                'updated_at'        => date('Y-m-d H:i:s'),
            ]);

            $http_code           = 200;
            $response['success'] = 1;
            $response['message'] = 'Member information has been updated.';
        }else{

            $http_code           = 401;
            $response['success'] = 0;
            $response['message'] = 'Member not found.';
        }

        return response()->json($response,$http_code);
    }

    //terminate_user
    public function terminate_user(Request $request){
        $response = array();

        $member = DB::table('members')->select('id','name','ref')->where('id',$request->id)->first();
        if($member){
            DB::table('members')->where('id',$member->id)->update([
                'active'        => 0,
                'updated_at'    => date('Y-m-d H:i:s'),
            ]);

            //saved member action logs
            $id = DB::table('member_logs')->insertGetId([
                'membership_id'     => $member->id,
                'ref'     => $member->ref,
                'slug'              => 'account',
                'source'            => 'web',
                'log'               => $member->name.' has been suspended by '.$request->user.'.',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ]);

            $http_code           = 200;
            $response['success'] = 1;
            $response['message'] = 'Member has been suspended.';
        }else{

            $http_code           = 401;
            $response['success'] = 0;
            $response['message'] = 'Member not found.';
        }

        return response()->json($response,$http_code);
    }

    //unlock member
    public function unlock_user(Request $request){
        $response = array();

        $member = DB::table('members')->select('id','name','ref')->where('id',$request->id)->first();
        if($member){
            DB::table('members')->where('id',$member->id)->update([
                'active'        => 1,
                'updated_at'    => date('Y-m-d H:i:s'),
            ]);

            //saved member action logs
            $id = DB::table('member_logs')->insertGetId([
                'membership_id'     => $member->id,
                'ref'     => $member->ref,
                'slug'              => 'unlocked-acc',
                'source'            => 'web',
                'log'               => $member->name.' has been unlocked by '.$request->user.'.',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ]);

            $http_code           = 200;
            $response['success'] = 1;
            $response['message'] = 'Member has been unlocked.';
        }else{

            $http_code           = 401;
            $response['success'] = 0;
            $response['message'] = 'Member not found.';
        }

        return response()->json($response);
    }

    //deleted member
    public function delete_member(Request $request){
        $response = array();

        $member = DB::table('members')->select('id','ref')->where('id',$request->id)->first();
        if($member){
            $name = $member->ref;
            DB::table('members')->where('id',$request->id)->delete();
            DB::table('tokens')->where('membership_id',$request->id)->delete();

            //saved member action logs
            $id = DB::table('member_logs')->insertGetId([
                'membership_id'     => $member->id,
                'slug'              => 'account',
                'source'            => 'web',
                'log'               => $name.' has been deleted by '.$request->user.'.',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ]);

            $http_code           = 200;
            $response['success'] = 1;
            $response['message'] = $name.' has been deleted.';
        }else{  

            $http_code           = 401;
            $response['success'] = 0;
            $response['message'] = 'Member not found.';
        }
        
        return response()->json($response,$http_code);
    }

    public function json_townships(Request $request){
        $response   = array();
        $temp       = array();
        $regions    = DB::table('regions')->select('id','mm_name','en_name','postal_code','region_code','digital_id')->orderBy('postal_code')->get();

        foreach($regions as $region){
            $townships = DB::table('townships')->select('id','en_name','mm_name','postal_code','region_code','digital_id','digital_city_id')->where('region_code',$region->region_code)->where('active',1)->get();

            $temp['id']             = $region->id;
            $temp['mm_name']        = $region->mm_name;
            $temp['en_name']        = $region->en_name;
            $temp['postal_code']    = $region->postal_code;
            $temp['region_code']    = $region->region_code;
            $temp['digital_id']     = $region->digital_id;
            $temp['townships']      = $townships;

            array_push($response,$temp);
        }

        return response()->json($response);
    }

    /* member registration */
    public function digital_register_api(Request $request){
        $data     = array();
        $response = array();
        $required = array();
        $validate = 10;

        $request->id              =='' ? array_push($required,'id is required'):$validate -= 1;
        $request->name              =='' ? array_push($required,'name is required'):$validate -= 1;
        $request->mobile            =='' ? array_push($required,'mobile is required'):$validate -= 1;
        $request->passcode          =='' ? array_push($required,'passcode is required'):$validate -= 1;
        $request->nrc               =='' ? array_push($required,'nrc is required'):$validate -= 1;
        $request->dob               =='' ? array_push($required,'dob is required'):$validate -= 1;
        $request->gender            =='' ? array_push($required,'gender is required'):$validate -= 1;
        $request->state_id          =='' ? array_push($required,'state_id is required'):$validate -= 1;
        $request->township_id       =='' ? array_push($required,'township_id is required'):$validate -= 1;
        $request->address           =='' ? array_push($required,'address is required'):$validate -= 1;

        if($validate == 0){
            $mobile           = $request->mobile;

            $member = DB::table('members')->select('mobile')->where('mobile',$mobile)->first();
            if($member){

                $http_code              = 403;
                $response['success']    = 0;
                $response['message']    = "Already member.";
            }else{
                $passcode = encryptcode($request->passcode);

                //state
                $state = DB::table('regions')->select('digital_id','en_name')->where('id',$request->state_id)->first();
                //township
                $township = DB::table('townships')->select('digital_id','digital_city_id','en_name')->where('id',$request->township_id)->first();

                //register for new member
                $id = DB::table('members')->insertGetId([
                    'name'              => $request->name,
                    'mobile'            => $request->mobile,
                    'passcode'          => $passcode,
                    'nrc'               => $request->nrc,
                    'dob'               => $request->dob,
                    'gender'            => $request->gender,
                    'state_id'          => $state->digital_id,
                    'state_name'        => $state->en_name,
                    'city_id'           => $township->digital_city_id,
                    'township_id'       => $township->digital_id,
                    'township_name'     => $township->en_name,
                    'address'           => $request->address,
                    'user_level'        => 1,
                    'status'            => 1,
                    'active'            => 1,
                    'registered_at'     => date('Y-m-d H:i:s'),
                    'created_at'        => date('Y-m-d H:i:s'),
                    'updated_at'        => date('Y-m-d H:i:s'),
                ]);

                //saved member action logs
                DB::table('member_logs')->insertGetId([
                    'membership_id'     => $id,
                    'slug'              => 'register',
                    'source'            => 'mobile',
                    'log'               => 'New member '.$request->name.' has been registered.',
                    'created_at'        => date('Y-m-d H:i:s'),
                    'updated_at'        => date('Y-m-d H:i:s'),
                ]);

                $new_member = DB::table('members')->where('id',$id)->first();
                if($new_member){
                    $new = new_member_create($new_member);

                    //updated digital_id and ref
                    $member = DB::table('members')->where('id',$id)->update([
                        'digital_id'    => $new->id,
                        'ref'           => $new->login,
                        'status'        => 1,
                        'registered_at' => array_key_exists('created_at',(array) $new)? $new->created_at:date('Y-m-d H:i:s'),
                        'updated_at'    => date('Y-m-d H:i:s')
                    ]);
                }

                //generate new token
                $new_token = encryptcode(generateRandomString());
                $expired_at = date('Y-m-d H:i:s',strtotime("+ 1 day"));

                //created member's token into token table
                DB::table('tokens')->insertGetId([
                    'membership_id' => $id,
                    'ref'           => $new->login,
                    'token'         => $new_token,
                    'expired_at'    => $expired_at,
                    'created_at'    => date('Y-m-d H:i:s'),
                    'updated_at'    => date('Y-m-d H:i:s'),
                ]);

                $data['membership_id']  = $id;
                $data['id']             = $new->id;
                $data['login']          = $new->login;  
                $data['name']           = $request->name;    
                $data['mobile']         = $request->mobile;
                $data['token']          = $new_token;
                $data['expired_at']     = $expired_at;

                sendNewMemberNotification('Membership Registration',$request->name.' has been registered.');

                //member registration successful
                $http_code              = 201;
                $response['success']    = 1;
                $response['message']    = "New member has been registered";
                $response['data']       = $data;
            }
        }else{
            //required fields
            $http_code              = 200;
            $response['success']    = 0;
            $response['message']    = $required;
        }

       return response()->json($response, $http_code);
    }

    public function member_status(Request $request){
        $response   = array();
        $required   = array();
        $validate   = 2;

        $request->id =='' ? array_push($required,'id is required'):$validate -= 1;
        $request->active  =='' ? array_push($required,'active is required'):$validate -= 1;

        $token = $request->header('token');
        //check token in header
        if($token){
            if($token == 'fPwz1YKMCWLkKQn3j64Qa0Y43zJ41zcbpmm6ywua8X0='){
                $member = DB::table('members')->where('digital_id',$request->id)->first();
                if($member){
                    //update user status
                    DB::table('members')->where('id',$id)->update([
                        'active'      => $request->active,
                        'updated_at'    => date('Y-m-d H:i:s'),
                     ]);
        
                     //saved member action logs
                    $id = DB::table('member_logs')->insertGetId([
                        'membership_id'     => $member->id,
                        'slug'                  => 'account',
                        'source'            => 'digital',
                        'log'                   => 'Member status has been changed from digital.',
                         'created_at'        => date('Y-m-d H:i:s'),
                         'updated_at'        => date('Y-m-d H:i:s'),
                    ]);
        
                    $http_code              = 200;
                    $response['success']    = 1;
                    $response['message']    ="Member status has been changed.";
                }else{
                    //invalid member info
                    $http_code              = 401;
                    $response['success']    = 0;
                    $response['message']    = "User not found in our system.";
                }
            }else{
                //member token expired
                $http_code              = 401;
                $response['success']    = 1;
                $response['message']    = "Token is invalid.";
            }
        }else{
            //missing token in header
            $http_code              = 401;
            $response['success']    = 0;
            $response['message']    = "Missing token in header.";
        }

        return response()->json($response,$http_code);
    }

    public function rejected_rules(Request $request){
        $log = DB::table('rejected_logs')->where('ref',$request->ref)->first();

        return response()->json($log);
    }

    public function member_point(Request $request){
        $response = array();
        $ref = DB::table('members')->select('ref','points')->where('ref',$request->ref)->first();
        $points = 0;
        $pay_points = 10;

        if($ref){
            $points += $pay_points;

            $waybill = DB::table('point_histories')->select('waybill_no')->where('waybill_no',$request->waybill_no)->first();
            if(!$waybill){
                DB::table('point_histories')->insertGetId([
                    'ref'                   => $request->ref,
                    'waybill_no'      => $request->waybill_no,
                    'points'            => $pay_points,
                    'created_at'        => date('Y-m-d H:i:s'),
                    'updated_at'        => date('Y-m-d H:i:s'),
                ]);

                //update member points
                DB::table('members')->where('ref',$request->ref)->update([
                    'points' => $points
                ]);

                $http_code              = 200;
                $response['success']    = 1;
                $response['message']    = $pay_points." point has been added for '.$request->ref.'.";
            }else{
                $http_code              = 405;
                $response['success']    = 0;
                $response['message']    = "Waybill is already exists.";
            }
        }else{
            $http_code              = 401;
            $response['success']    = 0;
            $response['message']    = "Member not found.";
        }

        return response()->json($response,$http_code);
    }


}
