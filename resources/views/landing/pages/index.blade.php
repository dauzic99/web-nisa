@extends('landing.layouts.template')

@section('title')
@endsection

@section('slider')
    @include('landing.layouts.partials.slider')
@endsection

@section('modals')
    @include('landing.modals.ispu')
    <div id="responseModal">

    </div>
@endsection

@section('content')
    <!-- Content
                                                                                                                                                                                                                                                                                                                      ============================================= -->
    <section id="content">
        <div class="content-wrap p-0">

            <div class="section bg-transparent mb-0 pb-0 border-0">
                <div class="container bg-color-light border-0 rounded-3 p-4 p-md-5">
                    <div class="row justify-content-between align-items-center bottommargin-sm">
                        <div class="col-lg-9 col-sm-7">

                        </div>

                        <hr>
                        <div class="row mt-3">
                            <div class="col-12 center px-5 py-3">
                                <h3>Peta Universitas Mulawarman</h3>
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.68496265519!2d117.15180871475332!3d-0.4684586996582189!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df67f4bb8b9dcd1%3A0x6fd5d38233261f93!2sUniversitas%20Mulawarman!5e0!3m2!1sid!2sid!4v1661751273714!5m2!1sid!2sid"
                                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6 mt-4 mt-sm-0">
                                        <div class="bg-white center px-5 py-3 border">
                                            <h5 class="fw-normal mb-1">Kualitas Udara Paling Baik</h5>
                                            <div class="line my-2"></div>
                                            <div>
                                                <canvas id="baikChart"></canvas>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="col-md-6 mt-4 mt-sm-0">
                                        <div class="bg-white center px-5 py-3 border">
                                            <h5 class="fw-normal mb-1">Kualitas Udara Paling Buruk</h5>
                                            <div class="line my-2"></div>
                                            <div>
                                                <canvas id="burukChart"></canvas>
                                            </div>

                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mt-3">
                                        <div class="col-12 center px-5 py-3">
                                            <h3>Informasi Kualitas udara per Fakultas</h3>
                                            <div class="row">
                                                @forelse ($faculties as $faculty)
                                                    <div class="col-md-6 mt-4 mt-sm-0">
                                                        <div class="bg-white center px-5 py-3 border">
                                                            <h5 class="fw-normal mb-1">{{ $faculty->name }}</h5>
                                                            <div class="line my-2"></div>
                                                            <div>
                                                                <h7 class="fw-normal mb-1">Nilai ISPU:
                                                                    {{ $faculty->getISPU() }}</h7>
                                                            </div>
                                                            <div>
                                                                <h7 class="fw-normal mb-1">
                                                                    Tanggal:{{ $faculty->getLatestDate() }}</h7>
                                                            </div>
                                                            <div>
                                                                <h7 class="fw-normal mb-1">Kriteria: Sedang</h7>
                                                            </div>
                                                            <div>
                                                                <button
                                                                    class="button button-large fw-semibold button-rounded ls0 nott ms-0 detailInfo"
                                                                    data-id="{{ $faculty->id }}">
                                                                    Klik
                                                                    untuk
                                                                    melihat detail
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
    </section><!-- #content end -->
@endsection


@push('js')
    <script src="{{ asset('canvas/js/chart.js') }}"></script>
    <script src="{{ asset('canvas/js/chart-utils.js') }}"></script>
    <script>
        $(document).ready(function() {
            var labels = [
                "PM10",
                "CO",
                "NO2",
                "O2"
            ];
            var dataTest = [{
                    label: "PPM",
                    data: [50, 70, 90, 87],
                    backgroundColor: ['#009ef7',
                        '#50CD89',
                        '#F1416C',
                        '#003f5c',
                    ],
                    borderColor: ['#009ef7',
                        '#50CD89',
                        '#F1416C',
                        '#003f5c',
                    ],
                },

            ];

            var dataBuruk = [{
                    label: "PPM",
                    data: [20.5, 30, 70.5, 50.6],
                    backgroundColor: ['#009ef7',
                        '#50CD89',
                        '#F1416C',
                        '#003f5c',
                    ],
                    borderColor: ['#009ef7',
                        '#50CD89',
                        '#F1416C',
                        '#003f5c',
                    ],
                },

            ];
            var dataBaik = [{
                    label: "PPM",
                    data: [20.5, 30, 70.5, 50.6],
                    backgroundColor: ['#009ef7',
                        '#50CD89',
                        '#F1416C',
                        '#003f5c',
                    ],
                    borderColor: ['#009ef7',
                        '#50CD89',
                        '#F1416C',
                        '#003f5c',
                    ],
                },

            ];
            doughnutChart(labels, dataBuruk, "burukChart", "Data Test");
            doughnutChart(labels, dataBaik, "baikChart", "Data Test");
            // barChart(labels, dataDetail, "detail1Chart", "Data Test");



            $(document).on('click', '.detailInfo', function() {
                showDetail($(this).data('id'));
            });
        });

        function showDetail(id) {
            $.ajax({
                type: "POST",
                url: "{{ route('landing.showDetail') }}",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    $('#responseModal').html(response);
                    $('#detailFacultyModal').modal('show');
                }
            });
        }


        function barChart(labels, datas, element, title) {
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
                    title: {
                        display: true,
                        text: title
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                drawBorder: false,
                                color: '#f2f2f2',
                            },
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

        function doughnutChart(labels, datas, element, title) {
            // console.log(labels);
            // console.log(datas);
            // console.log(datas);
            var ctx = document.getElementById(element).getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: labels,
                    datasets: datas
                },
                options: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: title
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                drawBorder: false,
                                color: '#f2f2f2',
                            },
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
    </script>
@endpush
