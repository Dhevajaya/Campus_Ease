@extends("dashboard.pages.auth.layouts.main")

@section("title","Login")

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
                                    <a href="{{route('dashboard.auth.login.index')}}" class="logo logo-admin"><img src="{{ asset('storage/'.web_settings('web', 'website_logo_dark'))}}" height="30" alt="logo"></a>
                                </h3>
        
                                <h4 class="text-muted text-center font-18"><b>LOGIN</b></h4>
        
                                <div class="p-2">
                                    <form class="form-horizontal m-t-20" method="POST" action="{{route('dashboard.auth.login.post')}}">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <input class="form-control" type="text" placeholder="Username" value="{{old('username')}}" name="username">
                                            </div>
                                        </div>
        
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <input class="form-control" type="password" placeholder="Password" name="password">
                                            </div>
                                        </div>
        
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1" name="rememberme">
                                                    <label class="custom-control-label" for="customCheck1">Ingat saya</label>
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="form-group text-center row m-t-20">
                                            <div class="col-12">
                                                <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>
                                            </div>
                                        </div>
        
                                        <div class="form-group m-t-10 mb-0 row">
                                            <div class="col-sm-7 m-t-20">
                                                <a href="{{route('dashboard.auth.forgot-password.index')}}" class="text-muted"><i class="mdi mdi-lock"></i> Lupa Password ?</a>
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