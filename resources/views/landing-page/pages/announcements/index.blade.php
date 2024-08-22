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
                        <h1 class="title">Beasiswa</h1>
                        <ul class="breadcrumbs-link">
                            <li><a href="{{route('landing-page.home.index')}}">Beranda</a></li>
                            <li class="active">Beasiswa</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact-information-area pt-5 pb-70">
    <div class="container">
        <div class="row">
            @foreach ($table as $index => $row)
            <div class="col-12 mb-3">
                <div class="block-style-one">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{asset('storage/'.$row->cover)}}" style="width: 100%;height:100px;">
                            <p class="text-center mt-3"><small>{{date('d F Y',strtotime($row->date))}}</small></p>
                        </div>
                        <div class="col-md-9">
                            <h3>{{$row->title}}</h3>
                            <p>{{$row->fragment}}</p>
                            <p class="mt-2"><small>Dipublikasi Pada: {{date('d F Y H:i:s',strtotime($row->published_at))}}</small></p>
                            <a href="{{route('landing-page.announcements.show',$row->slug)}}" class="btn btn-primary btn-sm mt-3">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {!!$table->links()!!}
    </div>
</section>
@endsection

@section("scrolltop")
    @component("landing-page.components.scrolltop")
    @endcomponent
@endsection

@section("script")
@endsection

