<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use Auth;
use Error;

class ForgotPasswordController extends Controller
{
    public function __construct(){
        $this->route = "dashboard.auth.forgot-password.";
        $this->view = "dashboard.pages.auth.";
    }

    public function index()
    {
        if(Auth::check()){
            return redirect()->route('dashboard.dashboard.index');
        }

        return view($this->view."forgot-password");
    }

    public function post(ForgotPasswordRequest $request)
    {
        try {

            $email = (empty($request->input("email"))) ? null : trim(htmlentities($request->input("email")));
            
            $status = Password::sendResetLink(
                [
                    'email' => $email,
                ]
            );

            if($status != Password::RESET_LINK_SENT){
                throw new Error('Terjadi kesalahan saat mengirim link reset password');
            }

            alert()->html('Berhasil','Link reset password telah dikirim ke email anda','success'); 
            return redirect()->route('dashboard.auth.login.index');

        } catch (\Throwable $e) {
            Log::emergency($e->getMessage());

            alert()->html('Gagal',$e->getMessage(),'error');
            return redirect()->back()->withInput();
        }
    }
}
