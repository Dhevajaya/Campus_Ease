<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Ticket\TicketRequest;
use App\Settings\WebSetting;
use App\Mail\TicketMail;
use Mail;

class ContactController extends Controller
{
    public function __construct(){
        $this->route = "landing-page.contact.";
        $this->view = "landing-page.pages.contact.";
    }

    public function index()
    {
        return view($this->view."index");
    }

    public function store(TicketRequest $request,WebSetting $webSetting)
    {
        try {
            $name = $request->name;
            $email = $request->email;
            $message = $request->message;
            $adminEmail = $webSetting->website_email;

            if($adminEmail){
                Mail::to($adminEmail)->send(new TicketMail($email, $message, $name));
            }
            
            alert()->html('Berhasil','Tiket berhasil dikirim. Kami akan segera menghubungi Anda melalui email yang Anda masukkan.','success'); 
            return redirect()->route($this->route."index");

            $name = (empty($request->input('name'))) ? null : trim(htmlentities($request->input('name')));
            $email = (empty($request->input('email'))) ? null : trim(htmlentities($request->input('email')));
            $message = (empty($request->input('message'))) ? null : trim(htmlentities($request->input('message')));
            $adminEmail = $webSetting->website_email;

            if($adminEmail){
                Mail::to($adminEmail)->send(new TicketMail($email, $message, $name));
            }

            alert()->html('Berhasil','Ticket berhasil dikirimkan','success'); 
            return redirect()->route($this->route."index");

        } catch (\Throwable $e) {
            Log::emergency($e->getMessage());
            alert()->html("Gagal",$e->getMessage(), 'error');
            return redirect()->back()->with("error",$e->getMessage())->withInput();
        }
    }
}
