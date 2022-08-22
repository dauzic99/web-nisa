@extends('admin.template.main')

@section('breadcrumb')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">
        Dashboard
        {{-- <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>

    <small class="text-muted fs-7 fw-bold my-1 ms-1"> home</small> --}}
    </h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Selamat Datang</h3>
        </div>
    </div>

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

    <div class="row g-5 g-xl-8 mt-3">
        <div class="col-lg-4 col-md-6">
            <!--begin::Statistics Widget 5-->
            <a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                    <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <rect x="8" y="9" width="3" height="10" rx="1.5"
                                fill="currentColor" />
                            <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5"
                                fill="currentColor" />
                            <rect x="18" y="11" width="3" height="8" rx="1.5"
                                fill="currentColor" />
                            <rect x="3" y="13" width="3" height="6" rx="1.5"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{ $respondents->count() }}</div>
                    <div class="fw-bold text-gray-400">Jumlah Responden Keseluruhan</div>
                </div>
                <!--end::Body-->
            </a>
            <!--end::Statistics Widget 5-->
        </div>
        <div class="col-lg-4 col-md-6">
            <!--begin::Statistics Widget 5-->
            <a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                    <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <rect x="8" y="9" width="3" height="10" rx="1.5"
                                fill="currentColor" />
                            <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5"
                                fill="currentColor" />
                            <rect x="18" y="11" width="3" height="8" rx="1.5"
                                fill="currentColor" />
                            <rect x="3" y="13" width="3" height="6" rx="1.5"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{ $questions->count() }}</div>
                    <div class="fw-bold text-gray-400">Jumlah Pertanyaan</div>
                </div>
                <!--end::Body-->
            </a>
            <!--end::Statistics Widget 5-->
        </div>
    </div>

    <div class="row g-5 g-xl-8 mt-3">
        <div class="col-6">
            <div class="card card-xl-stretch">
                <div class="card-header align-items-center border-0 mt-4">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="fw-bolder mb-2 text-dark">Total Responden Berdasarkan Gender</span>
                        <span class="text-muted fw-bold fs-7">{{ $respondents->count() }} Responden</span>
                    </h3>
                </div>
                <div class="card-body pt-5">
                    <canvas id="allGenderChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card card-xl-stretch">
                <div class="card-header align-items-center border-0 mt-4">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="fw-bolder mb-2 text-dark">Total Responden Berdasarkan Fraksi</span>
                        <span class="text-muted fw-bold fs-7">{{ $respondents->count() }} Responden</span>
                    </h3>
                </div>
                <div class="card-body pt-5">
                    <canvas id="allFractionChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div id="response">

    </div>
@endsection


@push('js')
    <script>
        var colors = [
            '#009ef7',
            '#50CD89',
            '#F1416C',
            '#003f5c',
            '#58508d',
            '#bc5090',
            '#ff6361',
            '#ffa600'
        ];
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
    <script>
        $(document).ready(function() {
            filterPeriod();
            $(document).on('click', '#filterPeriod', function() {
                filterPeriod();
            });

            getAllGender();
            getAllFraction();
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
                url: "{{ route('dashboard.loaddatas') }}",
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

        function servicesChart(labels, datas) {
            var ctx = document.getElementById("servicesChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Nilai Rata-Rata Per Unsur',
                        data: datas,
                        // borderWidth: 2,
                        backgroundColor: '#009ef7',
                        borderColor: '#009ef7',
                        // borderWidth: 2.5,
                        // pointBackgroundColor: '#ffffff',
                        // pointRadius: 4
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                drawBorder: false,
                                color: '#f2f2f2',
                            },
                            ticks: {
                                beginAtZero: true,
                                max: 100
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                display: false
                            },
                            gridLines: {
                                display: false
                            }
                        }]
                    },
                }
            });
        }

        function barChart(labels, datas, element) {
            // console.log(labels);
            // console.log(datas);
            // console.log(datas);
            var ctx = document.getElementById(element).getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: datas
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                drawBorder: false,
                                color: '#f2f2f2',
                            },
                            ticks: {
                                beginAtZero: true,
                                max: 100
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                display: false
                            },
                            gridLines: {
                                display: false
                            }
                        }]
                    },
                }
            });
        }


        function doughnutChart(labels, datas, color, element) {
            // console.log(labels);
            // console.log(datas);
            // console.log(datas);
            var ctx = document.getElementById(element).getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Dataset',
                        data: datas,
                        backgroundColor: color,
                        hoverOffset: 4
                    }]
                },
            });
        }

        function getAllGender() {
            var allGenders = {!! $allGenders !!};
            var labels = [];
            var data = [];
            var color = [];
            allGenders.forEach((element, i) => {
                labels.push(element.gender);
                data.push(element.total);
                color.push(colors[i]);
            });


            doughnutChart(labels, data, color, "allGenderChart");
        }

        function getAllFraction() {
            var allFractions = {!! $allFractions !!};
            var labels = [];
            var data = [];
            var color = [];
            allFractions.forEach((element, i) => {
                labels.push(element.fraction);
                data.push(element.total);
                color.push(colors[colors.length - 1 - i]);
            });


            doughnutChart(labels, data, color, "allFractionChart");
        }
    </script>
@endpush
