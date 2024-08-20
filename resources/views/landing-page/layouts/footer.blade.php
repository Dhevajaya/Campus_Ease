<footer class="footer-area footer-default">
    <div class="container">
        <div class="footer-widget pt-100 pb-55">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget about-widget mb-40" data-aos="fade-up" data-aos-delay="30">
                        <div class="site-branding">
                            <a href="index.html"><img src="{{ asset('storage/'.web_settings('web', 'website_logo_dark'))}}" alt="Site Logo" style="width: 170px;height:auto;"></a>
                        </div>
                        <p>{{ web_settings('web', 'website_description') }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget footer-nav-widget mb-40" data-aos="fade-up" data-aos-delay="40">
                        <h4 class="widget-title">Profil</h4>
                        <ul class="footer-nav">
                            <li><a href="{{route('landing-page.pages.index','visi-misi')}}">Visi Misi</a></li>
                            <li><a href="{{route('landing-page.contact.index')}}">Hubungi Kami</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget footer-nav-widget" data-aos="fade-up" data-aos-delay="50">
                        <div class="widget footer-nav-widget mb-40">
                            <h4 class="widget-title">Link Cepat</h4>
                            <ul class="footer-nav">
                                <li><a href="{{route('landing-page.daftaruniversitas.index')}}">Daftar Universitas</a></li>
                                <li><a href="{{route('landing-page.achievements.index')}}">Prestasi</a></li>
                                <li><a href="{{route('landing-page.employees.index')}}">Guru</a></li>
                                <li><a href="{{route('landing-page.faq.index')}}">Faq</a></li>
                                <li><a href="{{route('landing-page.file-public.index')}}">File Publik</a></li>
                                <li><a href="{{route('landing-page.announcements.index')}}">Pengumuman</a></li>
                                <li><a href="{{route('landing-page.pages.index','privacy-policy')}}">Privacy Policy</a></li>
                                <li><a href="{{route('landing-page.pages.index','term-and-conditions')}}">Terms and Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget contact-info-widget mb-40" data-aos="fade-up" data-aos-delay="60">
                        <h4 class="widget-title">Informasi</h4>
                        <ul class="info-list">
                            <li><span><i class="far fa-phone"></i><a href="tel:{{ web_settings('web', 'website_phone') }}">{{ web_settings('web', 'website_phone') }}</a></span></li>
                            <li><span><i class="far fa-envelope-open-text"></i><a href="{{ web_settings('web', 'website_email') }}">{{ web_settings('web', 'website_email') }}</a></span></li>
                            <li><span><i class="far fa-map-marker-alt"></i>{{ web_settings('web', 'website_address') }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text text-center">
                        <p>© {{ date('Y') }} <b>{{ config('app.name') }}.</b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>