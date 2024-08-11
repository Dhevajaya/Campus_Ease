@extends("dashboard.pages.auth.layouts.main")

@section("title","Verfikasi")

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
        
                                <h4 class="text-muted text-center font-18"><b>{{ __('Verify Email Address') }}</b></h4>
        
                                <div class="p-2 text-center">
                                    @auth
                                        <a href="{{ route('dashboard.dashboard.index') }}" class="btn btn-primary waves-effect waves-light">
                                            {{ __('Kembali ke Beranda') }}
                                        </a>
                                    @else
                                        <a href="{{ route('dashboard.auth.login.index') }}" class="btn btn-primary waves-effect waves-light">
                                            {{ __('Login') }}
                                        </a>
                                    @endauth
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