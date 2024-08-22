<?php



namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\contact\StoreRequest;
use App\Helpers\UploadHelper;
use App\Models\Contact;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function __construct(){
        $this->route = "landing-page.contact.";
        $this->view = "landing-page.pages.contact.";
        $this->contact = new Contact();
    }

    public function index(){
        return view($this->view."index");
    }

    public function store(StoreRequest $request){
        try {
            $name = $request->name;
            $image = $request->file("image");
            $email = $request->email;
            $subject = $request->subject;
            $message = $request->message;

            if($image){
                $upload = UploadHelper::upload_file($image,'images-contact',['jpeg','jpg','png','gif']);

                if($upload["IsError"] == TRUE){
                    throw new Error($upload["Message"]);
                }

                $image = $upload["Path"];
                $create = $this->contact->create([
                    'name' => $name,
                    'image' => $image,
                    'email'=> $email,
                    'subject'=> $subject,
                    'message' => $message,
                ]);
            }else{
                $create = $this->contact->create([
                    'name' => $name,
                    'email'=> $email,
                    'subject'=> $subject,
                    'message' => $message,
                ]);
            }
            alert()->html('Berhasil','Pesan Berhasil dikirim!','success'); 
            return redirect()->route($this->route."index");

        } catch (\Throwable $e) {
            Log::emergency($e->getMessage());

            alert()->error('Gagal',$e->getMessage());

            return redirect()->route($this->route."create")->withInput();
        }
    }
}

// namespace App\Http\Controllers\LandingPage;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Log;
// use App\Http\Requests\Ticket\TicketRequest;
// use App\Settings\WebSetting;

// class ContactController extends Controller
// {
//     public function __construct(){
//         $this->route = "landing-page.contact.";
//         $this->view = "landing-page.pages.contact.";
//     }

//     public function index()
//     {
//         return view($this->view."index");
//     }

//     public function store(TicketRequest $request,WebSetting $webSetting)
//     {
//         try {
//             $name = $request->name;
//             $email = $request->email;
//             $message = $request->message;
//             $adminEmail = $webSetting->website_email;

//             if($adminEmail){
//                 Mail::to($adminEmail)->send(new TicketMail($email, $message, $name));
//             }
            
//             alert()->html('Berhasil','Tiket berhasil dikirim. Kami akan segera menghubungi Anda melalui email yang Anda masukkan.','success'); 
//             return redirect()->route($this->route."index");

//             $name = (empty($request->input('name'))) ? null : trim(htmlentities($request->input('name')));
//             $email = (empty($request->input('email'))) ? null : trim(htmlentities($request->input('email')));
//             $message = (empty($request->input('message'))) ? null : trim(htmlentities($request->input('message')));
//             $adminEmail = $webSetting->website_email;

//             if($adminEmail){
//                 Mail::to($adminEmail)->send(new TicketMail($email, $message, $name));
//             }

//             alert()->html('Berhasil','Ticket berhasil dikirimkan','success'); 
//             return redirect()->route($this->route."index");

//         } catch (\Throwable $e) {
//             Log::emergency($e->getMessage());
//             alert()->html("Gagal",$e->getMessage(), 'error');
//             return redirect()->back()->with("error",$e->getMessage())->withInput();
//         }
//     }
// }
