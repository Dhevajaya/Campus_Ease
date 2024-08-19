<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\DaftarUniversitas;
use App\Models\Employee;

class HomeController extends Controller
{
    public function __construct(){
        $this->route = "landing-page.home.";
        $this->view = "landing-page.pages.home.";
        $this->announcement = new Announcement();
        $this->daftaruniversitas = new DaftarUniversitas();
        $this->employee = new Employee();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = $this->announcement;
        $announcements = $announcements->orderBy("created_at","DESC");
        $announcements = $announcements->limit(3);
        $announcements = $announcements->get();

        $daftaruniversitas = $this->daftaruniversitas;
        $daftaruniversitas = $daftaruniversitas->orderBy("created_at","DESC");
        $daftaruniversitas = $daftaruniversitas->limit(3);
        $daftaruniversitas = $daftaruniversitas->get();

        $employee = $this->employee;
        $employee = $employee->orderBy("created_at","DESC");
        $employee = $employee->limit(4);
        $employee = $employee->get();

        $data = [
            'announcements' => $announcements,
            'daftaruniversitas' => $daftaruniversitas,
            'employee' => $employee,
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
