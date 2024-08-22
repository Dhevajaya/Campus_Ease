@extends("landing-page.layouts.main")

@section("title","Beasiswa")

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
                            <li><a href="{{route('landing-page.announcements.index')}}">Beasiswa</a></li>
                            <li class="active">{{$result->title}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog-details-section mt-5 mb-70">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-9">
                <div class="blog-details-wrapper mb-50">
                    <div class="blog-post-item" data-aos="fade-up" data-aos-delay="20">
                        <div class="img-holder">
                            <img src="{{asset('storage/'.$result->cover)}}" alt="{{$result->title}}" style="width: 100%;">
                        </div>
                        <div class="post-content">
                            <div class="post-meta">
                                <ul>
                                    <li><span class="date"><i class="far fa-calendar-alt"></i><a href="#">Dipublikasikan pada {{date('d F Y H:i:s',strtotime($result->published_at))}} oleh {{$result->user->name ?? null}}</a></span></li>
                                </ul>
                            </div>
                            <h3 class="title">{{$result->title}}</h3>
                            <p>{!! $result->trixRender('content') !!}</p>
                        </div>
                    </div>
                </div>
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

