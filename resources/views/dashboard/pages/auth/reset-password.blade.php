@extends("dashboard.pages.auth.layouts.main")

@section("title","Reset Password")

@section("css")
@endsection

@section("content")
<div class="accountbg">
            
    <div class="content-center">
        <div class="content-desc-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-8">
                        <div class="card">
                            <div class="card-body">
        
                                <h3 class="text-center mt-0 m-b-15">
                                    <a href="{{route('dashboard.auth.reset-password.index')}}" class="logo logo-admin"><img src="{{ asset('storage/'.web_settings('web', 'website_logo_dark'))}}" height="30" alt="logo"></a>
                                </h3>
        
                                <h4 class="text-muted text-center font-18"><b>Reset Password</b></h4>
        
                                <div class="p-2">
                                    @component('dashboard.components.alert')
                                        @slot("class")
                                            warning
                                        @endslot
                                        @slot("title")
                                        @endslot
                                        <b>Masukkan alamat email dan kata sandi terbaru Anda.<br> Pastikan Anda mencatat kata sandi tersebut, agar Anda tidak kehilangannya kembali.</b>
                                    @endcomponent

                                    <form class="form-horizontal m-t-20" method="POST" action="{{route('dashboard.auth.reset-password.post')}}">
                                        @csrf
                                        
                                        <input type="hidden" name="token" value="{{$token}}">

                                        <div class="form-group row">
                                            <div class="col-12">
                                                <input class="form-control" type="email" required placeholder="Email" name="email" value="{{$email}}">
                                            </div>
                                        </div>
        
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <input class="form-control" type="password" required placeholder="Password" name="password">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12">
                                                <input class="form-control" type="password" required placeholder="Konfirmasi Password" name="password_confirmation">
                                            </div>
                                        </div>
        
                                        <div class="form-group text-center row m-t-20">
                                            <div class="col-12">
                                                <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Reset</button>
                                            </div>
                                        </div>
        
                                        <div class="form-group m-t-10 mb-0 row">
                                            <div class="col-sm-7 m-t-20">
                                                <a href="{{route('dashboard.auth.login.index')}}" class="text-muted"><i class="mdi mdi-lock"></i> Sudah Punya Akun ? Login Sekarang</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
        
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
</div>
@endsection