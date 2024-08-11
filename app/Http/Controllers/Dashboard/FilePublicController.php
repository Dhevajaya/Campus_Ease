<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\FilePublic\StoreRequest;
use App\Http\Requests\FilePublic\UpdateRequest;
use App\Models\FilePublic;
use App\Helpers\UploadHelper;
use Auth;

class FilePublicController extends Controller
{
    public function __construct(){
        $this->route = "dashboard.file-public.";
        $this->view = "dashboard.pages.file-public.";
        $this->file_public = new FilePublic();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $table = $this->file_public;

        if(!empty($search)){
            $table = $table->where(function($query2) use($search){
                $query2->where("title","like","%".$search."%");
                $query2->orWhere("description","like","%".$search."%");
            });
        }

        if(Auth::user()->isTeacher() || Auth::user()->isEmployee()){
            $table = $table->where("user_id",Auth::user()->id);
        }
        $table = $table->orderBy("created_at","DESC");
        $table = $table->paginate(10)->withQueryString();

        $data = [
            'table' => $table,
        ];

        return view($this->view."index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->view."create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        try {
            $title = $request->title;
            $description = $request->description;
            $file = $request->file("file");

            if($file){
                $upload = UploadHelper::upload_file($file,'file-public',[]);

                if($upload["IsError"] == TRUE){
                    throw new Error($upload["Message"]);
                }

                $file = $upload["Path"];
            }

            $create = $this->file_public->create([
                'user_id' => Auth::user()->id,
                'title' => $title,
                'description' => $description,
                'file' => $file,
            ]);

            alert()->html('Berhasil','Data berhasil ditambahkan','success'); 
            return redirect()->route($this->route."index");

        } catch (\Throwable $e) {
            Log::emergency($e->getMessage());

            alert()->error('Gagal',$e->getMessage());
            return redirect()->route($this->route."create")->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = $this->file_public;
        $result = $result->where('id',$id);
        if(Auth::user()->isTeacher() || Auth::user()->isEmployee()){
            $result = $result->where("user_id",Auth::user()->id);
        }
        $result = $result->first();

        if(!$result){
            alert()->error('Gagal',"Data tidak ditemukan");
            return redirect()->route($this->route."index");
        }

        $data = [
            'result' => $result,
        ];

        return view($this->view."show",$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = $this->file_public;
        $result = $result->where('id',$id);
        $result = $result->first();

        if(!$result){
            alert()->error('Gagal',"Data tidak ditemukan");
            return redirect()->route($this->route."index");
        }

        $data = [
            'result' => $result,
        ];

        return view($this->view."edit",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        try {
            $result = $this->file_public;
            $result = $result->where('id',$id);
            $result = $result->first();

            if(!$result){
                throw new Error("Data tidak ditemukan");
            }

            $title = $request->title;
            $description = $request->description;
            $file = $request->file("file");

            if($file){
                $upload = UploadHelper::upload_file($file,'file-public',[]);

                if($upload["IsError"] == TRUE){
                    throw new Error($upload["Message"]);
                }

                $file = $upload["Path"];
            }
            else{
                $file = $result->file;
            }

            $result->update([
                'title' => $title,
                'description' => $description,
                'file' => $file,
            ]);

            alert()->html('Berhasil','Data berhasil diubah','success'); 
            return redirect()->route($this->route."index");

        } catch (\Throwable $e) {
            Log::emergency($e->getMessage());

            alert()->error('Gagal',$e->getMessage());
            return redirect()->route($this->route."edit",$id)->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $result = $this->file_public;
            $result = $result->where('id',$id);
            $result = $result->first();

            $result->delete();

            alert()->html('Berhasil','Data berhasil dihapus','success'); 
            return redirect()->route($this->route."index");

        } catch (\Throwable $e) {
            Log::emergency($e->getMessage());

            alert()->error('Gagal',$e->getMessage());
            return redirect()->route($this->route."index");
        }
    }
}
