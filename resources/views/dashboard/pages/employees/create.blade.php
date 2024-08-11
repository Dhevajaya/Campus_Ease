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
                <li class="breadcrumb-item">Employee</li>
                <li class="breadcrumb-item active">Create</li>
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
                <form action="{{route('dashboard.employees.store')}}" method="post" autocomplete="off" onsubmit="confirm('Apakah anda yakin ingin mengirim data ini?')" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Nama Pegawai <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="name" placeholder="Nama Pegawai"  value="{{old('name')}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">No.HP Pegawai <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="phone" placeholder="No.HP Pegawai"  value="{{old('phone')}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Jabatan Pegawai <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="position" placeholder="Jabatan Pegawai"  value="{{old('position')}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Foto <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="file" name="image" accept="image/*" required>
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