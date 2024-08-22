@extends("landing-page.layouts.main")

@section("title","Daftar Universitas")

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
                        <h1 class="title">Daftar Universitas</h1>
                        <ul class="breadcrumbs-link">
                            <li><a href="{{route('landing-page.home.index')}}">Beranda</a></li>
                            <li class="active">Daftar Universitas</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="features-area pb-90 mt-5">
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($table as $index => $row)
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="block-style-one block-icon-animate animated-hover-icon mb-40" data-aos="fade-up" data-aos-delay="30">
                    <a class="image-popup" href="{{asset('storage/'.$row->image)}}" style="width: 100%;height:200px;">
                        <img src="{{asset('storage/'.$row->image)}}" alt="{{$row->title}}" style="width: 100%;height:100%;">
                    </a>
                    <a href="{{route('landing-page.daftaruniversitas.show', $row->id)}}"> <p class="text-center mt-1">{{$row->title}}</p></a>
                </div>
            </div>
            @endforeach
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

