@extends("landing-page.layouts.main")

@section("title","Home")

@section("css")
@endsection

@section("preloader")
    @component("landing-page.components.preloader")
    @endcomponent
@endsection

@section("content")
<!--====== Start Hero Section ======-->
<section class="hero-area hero-style-three bg_cover" style="background-image: url({{URL::to('/')}}/templates/landing-page/assets/images/hero/bg.png);">
    <div class="shape shape-one scene"><span data-depth="3"></span></div>
    <div class="shape shape-two scene"><span data-depth="5"></span></div>
    <div class="shape shape-three scene"><span data-depth="4"></span></div>
    <div class="shape shape-four scene"><span data-depth=".5"></span></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="hero-content">
                    {{-- <h2 class="text-white" data-aos="fade-up" data-aos-delay="80">Selamat datang di Campus Ease {{ config('app.name') }}</h2> --}}
                    <h2 class="text-white" data-aos="fade-up" data-aos-delay="80">Selamat datang di {{ web_settings('web', 'website_name') }}</h2>
                    <p data-aos="fade-up" data-aos-delay="90">{{ web_settings('web', 'home_quotes') }}</p>
                    <a href="{{route('landing-page.contact.index')}}" class="main-btn btn-gradient-yellow" data-aos="fade-up" data-aos-delay="100">Hubungi Kami</a>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="hero-img" data-aos="fade-left" data-aos-delay="50">
                    <img src="{{ asset('storage/'.web_settings('web', 'home_banner')) }}" alt="">
                </div>
            </div>
        </div>
    </div>
</section><!--====== End Hero Section ======-->

<section class="features-area pb-30 pt-30">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="block-style-one block-icon-animate animated-hover-icon mb-40" data-aos="fade-up" data-aos-delay="30">
                    <h2 class="pb-3">Sambutan Kepala Sekolah</h2>
                    <div class="row">
                        <div class="col-lg-8">
                            {{ web_settings('web', 'principal_welcome') }}
                        </div>
                        <div class="col-lg-4">
                            <img src="{{asset('storage/'.web_settings('web', 'principal_avatar'))}}" alt="" style="width: 100%;height:300px;">
                            <p class="text-center">{{ web_settings('web', 'principal_name') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="features-area pb-90">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center mb-55" data-aos="fade-up">
                    <h2>Pengumuman</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($announcements as $index => $row)
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
        <div class="row mt-3">
            <div class="col-12 text-center">
                <a href="{{route('landing-page.announcements.index')}}" class="main-btn btn-blue-dark">Lihat Semua Pengumuman</a>
            </div>
        </div>
    </div>
</section>

<section class="features-area pb-90">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center mb-55" data-aos="fade-up">
                    <h2>Galeri Kegiatan</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($daftaruniversitas as $index => $row)
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="block-style-one block-icon-animate animated-hover-icon mb-40" data-aos="fade-up" data-aos-delay="30">
                    <a class="image-popup" href="{{asset('storage/'.$row->image)}}">
                        <img src="{{asset('storage/'.$row->image)}}" alt="{{$row->title}}">
                    </a>
                    <p class="text-center mt-1">{{$row->title}}</p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <a href="{{route('landing-page.daftaruniversitas.index')}}" class="main-btn btn-blue-dark">Lihat Semua Galeri</a>
            </div>
        </div>
    </div>
</section>

<section class="team-area team-style-one pb-90">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center mb-55" data-aos="fade-up">
                    <h2>Tenaga Pendidik dan Karyawan</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($employee as $index => $row)
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="team-item mb-40" data-aos="fade-up" data-aos-delay="30">
                    <div class="img-holder">
                        <img src="{{ asset('storage/'.$row->image) }}" alt="Team Image">
                        <div class="team-hover">
                            <div class="hover-content text-center">
                                <h5><a href="#">{{ $row->name }}</a></h5>
                                <p class="position">{{ $row->position }}</p>
                                <p class="position"><small>{{ $row->phone }}</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <a href="{{route('landing-page.employees.index')}}" class="main-btn btn-blue-dark">Lihat Semua Guru</a>
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

