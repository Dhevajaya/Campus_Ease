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
                            <h1 class="title">Tambah Diskusi</h1>
                            <ul class="breadcrumbs-link">
                                <li><a href="{{ route('landing-page.home.index') }}">Beranda</a></li>
                                <li class="active">Tambah Diskusi</li>
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
                    <form method="POST" action="{{ route('landing-page.discussions.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="title">Judul</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="body">Pertanyaan</label>
                            <textarea name="body" id="body" class="form-control" style="width: 100%; height: 200px;">{{ old('body') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
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
