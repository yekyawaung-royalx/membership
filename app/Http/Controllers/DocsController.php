<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocsController extends Controller
{
    public function api_docs(){
        $asset = assets();

        return view($asset.'.api-docs.index');
    }

    public function api_slug($slug){
        $asset = assets();

        if($slug == 'login'){
            return view($asset.'.api-docs.login');
        }elseif($slug == 'register'){
            return view($asset.'.api-docs.register');
        }elseif($slug == 'check-mobile'){
            return view($asset.'.api-docs.check-mobile');
        }elseif($slug == 'passcode-change'){
            return view($asset.'.api-docs.passcode-change');
        }else{

        }
        
        // return view('api-docs.login');
        // return view('api-docs.passcode-change');
        // return view('api-docs.passcode-reset');
        // return view('api-docs.passcode-reset');
    }
}
