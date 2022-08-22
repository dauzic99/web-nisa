@extends('admin.template.main')
@section('breadcrumb')
<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">
    Unsur Pelayanan
    <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>

    <small class="text-muted fs-7 fw-bold my-1 ms-1"> Tambah Periode</small>
</h1>
@endsection

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('period.store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <h3 class="mb-5">Tambah Data Periode</h3>

                        <div class="col-md-7">
                            <div class="mb-10">
                                <label for="period" class="required form-label">Pilih Periode</label> <br>
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="radio" value="1" id="period1" name="period" {{ old('period') == 1 ?"checked":''}}/>
                                    <label class="form-check-label" for="period1">
                                        Periode <b>Januari - Juni</b>
                                    </label>
                                </div>
                                <br>
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="radio" value="2" id="period2" name="period" {{ old('period') == 2 ?"checked":''}}/>
                                    <label class="form-check-label" for="period2">
                                        Periode <b>Juli - Desember</b>
                                    </label>
                                </div>
                                @error('period')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="mb-10">
                                <label for="year" class="required form-label">Tahun Periode</label> <br>
                                <div class="input-group date">
                                    <input id="datepickeryear"  name="year" type="text" value="{{ old('year') }}" class="form-control" readonly placeholder="Tahun Periode cth: 2020"/>
                                </div>
                                @error('year')
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

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    "use strict";
    // Class definition
    var initPage = function () {

        var statusToast = function () {
            const status = '{{ session("status") }}'
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

            if (status) {
                toastr.success(status);
            }
        }
        var errorToast = function () {
            const error = '{{ $errors->first() }}'
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

            if (error) {
                console.log(error);
                toastr.error(error);
            }
        }
        var yearPicker = function () {
            var arrows =
            {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            }
            $("#datepickeryear").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            templates: arrows,
            orientation: "bottom left",
            rtl: KTUtil.isRTL(),
        })
        }
        return {
            // public functions
            init: function() {
                yearPicker();
                statusToast();
                errorToast();
            }
        };
    }();

    $(document).ready(function() {

        initPage.init();
    });
    </script>
@endpush
