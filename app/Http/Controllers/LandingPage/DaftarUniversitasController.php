<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DaftarUniversitas;

class DaftarUniversitasController extends Controller
{
    public function __construct(){
        $this->route = "landing-page.daftaruniversitas.";
        $this->view = "landing-page.pages.daftaruniversitas.";
        $this->daftaruniversitas = new DaftarUniversitas();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $table = $this->daftaruniversitas;
    //     $table = $table->orderBy("created_at","DESC");
    //     $table = $table->get();

    //     $data = [
    //         'table' => $table
    //     ];

    //     return view($this->view."index",$data);
    // }
    public function index(Request $request)
    {
        $search = $request->search;
        $province = $request->province;
    
        $table = $this->daftaruniversitas;
    
        if(!empty($search)){
            $table = $table->where('title', 'like', '%' . $search . '%');
        }
    
        if(!empty($province)){
            $table = $table->where('province', $province);
        }
    
        $table = $table->orderBy('created_at', 'DESC');
        $table = $table->paginate(10)->withQueryString();
    
        $data = [
            'table' => $table,
            'provinces' => DaftarUniversitas::select('province')->distinct()->get(),
        ];
    
        return view($this->view."index",$data);
    }
    
    public function show($id){

        $result = $this->daftaruniversitas;
        $result = $result->where('id',$id);
        $result = $result->first();

        $except_result = $this->daftaruniversitas;
        $except_result = $except_result->where('id','!=',$id);
        $except_result = $except_result->orderBy("created_at","DESC");      //sort descending by time created data
        $except_result = $except_result->paginate(3);   //limit paginate only 10 data appears per load

        if(!$result){
            alert()->error('Gagal',"Data tidak ditemukan");
            return redirect()->route($this->route."index");
        }

        $data = [
            'result' => $result,
            'except_result' => $except_result,
        ];
        //view count in show daftaruniversitas

        return view($this->view."show",$data);
    }
    
}
