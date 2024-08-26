<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
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
        $response = array();

        $user = DB::table('users')->where('name',$request->username)->first();
        if(!$user){
            DB::table('users')->insertGetId([
                'name'          => $request->username,
                'email'         => $request->username.'@royalx.net',
                'password'      => bcrypt($request->password),
                'role'          => 2,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ]);

            $response['success'] = 1;
            $response['message'] = 'User has been created.';
        }else{
            $response['success'] = 0;
            $response['message'] = 'User is already exists.';
        }

        return response()->json($response);
    }


    public function show(string $id)
    {
        $asset = assets();
        $user   = DB::table('users')->where('id',$id)->first();

        return view($asset.'.users.view',compact('user'));
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }

    public function users(){
        $asset = assets();
        $json = 'json/users';

        return view($asset.'.users.list',compact('json'));
    }

    public function json_users(){
        $users = DB::table('users')->orderBy('name','desc')->paginate(50);

        return response()->json($users);
    }
}
