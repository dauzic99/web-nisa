@extends('landing.layouts.template')

@section('title')
    | Indeks Kepuasan Masyarakat
@endsection

@push('plugin-css')
@endpush

@push('css-plus')
    <style>
        .white-section {
            background-color: #FFF;
            padding: 25px 0px;
            /* -webkit-box-shadow: 0px 1px 1px 0px #dfdfdf; */
            /* box-shadow: 0px 1px 1px 0px #dfdfdf; */
            border-radius: 3px;
        }

        .white-section label {
            display: block;
            margin-bottom: 15px;
        }

        .white-section pre {
            margin-top: 15px;
        }

        .dark .white-section {
            background-color: #111;
            /* -webkit-box-shadow: 0px 1px 1px 0px #444; */
            /* box-shadow: 0px 1px 1px 0px #444; */
        }

        .chart-samples ul {
            list-style: none;
        }

        .chart-samples h4 {
            text-transform: uppercase;
            margin-bottom: 20px;
            font-weight: 400;
        }

        .chart-samples li {
            font-size: 16px;
            line-height: 2.2;
            font-weight: 600;
        }

        .chart-samples li a:not(:hover) {
            color: #AAA;
        }
    </style>
@endpush
@section('content')
    <section id="page-title">
        <div class="container clearfix">
            <h1>Indeks Kepuasan Masyarakat</h1>
            <span>Berikut adalah detail indeks kepuasan masyarakat terhadap DPRD Provinsi Kalimantan Timur</span>

        </div>
    </section><!-- #page-title end -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="row gutter-40 col-mb-80 justify-content-center">
                    <div class="postcontent col-lg-12">
                        <div id="alert-div">

                        </div>
                        <div class="row">
                            <div class="col-lg-4 bottommargin-sm">
                                <div class="white-section">
                                    <label>Periode</label>
                                    <select class="selectpicker" id="period" data-live-search="true">
                                        @forelse ($periods as $period)
                                            <option
                                                value="{{ $period->period == 1 ? 'Januari-Juni' : 'Juli - Desember' }} {{ $period->year }}"
                                                data-startmonth="{{ $period->period == 1 ? '01' : '07' }}"
                                                data-endmonth="{{ $period->period == 1 ? '06' : '12' }}"
                                                data-year="{{ $period->year }}">
                                                {{ $period->period == 1 ? 'Januari-Juni' : 'Juli - Desember' }}
                                                {{ $period->year }}
                                            </option>
                                        @empty
                                            <option disabled>Periode Tidak Ditemukan</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <a href="#" class="button button-border button-rounded button-teal"
                                    id="filterPeriod">Filter</a>
                            </div>
                        </div>
                        <hr>
                        <div id="response">

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="text-center">KETERANGAN : <br>Nilai Persepsi, Interval IKM, Mutu Pelayanan, &
                                    Kinerja Unit Pelayanan.
                                </h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td>Nilai Persepsi</td>
                                                <td>Nilai Interval IKM</td>
                                                <td>Nilai Kontroversi IKM</td>
                                                <td>Pelayanan Mutu</td>
                                                <td>Kinerja Unit Pelayanan</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>1.00 - 2.5996</td>
                                                <td>25 - 64.99</td>
                                                <td>D</td>
                                                <td>Tidak Baik</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>2.60 - 3.064</td>
                                                <td>65.00 - 76.00</td>
                                                <td>C</td>
                                                <td>Kurang Baik</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>3.0644 - 3.532</td>
                                                <td>76.61 - 88.30</td>
                                                <td>B</td>
                                                <td>Baik</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>3.5324 - 4.00</td>
                                                <td>88.31 - 100</td>
                                                <td>A</td>
                                                <td>Sangat Baik</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection


@push('js')
    <script src="{{ asset('canvas/js/chart.js') }}"></script>
    <script src="{{ asset('canvas/js/chart-utils.js') }}"></script>
    <script>
        $(document).ready(function() {
            filterPeriod();
            $(document).on('click', '#filterPeriod', function(e) {
                e.preventDefault();
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
                url: "{{ route('ikm.response') }}",
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
                    var htmlString = '<div class="alert alert-dismissible alert-danger mb-0">' +
                        '<i class="icon-remove-sign"></i>' +
                        '<span id="alert-message">Data IKM pada periode ini tidak Ditemukan</span>' +
                        '<button type="button" class="btn-close btn-sm" data-bs-dismiss="alert"' +
                        'aria-hidden="true"></button>' +
                        '</div>';
                    $('#alert-div').html(htmlString);
                }
            });
        }
    </script>
@endpush
