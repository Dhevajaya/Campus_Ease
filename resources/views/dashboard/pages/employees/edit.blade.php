@extends("dashboard.layouts.main")

@section("title","Employee")

@section("css")
@endsection

@section("breadcumb")
<div class="row">
    <div class="col-sm-12">
        <div class="float-right page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Employee</a></li>
                <li class="breadcrumb-item">Edit</li>
                <li class="breadcrumb-item active">{{$result->id}}</li>
            </ol>
        </div>
        <h5 class="page-title">Employee</h5>
    </div>
</div>
@endsection

@section("content")
<div class="row">
    <div class="col-xl-12">
        <div class="card m-b-30">
            <div class="card-body">
                <form action="{{route('dashboard.employees.update',$result->id)}}" method="post" autocomplete="off" onsubmit="confirm('Apakah anda yakin ingin mengirim data ini?')" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Nama Pegawai <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="name" placeholder="Nama Pegawai"  value="{{old('name',$result->name)}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">No.HP Pegawai <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="phone" placeholder="No.HP Pegawai"  value="{{old('phone',$result->phone)}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Jabatan Pegawai <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="position" placeholder="Jabatan Pegawai"  value="{{old('position',$result->position)}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Foto</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="file" name="image" accept="image/*">
                                    <p class="text-info" style="margin-top: 0px;margin-bottom: 0px;padding-top: 0px;padding-bottom: 0px;"><small><i>Kosongkan jika tidak diubah</i></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="{{route('dashboard.employees.index')}}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section("script")
@endsection