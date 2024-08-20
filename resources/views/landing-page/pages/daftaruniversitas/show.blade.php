{{-- @extends("landing-page.layouts.main")

@section("title","Daftar Universitas")

@section("css")
@endsection

@section("preloader")
    @component("landing-page.components.preloader")
    @endcomponent
@endsection
@section('content')
<br>
<br>
<div class="container text-justify" >
    <div class="row mx-1">
        <div class="col-12 col-lg-9">
            <img src="{{ asset('storage/' . $result->image) }}" class="card-img-top mb-3" alt="">
            <h1 class=""><b>{{ $result->title }}</b></h1>
            <style>
                img {
                    max-width: 100%;
                    height: auto;
                }
                .attachment__caption {
                    display: none !important;
                }
            </style>
            <p >{!! $result->renderTrix("content") !!}</p>
            <p class="demo">
                <p>Bagikan Juga</p>
                <button type="button" class="btn btn-icon btn-round btn-primary" id="share-facebook">
                    <i class='bx bxl-facebook'></i>
                </button>
                <button type="button" class="btn btn-icon btn-round btn-success" id="share-whatsapp">
                    <i class='bx bxl-whatsapp'></i>
                </button>
                <button type="button" class="btn btn-icon btn-round btn-info" id="share-twitter">
                    <i class='bx bxl-twitter'></i>
                </button>
            </p>
        </div>
        <div class="col-12 col-lg-3">
            <h2><b>daftaruniversitas Lainnya</b></h2>
            @forelse($except_result as $index => $row)
       
            <div class="card-body">
                <div class="">
                    <div class="">
                        <img src="{{ asset('storage/' . $row->image) }}" class="card-img-top" alt="">
                    </div>
                    <div class="flex-1 ms-3 pt-1">
                        <a href="{{ route('landing-page.daftaruniversitas.show', $row->id) }}"><h6 class="text-uppercase fw-bold mb-1">{{ $row->title }}</h6></a>
                    </div>
                 
                </div>
            </div>
            <div class="card-footer m-2">
            </div>
            @empty
                        
            @endforelse
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    // Facebook Share
    document.getElementById('share-facebook').onclick = function() {
        let url = encodeURIComponent(window.location.href);
        let facebookShareUrl = `https://www.facebook.com/sharer/sharer.php?u=${url}`;
        window.open(facebookShareUrl, '_blank');
    };

    // WhatsApp Share
    document.getElementById('share-whatsapp').onclick = function() {
        let text = encodeURIComponent(document.title + " " + window.location.href);
        let whatsappShareUrl = `https://api.whatsapp.com/send?text=${text}`;
        window.open(whatsappShareUrl, '_blank');
    };

    // Twitter Share
    document.getElementById('share-twitter').onclick = function() {
        let text = encodeURIComponent(document.title);
        let url = encodeURIComponent(window.location.href);
        let twitterShareUrl = `https://twitter.com/intent/tweet?text=${text}&url=${url}`;
        window.open(twitterShareUrl, '_blank');
    };
</script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
@endsection --}}

@extends("landing-page.layouts.main")

@section("title","Pengumuman")

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
                            <li><a href="{{route('landing-page.daftaruniversitas.index')}}">Pengumuman</a></li>
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

