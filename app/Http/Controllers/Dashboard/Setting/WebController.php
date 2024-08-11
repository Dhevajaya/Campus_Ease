<?php

namespace App\Http\Controllers\Dashboard\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Setting\WebSettingRequest;
use App\Settings\WebSetting;
use App\Helpers\UploadHelper;
use App\Enums\SettingEnum;
use Error;

class WebController extends Controller
{

    public function __construct(){
        $this->route = "dashboard.settings.web.";
        $this->view = "dashboard.pages.settings.web.";
    }

    public function index(WebSetting $webSetting)
    {
        $data = [
            'result' => $webSetting,
        ];

        return view($this->view.'index', $data);
    }

    public function update(WebSettingRequest $request)
    {
        try {
            $website_name = $request->website_name;
            $website_keywords = $request->website_keywords;
            $website_description = $request->website_description;
            $website_phone = $request->website_phone;
            $website_address = $request->website_address;
            $website_email = $request->website_email;
            $principal_name = $request->principal_name;
            $principal_welcome = $request->principal_welcome;
            $home_quotes = $request->home_quotes;
            $website_logo = $request->file("website_logo");
            $website_logo_dark = $request->file("website_logo_dark");
            $principal_avatar = $request->file("principal_avatar");
            $home_banner = $request->file("home_banner");

            if($principal_avatar){
                $upload = UploadHelper::upload_file($principal_avatar,'settings',SettingEnum::AVATAR_EXT);

                if($upload["IsError"] == TRUE){
                    throw new Error($upload["Message"]);
                }

                $principal_avatar = $upload["Path"];
            }

            if($website_logo){
                $upload = UploadHelper::upload_file($website_logo,'settings',SettingEnum::LOGO_EXT);

                if($upload["IsError"] == TRUE){
                    throw new Error($upload["Message"]);
                }

                $website_logo = $upload["Path"];
            }

            if($website_logo_dark){
                $upload = UploadHelper::upload_file($website_logo_dark,'settings',SettingEnum::LOGO_EXT);

                if($upload["IsError"] == TRUE){
                    throw new Error($upload["Message"]);
                }

                $website_logo_dark = $upload["Path"];
            }

            if($home_banner){
                $upload = UploadHelper::upload_file($home_banner,'settings',SettingEnum::BANNER_HOME_EXT);

                if($upload["IsError"] == TRUE){
                    throw new Error($upload["Message"]);
                }

                $home_banner = $upload["Path"];
            }

            $webSetting = new WebSetting();
            if($website_logo){
                $webSetting->website_logo = $website_logo;
            }
            if($website_logo_dark){
                $webSetting->website_logo_dark = $website_logo_dark;
            }
            $webSetting->website_name = $website_name;
            $webSetting->website_keywords = $website_keywords;
            $webSetting->website_description = $website_description;
            $webSetting->website_phone = $website_phone;
            $webSetting->website_address = $website_address;
            $webSetting->website_email = $website_email;
            $webSetting->principal_name = $principal_name;
            $webSetting->principal_welcome = $principal_welcome;
            if($principal_avatar){
                $webSetting->principal_avatar = $principal_avatar;
            }
            if($home_banner){
                $webSetting->home_banner = $home_banner;
            }
            $webSetting->home_quotes = $home_quotes;
            $webSetting->save();
            
            alert()->html('Berhasil','Pengaturan website berhasil diperbarui','success'); 

            return redirect()->route($this->route.'index');
        } catch (\Throwable $e) {
            Log::emergency($e->getMessage());

            alert()->error('Gagal',$e->getMessage());
            return redirect()->route($this->route."index")->withInput();
        }
    }
}
