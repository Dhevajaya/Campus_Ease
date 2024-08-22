@extends("landing-page.layouts.main")

@section("title","File Pembelajaran")

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
                        <h1 class="title">File Pembelajaran</h1>
                        <ul class="breadcrumbs-link">
                            <li><a href="{{route('landing-page.home.index')}}">Beranda</a></li>
                            <li class="active">File Pembelajaran</li>
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
            <div class="col-12">
                <h3 class="text-center py-5">File Pembelajaran</h3>
                <div class="table-responsive">
                    <table class="table mb-3">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Judul File</th>
                                <th>Deskripsi</th>
                                <th>Author</th>
                                <th>Dibuat Pada</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($table as $index => $row)
                            <tr>
                                <td>{{$table->firstItem() + $index}}</td>
                                <td>{{$row->title}}</td>
                                <td>{{$row->description}}</td>
                                <td>{{$row->user->name ?? null}}</td>
                                <td>{{date('d-m-Y H:i:s',strtotime($row->created_at))}}</td>
                                <td>
                                    <a href="{{asset('storage/'.$row->file)}}" download class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Download</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="10" class="text-center">Data tidak ditemukan</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {!!$table->links()!!}
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

