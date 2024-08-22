@extends("dashboard.layouts.main")

@section("title","Beasiswa")

@section("css")
@endsection

@section("breadcumb")
<div class="row">
    <div class="col-sm-12">
        <div class="float-right page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Beasiswa</a></li>
                <li class="breadcrumb-item">Show</li>
                <li class="breadcrumb-item active">{{$result->id}}</li>
            </ol>
        </div>
        <h5 class="page-title">Beasiswa</h5>
    </div>
</div>
@endsection

@section("content")
<div class="row">
    <div class="col-xl-12">
        <div class="card m-b-30">
            <div class="card-body">
                <h5 class="card-title mb-3">Informasi Beasiswa</h5>   

                <div class="row mb-2">
                    <div class="col-md-3">
                        Cover
                    </div>
                    <div class="col-md-8">
                        : <br><img src="{{asset('storage/'.$result->cover)}}" style="width: 150px;height:150px;"/>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-3">
                        Slug
                    </div>
                    <div class="col-md-8">
                        : {{$result->slug}}
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-3">
                        Judul
                    </div>
                    <div class="col-md-8">
                        : {{$result->title}}
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-3">
                        Penggalan Konten
                    </div>
                    <div class="col-md-8">
                        : {{$result->fragment}}
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-3">
                        Konten
                    </div>
                    <div class="col-md-8">
                        : {!! $result->trixRender('content') !!}
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-3">
                        Tanggal Beasiswa
                    </div>
                    <div class="col-md-8">
                        : {{ date('d-m-Y',strtotime($result->date)) }}
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-3">
                        Tanggal Publikasi
                    </div>
                    <div class="col-md-8">
                        : {{ date('d-m-Y H:i:s',strtotime($result->published_at)) }}
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-3">
                        Tanggal Dibuat
                    </div>
                    <div class="col-md-8">
                        : {{ date('d-m-Y H:i:s',strtotime($result->created_at)) }}
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-3">
                        Tanggal Diperbarui
                    </div>
                    <div class="col-md-8">
                        : {{ date('d-m-Y H:i:s',strtotime($result->updated_at)) }}
                    </div>
                </div>

                <div class="mt-5">
                    <a href="{{route('dashboard.announcements.index')}}" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
                    <a href="{{route('dashboard.announcements.edit',$result->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                    <a href="#" class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash"></i> Hapus</a>
                </div>

            </div>
        </div>
    </div>
</div>

<form id="frmDelete" method="POST">
    @csrf
    @method('DELETE')
</form>
@endsection

@section("script")
<script>
    $(function(){

        $(document).on("click",".btn-delete",function(){
            if(confirm("Apakah anda yakin ingin menghapus data ini ?")){
                $("#frmDelete").attr("action", "{{ route('dashboard.announcements.destroy', '_id_') }}".replace("_id_", '{{$result->id}}'));
                $("#frmDelete").submit();
            }
        })
    })
</script>
@endsection