<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Announcement\StoreRequest;
use App\Http\Requests\Announcement\UpdateRequest;
use App\Models\Announcement;
use App\Helpers\SlugHelper;
use App\Helpers\UploadHelper;
use App\Enums\AnnouncementEnum;
use Auth;

class AnnouncementController extends Controller
{
    public function __construct(){
        $this->route = "dashboard.announcements.";
        $this->view = "dashboard.pages.announcements.";
        $this->announcement = new Announcement();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $table = $this->announcement;

        if(!empty($search)){
            $table = $table->where(function($query2) use($search){
                $query2->where("title","like","%".$search."%");
            });
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
            $fragment = $request->fragment;
            $date = $request->date;
            $published_at = $request->published_at;
            $cover = $request->file("cover");

            $slug = SlugHelper::generate(Announcement::class,$title,"slug");

            if($cover){
                $upload = UploadHelper::upload_file($cover,'announcements',AnnouncementEnum::COVER_EXT);

                if($upload["IsError"] == TRUE){
                    throw new Error($upload["Message"]);
                }

                $cover = $upload["Path"];
            }

            $create = $this->announcement->create([
                'user_id' => Auth::user()->id,
                'title' => $title,
                'fragment' => $fragment,
                'slug' => $slug,
                'cover' => $cover,
                'date' => $date,
                'published_at' => $published_at,
                'announcement-trixFields' => $request->input('announcement-trixFields'),
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
        $result = $this->announcement;
        $result = $result->where('id',$id);
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
        $result = $this->announcement;
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
            $result = $this->announcement;
            $result = $result->where('id',$id);
            $result = $result->first();

            if(!$result){
                throw new Error("Data tidak ditemukan");
            }

            $title = $request->title;
            $fragment = $request->fragment;
            $date = $request->date;
            $published_at = $request->published_at;
            $cover = $request->file("cover");

            if($title != $result->title){
                $slug = SlugHelper::generate(Announcement::class,$title,"slug");
            }
            else{
                $slug = $result->slug;
            }

            if($cover){
                $upload = UploadHelper::upload_file($cover,'announcements',AnnouncementEnum::COVER_EXT);

                if($upload["IsError"] == TRUE){
                    throw new Error($upload["Message"]);
                }

                $cover = $upload["Path"];
            }
            else{
                $cover = $result->cover;
            }

            $result->update([
                'title' => $title,
                'fragment' => $fragment,
                'slug' => $slug,
                'cover' => $cover,
                'date' => $date,
                'published_at' => $published_at,
                'announcement-trixFields' => $request->input('announcement-trixFields'),
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
            $result = $this->announcement;
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
