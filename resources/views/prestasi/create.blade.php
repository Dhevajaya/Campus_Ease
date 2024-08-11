@extends("dashboard.layouts.main")

@section("title","Prestasi")

@section("css")
<!-- Datetime picker -->
<link rel="stylesheet" href="{{URL::to('/')}}/templates/dashboard/assets/plugins/datetimepicker/jquery.datetimepicker.css">
@endsection

@section("breadcumb")
<div class="row">
    <div class="col-sm-12">
        <div class="float-right page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Users</a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </div>
        <h5 class="page-title">Prestasi</h5>
    </div>
</div>
@endsection

@section("content")
<div class="row">
    <div class="col-xl-12">
        <div class="card m-b-30">
            <div class="card-body">
                <form action="{{route('dashboard.users.store')}}" method="post" autocomplete="off" onsubmit="confirm('Apakah anda yakin ingin mengirim data ini?')" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" value="{{old('name')}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Email <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input type="email" class="form-control" name="email" placeholder="Email" value="{{old('email')}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Username <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="username" placeholder="Username" value="{{old('username')}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">No.HP <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="phone" placeholder="No.HP" value="{{old('phone')}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Foto</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="file" name="avatar" accept="image/*">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Password <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Konfirmasi Password <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Password Konfirmasi" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Email Verified At</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control datetimepicker" name="email_verified_at" placeholder="Email Verified At" value="{{old('email_verified_at')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Role<span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <select name="roles" class="form-control select2" name="roles" required>
                                        <option value="">==Pilih Role==</option>
                                        @foreach ($roles as $index => $row)
                                        <option value="{{$row}}" @if($row == old('roles')) selected @endif>{{$row}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Status<span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <select class="form-control select2 " name="status" style="width: 100%;" required>
                                        <option value="">==Pilih Status==</option>
                                        @foreach ($status as $index => $row)
                                        <option value="{{$index}}" @if($index == old('status')) selected @endif>{{$row}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="{{route('dashboard.file-public.index')}}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
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