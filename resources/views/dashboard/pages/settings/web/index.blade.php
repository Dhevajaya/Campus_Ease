@extends("dashboard.layouts.main")

@section("title","Setting")

@section("css")
@endsection

@section("breadcumb")
<div class="row">
    <div class="col-sm-12">
        <div class="float-right page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Setting</a></li>
                <li class="breadcrumb-item active">Setting</li>
            </ol>
        </div>
        <h5 class="page-title">Setting</h5>
    </div>
</div>
@endsection

@section("content")
<div class="row">
    <div class="col-xl-12">
        <div class="card m-b-30">
            <div class="card-body">
                <form action="{{route('dashboard.settings.web.update')}}" method="post" autocomplete="off" onsubmit="confirm('Apakah anda yakin ingin mengirim data ini?')" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Nama Website <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="website_name" placeholder="Nama Website" value="{{old('website_name',$result->website_name)}}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Kata Kunci Website <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="website_keywords" placeholder="Kata Kunci Website" value="{{old('website_keywords',$result->website_keywords)}}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Deskripsi Website <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <textarea rows="3" class="form-control" name="website_description">{{old('website_description',$result->website_description)}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">No.HP Website <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="website_phone" placeholder="No.HP Website" value="{{old('website_phone',$result->website_phone)}}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Alamat Website <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="website_address" placeholder="Alamat Website" value="{{old('website_address',$result->website_address)}}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Email Website <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="website_email" placeholder="Email Website" value="{{old('website_email',$result->website_email)}}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Logo Website</label>
                                <div class="col-md-10">
                                    @if(!empty($result->website_logo))
                                    <div class="mb-2">
                                        <img src="{{asset('storage/'.$result->website_logo)}}" style="width: 80px;height:80px;">
                                    </div>
                                    @endif
                                    <input type="file" class="form-control" name="website_logo">
                                    <p class="text-info" style="margin-top: 0px;margin-bottom: 0px;padding-top: 0px;padding-bottom: 0px;"><small><i>Kosongkan jika tidak diubah</i></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Logo Website Dark</label>
                                <div class="col-md-10">
                                    @if(!empty($result->website_logo_dark))
                                    <div class="mb-2">
                                        <img src="{{asset('storage/'.$result->website_logo_dark)}}" style="width: 80px;height:80px;">
                                    </div>
                                    @endif
                                    <input type="file" class="form-control" name="website_logo_dark">
                                    <p class="text-info" style="margin-top: 0px;margin-bottom: 0px;padding-top: 0px;padding-bottom: 0px;"><small><i>Kosongkan jika tidak diubah</i></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Nama Kepala Sekolah <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="principal_name" placeholder="Nama Kepala Sekolah" value="{{old('principal_name',$result->principal_name)}}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Sambutan Kepala Sekolah <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <textarea rows="3" class="form-control" name="principal_welcome">{{old('principal_welcome',$result->principal_welcome)}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Foto Kepala Sekolah</label>
                                <div class="col-md-10">
                                    @if(!empty($result->principal_avatar))
                                    <div class="mb-2">
                                        <img src="{{asset('storage/'.$result->principal_avatar)}}" style="width: 80px;height:80px;">
                                    </div>
                                    @endif
                                    <input type="file" class="form-control" name="principal_avatar">
                                    <p class="text-info" style="margin-top: 0px;margin-bottom: 0px;padding-top: 0px;padding-bottom: 0px;"><small><i>Kosongkan jika tidak diubah</i></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Foto Banner Home</label>
                                <div class="col-md-10">
                                    @if(!empty($result->home_banner))
                                    <div class="mb-2">
                                        <img src="{{asset('storage/'.$result->home_banner)}}" style="width: 80px;height:80px;">
                                    </div>
                                    @endif
                                    <input type="file" class="form-control" name="home_banner">
                                    <p class="text-info" style="margin-top: 0px;margin-bottom: 0px;padding-top: 0px;padding-bottom: 0px;"><small><i>Kosongkan jika tidak diubah</i></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Kata Kata Banner</label>
                                <div class="col-md-10">
                                    <textarea rows="3" class="form-control" name="home_quotes">{{old('home_quotes',$result->home_quotes)}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="{{route('dashboard.settings.web.index')}}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
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