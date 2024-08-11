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
        
                                <h4 class="text-muted text-center font-18"><b>{{ __('Verify Your Email Address') }}</b></h4>
        
                                <div class="p-2">
                                    <form class="form-horizontal m-t-20" method="POST" action="{{route('dashboard.auth.verification.send')}}">
                                        @csrf

                                        <p class="text-center">
                                            {{ __('Before proceeding, please check your email for a verification link.') }}
                                            {{ __('If you did not receive the email') }},
                                        </p>
        
                                        <div class="form-group text-center row m-t-20">
                                            <div class="col-12">
                                                <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">{{ __('click here to request another') }}</button>
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