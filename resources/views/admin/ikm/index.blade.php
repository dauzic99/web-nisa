@extends('admin.template.main')

@section('breadcrumb')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">
        Indeks Kepuasan Masyarakat
    </h1>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.css') }}">
@endpush

@section('content')
    <div class="row g-5 g-xl-8 mt-3">
        <div class="col-md-6 col-lg-4">
            <div class="mb-10">
                <label for="period" class="required form-label">Periode</label> <br>
                <select class="form-select" id="period" data-control="select2" data-placeholder="Pilih Periode Penilaian">
                    @forelse ($periods as $period)
                        <option value="{{ $period->period == 1 ? 'Januari-Juni' : 'Juli - Desember' }} {{ $period->year }}"
                            data-startmonth="{{ $period->period == 1 ? '01' : '07' }}"
                            data-endmonth="{{ $period->period == 1 ? '06' : '12' }}" data-year="{{ $period->year }}">
                            {{ $period->period == 1 ? 'Januari-Juni' : 'Juli - Desember' }} {{ $period->year }}
                        </option>
                    @empty
                        <option disabled>Periode Tidak Ditemukan</option>
                    @endforelse
                    <option></option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <button class="btn btn-light-primary" id="filterPeriod">
                Filter
            </button>
        </div>
    </div>
    <div class="mt-5" id="response">

    </div>
@endsection

@push('js')
    <script>
        toastr.options = {
            "closeButton": true,
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
    </script>
    <script src="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>

    <script>
        $(document).ready(function() {
            filterPeriod();
            $(document).on('click', '#filterPeriod', function() {
                filterPeriod();
            });
        });

        function filterPeriod() {
            var startmonth = $("#period").find(":selected").data("startmonth");
            var endmonth = $("#period").find(":selected").data("endmonth");
            var year = $("#period").find(":selected").data("year");
            loaddatas(startmonth, endmonth, year);
        }

        function loaddatas(startmonth, endmonth, year) {
            $.ajax({
                type: "POST",
                url: "{{ route('admin.ikm.loaddatas') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    startmonth: startmonth,
                    endmonth: endmonth,
                    year: year,
                },
                success: function(response) {
                    $('#response').html(response);

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    toastr.error(xhr.responseText);
                }
            });
        }
    </script>
@endpush
