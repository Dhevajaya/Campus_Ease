@extends('landing-page.layouts.main')

@section('title', 'Diskusi')

@section('css')
@endsection

@section('preloader')
    @component('landing-page.components.preloader')
    @endcomponent
@endsection


@section('content')
<div class="container">
    <br>
    <br>
    <br>
    <br>
    <br>
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
@endsection




@section('scrolltop')
    @component('landing-page.components.scrolltop')
    @endcomponent
@endsection

@section('script')
@endsection
