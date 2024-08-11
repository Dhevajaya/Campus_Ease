<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use App\Http\Requests\Auth\ResetPasswordRequest;
use Auth;
use Error;

class ResetPasswordController extends Controller
{
    public function __construct(){
        $this->route = "dashboard.auth.reset-password.";
        $this->view = "dashboard.pages.auth.";
    }

    public function index(Request $request)
    {
        if(Auth::check()){
            return redirect()->route('dashboard.dashboard.index');
        }

        $data = [
            'email' => $request->input('email'),
            'token' => $request->input('token')
        ];

        return view($this->view."reset-password",$data);
    }

    public function post(ResetPasswordRequest $request)
    {
        try {

            $email = (empty($request->input("email"))) ? null : trim(htmlentities($request->input("email")));
            $password = (empty($request->input("password"))) ? null : trim(htmlentities($request->input("password")));
            $password_confirmation = (empty($request->input("password_confirmation"))) ? null : trim(htmlentities($request->input("password_confirmation")));
            $token = (empty($request->input("token"))) ? null : trim(htmlentities($request->input("token")));
            
            $status = Password::reset([
                'email' => $email,
                'password' => $password,
                'password_confirmation' => $password_confirmation,
                'token' => $token,
            ],
                function ($user, $newPassword) {
                    $user->forceFill([
                        'password' => bcrypt($newPassword),
                    ])->setRememberToken(Str::random(60));
    
                    $user->save();
    
                    event(new PasswordReset($user));
                }
            );

            if($status != Password::PASSWORD_RESET){
                throw new Error('Terjadi kesalahan saat mengubah password');
            }

            alert()->html('Berhasil','Password berhasil diubah','success'); 
            return redirect()->route('dashboard.auth.login.index');

        } catch (\Throwable $e) {
            Log::emergency($e->getMessage());

            alert()->html('Gagal',$e->getMessage(),'error');
            return redirect()->back()->withInput();
        }
    }
}
