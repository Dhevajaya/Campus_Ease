
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
                            <li><a href="{{route('landing-page.daftaruniversitas.index')}}">Beasiswa</a></li>
                            <li class="active">{{$result->title}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog-details-section mt-5 mb-70">
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
         <p>{!! $result->trixRender('content') !!}</p>
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
            <h2><b>Universitas Lainnya</b></h2>
            @forelse($except_result as $index => $row)
       
            <div class="card-body">
                <div class="">
                    <div class="">
                        <img src="{{ asset('storage/' . $result->image) }}" class="card-img-top" alt="">
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
</section>
@endsection

@section("scrolltop")
    @component("landing-page.components.scrolltop")
    @endcomponent
@endsection

@section("script")
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
@endsection


 

