@extends('admin.template.main')
@section('breadcrumb')
<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">
    Detail Jawaban Responden
    <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>

    <small class="text-muted fs-7 fw-bold my-1 ms-1">Jawaban Responden</small>
</h1>
@endsection

@push('css')
@livewireStyles
@endpush

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <a href="{{ route('report.respondent') }}" data-toggle="tooltip" title="Kembali" class="btn btn-icon btn-light-success btn-sm mr-5">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h3 class="card-label">&nbsp;&nbsp;Jawaban Responden {{$respondent->name}}
                </h3>
    
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="" enctype="multipart/form-data" method="post">
                        @foreach ($respondent->responses as $response)
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-custom">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <h5>{{$response->question->content}}</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 validated">
                                                <div class="radio-list ">
                                                    @foreach ($response->question->answers as $answer)
                                                        <!--begin::Radio-->
                                                        <div class="form-check form-check-custom form-check-solid mb-5">
                                                            <!--begin::Input-->
                                                            <input {{$response->answer_id == $answer->id?'checked':'disabled'}} class="form-check-input me-3" name="radio{{$answer->id}}" type="radio" value="{{$answer->id}}" id="kt_docs_formvalidation_radio_option_1" />
                                                            <!--end::Input-->
                                                            <!--begin::Label-->
                                                            <label class="form-check-label" for="kt_docs_formvalidation_radio_option_1">
                                                                <div class="fw-bolder text-gray-800">{{$answer->answer}}</div>
                                                            </label>
                                                            <!--end::Label-->
                                                        </div>
                                                        <!--end::Radio-->
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
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
