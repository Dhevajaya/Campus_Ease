<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use App\Models\User;
use Auth;
use Error;

class VerificationController extends Controller
{
    public function __construct(){
        $this->route = "dashboard.auth.verification";
        $this->view = "dashboard.pages.auth.verification.";
        $this->user = new User();
    }

    public function verificationNotice()
    {
        if (Auth::user()->hasVerifiedEmail()) {
            return redirect()->route('dashboard.auth.login.index');
        }

        return view($this->view.'notice');
    }
    
    public function verificationResend()
    {
        try {
            $user = Auth::user();
            if ($user) {
                $user->update([
                    'email' => $user->email,
                ]);
            }
            if (!$user) {
                throw new Error("Email tidak ditemukan");
                
            }
            if ($user->hasVerifiedEmail()) {
                throw new Error("Email sudah terverifikasi");
            }
            $user->sendEmailVerificationNotification();

            alert()->html('Berhasil','Link verifikasi email berhasil dikirim!','success'); 
            return redirect()->route('dashboard.auth.verification.notice');

        } catch (\Throwable $e) {
            Log::emergency($e->getMessage());

            alert()->html('Gagal',$e->getMessage(),'error');
            return redirect()->back()->withInput();
        }
    }

    public function verifyUser(Request $request)
    {
        try {
            $user = User::find($request->route('id'));
            if (! hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {
                throw new AuthorizationException();
            }

            if ($user->hasVerifiedEmail()) {
                throw new Error("Verifikasi email gagal");
            } else {
                if ($user->markEmailAsVerified()) {
                    event(new Verified($user));
                }

                alert()->html('Berhasil','Verifikasi email berhasil','success'); 
                return view($this->view.'verify');
            }
        } catch (\Throwable $e) {
            Log::emergency($e->getMessage());

            alert()->html('Gagal',$e->getMessage(),'error');
            return view($this->view.'verify');
        }
    }
}
