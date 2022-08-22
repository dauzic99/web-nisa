@extends('admin.template.main')
@section('breadcrumb')
<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">
    {{$title}}
    <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>

    <small class="text-muted fs-7 fw-bold my-1 ms-1"> Tambah Data</small>
</h1>
@endsection

@push('css')
@livewireStyles
@endpush

@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('question.store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <h3 class="mb-5">Tambah Data {{$title}}</h3>

                        <div class="col-md-7">
                            <div class="mb-10">
                                <label for="service_id" class="required form-label">Unsur Pelayanan</label> <br>
                                <select class="form-select" name="service_id" data-control="select2" data-placeholder="Pilih unsur pelayanan">
                                    <option></option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                                    @endforeach
                                </select>
                                @error('service_id')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="mb-10">
                                <label for="content" class="required form-label">Pertanyaan</label> <br>
                                <textarea class="form-control @error('content') is-invalid  @enderror" name="content" id="content" rows="1">{{ old('content') }}</textarea>
                                @error('content')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        @livewire('create-answer-form')
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

@push('js')
<script>
    "use strict";
    // Class definition
    var initPage = function () {
    
        var errorValidation = function (){
    
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
    
            var error = '{{ $errors->first() }}'
            if (error) {
                toastr.error(error);
            }
        }
    
        var initForm = function () {
            var contentInput = $('#content');
            autosize(contentInput);
        }
        return {
            // public functions
            init: function() {
                errorValidation();
                initForm();
            }
        };
    }();
    
    $(document).ready(function() {
        initPage.init();
    });
    </script>
@livewireScripts
@endpush
