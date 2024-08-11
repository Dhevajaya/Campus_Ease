<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Auth\LoginRequest;
use App\Enums\RoleEnum;
use Auth;
use Error;

class LoginController extends Controller
{
    public function __construct(){
        $this->route = "dashboard.auth.login.";
        $this->view = "dashboard.pages.auth.";
    }

    public function index()
    {
        if(Auth::check()){
            return redirect()->route('dashboard.dashboard.index');
        }
        return view($this->view."login");
    }

    public function post(LoginRequest $request)
    {
        try {

            $username = (empty($request->input("username"))) ? null : trim(htmlentities($request->input("username")));
            $password = (empty($request->input("password"))) ? null : trim(htmlentities($request->input("password")));

            $fieldType = filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
            $rememberme = (empty($request->input('rememberme'))) ? false : true;

            $field = [
                $fieldType => $username,
                'password' => $password
            ];

            if(Auth::attempt($field,$rememberme)){
                if(!Auth::user()->hasRole([
                    RoleEnum::SUPERADMIN,
                    RoleEnum::ADMINISTRATOR,
                    RoleEnum::TEACHER,
                    RoleEnum::EMPLOYEE,
                ])){
                    Auth::logout();
                    throw new Error("Anda tidak diperbolehkan mengakses menu ini");
                }
            }
            else{
                throw new Error("Username / password tidak sesuai");
            }

            alert()->html('Berhasil','Login berhasil','success'); 
            return redirect()->intended(route('dashboard.dashboard.index'));

        } catch (\Throwable $e) {
            Log::emergency($e->getMessage());

            alert()->html('Gagal',$e->getMessage(),'error');
            return redirect()->back()->withInput();
        }
    }
}