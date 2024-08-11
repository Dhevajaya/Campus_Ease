@extends("dashboard.layouts.main")

@section("title","Faq")

@section("css")
@endsection

@section("breadcumb")
<div class="row">
    <div class="col-sm-12">
        <div class="float-right page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Faq</a></li>
                <li class="breadcrumb-item">Faq</li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </div>
        <h5 class="page-title">Faq</h5>
    </div>
</div>
@endsection

@section("content")
<div class="row">
    <div class="col-xl-12">
        <div class="card m-b-30">
            <div class="card-body">
                <form action="{{route('dashboard.faq.store')}}" method="post" autocomplete="off" onsubmit="confirm('Apakah anda yakin ingin mengirim data ini?')" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Pertanyaan <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="questions" placeholder="Pertanyaan"  value="{{old('questions')}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Jawaban <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="answer" placeholder="Jawaban">{{old('answer')}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="{{route('dashboard.faq.index')}}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section("script")
@endsection