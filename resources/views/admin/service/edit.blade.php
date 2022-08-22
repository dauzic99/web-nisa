@extends('admin.template.main')
@section('breadcrumb')
<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">
    Unsur Pelayan
    <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>

    <small class="text-muted fs-7 fw-bold my-1 ms-1"> Ubah Data</small>
</h1>
@endsection

@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('service.update',$service) }}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('put')
                        <h3 class="mb-5">Ubah Data Unsur Pelayanan</h3>

                        <div class="col-md-7">
                            <div class="mb-10">
                                <label for="name" class="required form-label">Nama Unsur Pelayanan</label> <br>
                                <input type="text" value="{{ old('name',$service->name) }}" class=" @error('name') is-invalid  @enderror form-control form-control" name="name" />
                                @error('name')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection