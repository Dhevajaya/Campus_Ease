@extends("landing-page.layouts.main")

@section("title","Hubungi Kami")

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
                        <h1 class="title">Hubungi Kami</h1>
                        <ul class="breadcrumbs-link">
                            <li><a href="{{route('landing-page.home.index')}}">Beranda</a></li>
                            <li class="active">Hubungi Kami</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact-information-area pt-120 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="text-weapper mb-50">
                    <div class="section-title mb-20">
                        <h2>Hubungi Kami</h2>
                    </div>
                    <div class="information-list">
                        <div class="information-item d-flex mb-30 animated-hover-icon">
                            <div class="icon">
                                <i class="far fa-phone"></i>
                            </div>
                            <div class="text">
                                <h5>Telepon</h5>
                                <p><a href="tel:{{ web_settings('web', 'website_phone') }}">{{ web_settings('web', 'website_phone') }}</a></p>
                            </div>
                        </div>
                        <div class="information-item d-flex mb-30 animated-hover-icon">
                            <div class="icon">
                                <i class="far fa-envelope-open"></i>
                            </div>
                            <div class="text">
                                <h5>Email</h5>
                                <p><a href="mailto:{{ web_settings('web', 'website_email') }}">{{ web_settings('web', 'website_email') }}</a></p>
                            </div>
                        </div>
                        <div class="information-item d-flex mb-30 animated-hover-icon">
                            <div class="icon">
                                <i class="fal fa-map-marker-alt"></i>
                            </div>
                            <div class="text">
                                <h5>Alamat</h5>
                                <p>{{ web_settings('web', 'website_address') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="contact-form">
                    <form method="post" action="{{route('landing-page.contact.store')}}" onsubmit="confirm('Apakah anda yakin ingin mengirim data ini?')">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form_group">
                                    <input type="text" class="form_control" placeholder="Nama Lengkap" name="name" value="{{old('name')}}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form_group">
                                    <input type="email" class="form_control" placeholder="Email" name="email" value="{{old('email')}}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form_group">
                                    <textarea name="message" class="form_control" placeholder="Pesan">{{old('message')}}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form_group text-center">
                                    <button class="main-btn btn-gradient-yellow">Kirim Pesan</button>
                                </div>
                            </div>
                        </div>
                    </form>
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

