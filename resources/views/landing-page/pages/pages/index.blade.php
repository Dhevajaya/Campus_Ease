@extends("landing-page.layouts.main")

@section("title","Halaman")

@section("css")
@endsection

@section("preloader")
    @component("landing-page.components.preloader")
    @endcomponent
@endsection

@section("content")
<section class="hero-area">
    <div class="breadcrumbs-wrapper blue-dark-gradient">
        <div class="shape shape-one scene"><span data-depth="2"></span></div>
        <div class="shape shape-two scene"><span data-depth="3"></span></div>
        <div class="shape shape-three scene"><span data-depth="4"></span></div>
        <div class="shape shape-four scene"><span data-depth=".1"></span></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="page-title-text text-center">
                        <h1 class="title">{{$result->title}}</h1>
                        <ul class="breadcrumbs-link">
                            <li><a href="{{route('landing-page.home.index')}}">Beranda</a></li>
                            <li class="active">{{$result->title}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact-information-area pt-50 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center mb-5">
                    <h2>{{$result->title}}</h2>
                    <p>
                        <i class="fa fa-calendar" aria-hidden="true"></i> <span>{{date('l , d F Y',strtotime($result->published_at))}}</span>
                    </p>
                </div>
                {!! $result->trixRender('content') !!}
            </div>
        </div>
        
    </div>
</section>
@endsection

@section("scrolltop")
    @component("landing-page.components.scrolltop")
    @endcomponent
@endsection

@section("script")
@endsection

