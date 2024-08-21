@extends("landing-page.layouts.main")

@section("title","Tenaga Pendidik dan Pegawai")

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
                        <h1 class="title">Tim Pengembang</h1>
                        <ul class="breadcrumbs-link">
                            <li><a href="{{route('landing-page.home.index')}}">Beranda</a></li>
                            <li class="active">Tim Pengembang</li>
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
            <div class="col-sm-12">
                <div class="card-deck">
                    <div class="row d-flex justify-content-center">
                      @foreach($table as $index => $row)
                      <div class="col-md-4 mb-3">
                        <div class="card">
                          <a class="image-popup" href="{{asset('storage/'.$row->image)}}">
                            <img src="{{ asset('storage/'.$row->image) }}" alt="{{ $row->name }}">
                          </a>
                          <div class="card-body text-center">
                            <h5 class="card-title">{{ $row->name }}</h5>
                            <p class="card-text">{{ $row->position }}</p>
                            <p class="card-text">{{ $row->phone }}</p>
                          </div>
                        </div>
                      </div>
                      @endforeach
                    </div>
                    <div class="row">
                      <div class="col-12">
                          {!!$table->links()!!}
                      </div>
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

