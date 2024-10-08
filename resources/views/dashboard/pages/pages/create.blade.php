@extends("dashboard.layouts.main")

@section("title","Pages")

@section("css")
<!-- Datetime picker -->
<link rel="stylesheet" href="{{URL::to('/')}}/templates/dashboard/assets/plugins/datetimepicker/jquery.datetimepicker.css">
@endsection

@section("breadcumb")
<div class="row">
    <div class="col-sm-12">
        <div class="float-right page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item">Pages</li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </div>
        <h5 class="page-title">Pages</h5>
    </div>
</div>
@endsection

@section("content")

@trixassets

<div class="row">
    <div class="col-xl-12">
        <div class="card m-b-30">
            <div class="card-body">
                <form action="{{route('dashboard.pages.store')}}" method="post" autocomplete="off" onsubmit="confirm('Apakah anda yakin ingin mengirim data ini?')" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Judul <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="title" placeholder="Judul"  value="{{old('title')}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Slug</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="slug" placeholder="Slug"  value="{{old('slug')}}" >
                                    <p class="text-info" style="margin-top: 0px;margin-bottom: 0px;padding-top: 0px;padding-bottom: 0px;"><small><i>Slug akan digenerate otomatis jika slug dikosongkan</i></small></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Konten <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    @trix(\App\Models\Page::class, 'content')
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Tanggal Publikasi <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control datetimepicker"name="published_at" value="{{old('published_at',date('Y-m-d H:i:s'))}}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="{{route('dashboard.pages.index')}}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
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
<!-- Datetimepicker -->
<script src="{{URL::to('/')}}/templates/dashboard/assets/plugins/moment/moment.min.js"></script>
<script src="{{URL::to('/')}}/templates/dashboard/assets/plugins/datetimepicker/jquery.datetimepicker.min.js"></script>
<script src="{{URL::to('/')}}/templates/dashboard/assets/plugins/axios/axios.min.jss"></script>
<script>
    $(function(){

        $.datetimepicker.setDateFormatter('moment');
        $.datetimepicker.setLocale('id');
        
        $('.datetimepicker').datetimepicker({
              format:'YYYY-MM-DD HH:mm:ss',
              formatTime:'HH:mm:ss',
              formatDate:'YYYY-MM-DD'
        });
    })
</script>
@endsection