<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LogoutController extends Controller
{
    public function logout(){

        $manager = app('impersonate');

        if($manager->isImpersonating()){
            Auth::user()->leaveImpersonation();
            return redirect()->route('dashboard.dashboard.index');
        }
        else{
            if(!Auth::check()){
                return redirect()->route("dashboard.auth.login.index");
            }
            
            Auth::logout();
            return redirect()->route("dashboard.auth.login.index");
        }
    }
}
