@extends('landing-page.layouts.main')

@section('title', 'Diskusi')

@section('css')
@endsection

@section('preloader')
    @component('landing-page.components.preloader')
    @endcomponent
@endsection


@section('content')
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
                        <h1 class="title">Diskusi</h1>
                        <ul class="breadcrumbs-link">
                            <li><a href="{{route('landing-page.home.index')}}">Beranda</a></li>
                            <li class="active">Diskusi</li>
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
        <div class="col-md-8">
            <div class="mb-4">
                <h1>Mari Bertukar Pikiran!</h1>
                <form action="{{ route('landing-page.discussions.index') }}" method="GET">
                    <input type="text" name="search" placeholder="Cari Topik Diskusi" class="form-control">
                </form>
            </div>
            @foreach ($discussions as $discussion)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5>{{ $discussion->title }}</h5>
                        <p class="text-muted">
                            {{ $discussion->created_at->diffForHumans() }} oleh {{ $discussion->user->name }}
                        </p>
                        <p>{{ Str::limit($discussion->body, 150) }}</p>
                        <a href="{{ route('landing-page.discussions.show', $discussion->id) }}" class="btn btn-primary">Lihat Diskusi</a>
                    </div>
                </div>
            @endforeach

            {{ $discussions->links() }}
        </div>

        <div class="col-md-4">
            <a href="{{ route('landing-page.discussions.create') }}" class="btn btn-primary w-100 mb-3">Buat Pertanyaan atau Topik</a>
            <div class="card">
                <div class="card-header">Tampilkan</div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li><input type="checkbox" checked> Semua Diskusi</li>
                        <li><input type="checkbox"> Pertanyaan Saya</li>
                        <li><input type="checkbox"> Jawaban Saya</li>
                        <li><input type="checkbox"> Diskusi Terbaru</li>
                        <li><input type="checkbox"> Diskusi Lama</li>
                        <li><input type="checkbox"> Belum Ada Balasan</li>
                    </ul>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">Topik Ramai</div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li>
                            <a href="#">Tiktok Ads</a>
                            <small class="text-muted">Lorem Ipsum is simply dummy text of the printing...</small>
                        </li>
                        <li>
                            <a href="#">Gitlab Basic</a>
                            <small class="text-muted">Lorem Ipsum is simply dummy text of the printing...</small>
                        </li>
                        <li>
                            <a href="#">Mulai Develop</a>
                            <small class="text-muted">Lorem Ipsum is simply dummy text of the printing...</small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

@endsection




@section('scrolltop')
    @component('landing-page.components.scrolltop')
    @endcomponent
@endsection

@section('script')
@endsection
