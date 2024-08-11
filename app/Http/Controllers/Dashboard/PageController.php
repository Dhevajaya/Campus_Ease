<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Page\StoreRequest;
use App\Http\Requests\Page\UpdateRequest;
use App\Models\Page;
use App\Helpers\SlugHelper;
use Auth;

class PageController extends Controller
{
    public function __construct(){
        $this->route = "dashboard.pages.";
        $this->view = "dashboard.pages.pages.";
        $this->page = new Page();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $table = $this->page;

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
            $slug = $request->slug;
            $published_at = $request->published_at;

            if(empty($slug)){
                $slug = SlugHelper::generate(Page::class,$title,"slug");
            }
            else{
                $checkExistSlug = $this->page;
                $checkExistSlug = $checkExistSlug->where("slug",$slug);
                $checkExistSlug = $checkExistSlug->first();

                if($checkExistSlug){
                    throw new Error("Slug sudah digunakan");
                }
            }

            $create = $this->page->create([
                'user_id' => Auth::user()->id,
                'title' => $title,
                'slug' => $slug,
                'published_at' => $published_at,
                'page-trixFields' => $request->input('page-trixFields'),
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
        $result = $this->page;
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
        $result = $this->page;
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
            $result = $this->page;
            $result = $result->where('id',$id);
            $result = $result->first();

            if(!$result){
                throw new Error("Data tidak ditemukan");
            }

            $title = $request->title;
            $slug = $request->slug;
            $published_at = $request->published_at;

            if(empty($slug)){
                $slug = $result->slug;
            }
            else{
                $checkExistSlug = $this->page;
                $checkExistSlug = $checkExistSlug->where("slug",$slug);
                $checkExistSlug = $checkExistSlug->where("id","!=",$result->id);
                $checkExistSlug = $checkExistSlug->first();

                if($checkExistSlug){
                    throw new Error("Slug sudah digunakan");
                }
            }

            $result->update([
                'title' => $title,
                'slug' => $slug,
                'published_at' => $published_at,
                'page-trixFields' => $request->input('page-trixFields'),
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
            $result = $this->page;
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
