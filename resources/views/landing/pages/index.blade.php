@extends('landing.layouts.template')

@section('title')
@endsection

@section('slider')
    @include('landing.layouts.partials.slider')
@endsection

@section('modals')
    @include('landing.modals.ispu')
@endsection

@section('content')
    <!-- Content
                                                                                                                                                                  ============================================= -->
    <section id="content">
        <div class="content-wrap p-0">

            <div class="section bg-transparent mb-0 pb-0 border-0">
                <div class="container bg-color-light border-0 rounded-3 p-4 p-md-5">
                    <div class="row justify-content-between align-items-center bottommargin-sm">
                        <div class="col-lg-7 col-sm-7">
                            <div class="heading-block border-bottom-0 mb-3">
                                <h2>peta universitas mulawarman</h2>
                            </div>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.68496265519!2d117.15180871475332!3d-0.4684586996582189!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df67f4bb8b9dcd1%3A0x6fd5d38233261f93!2sUniversitas%20Mulawarman!5e0!3m2!1sid!2sid!4v1661751273714!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <br>
                            
                        </div>
                        <div class="col-lg-3 col-sm-5 mt-4 mt-sm-0">
                            <div class="bg-white center px-5 py-3 border">
                                <div
                                    class="counter counter-large
                                    @if ($indeks >= 88.31) text-success
                                @elseif ($indeks >= 76.61)
                                text-info
                                @elseif ($indeks >= 65)
                                text-warning
                                @else
                                text-danger @endif

                                fw-bold">
                                    <span data-from="0" data-to="{{ $indeks }}" data-refresh-interval="10"
                                        data-speed="1500"></span>%
                                </div>
                                <div class="line my-2"></div>
                                <h5 class="fw-normal mb-1">Kualitas Udara Paling baik</h5>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-5 mt-4 mt-sm-0">
                            <div class="bg-white center px-5 py-3 border">
                                <div
                                    class="counter counter-large
                                    @if ($indeks >= 88.31) text-success
                                @elseif ($indeks >= 76.61)
                                text-info
                                @elseif ($indeks >= 65)
                                text-warning
                                @else
                                text-danger @endif

                                fw-bold">
                                    <span data-from="0" data-to="{{ $indeks }}" data-refresh-interval="10"
                                        data-speed="1500"></span>%
                                </div>
                                <div class="line my-2"></div>
                                <h5 class="fw-normal mb-1">Kualitas Udara Paling buruk</h5>
                            </div>
                        </div>
                    </div>
                    
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <h3>Informasi Kualitas udara per Fakultas</h3>
                            <div class="col-lg-3 col-sm-5 mt-4 mt-sm-0">
                            <div class="bg-white center px-5 py-3 border">
                                <h5 class="fw-normal mb-1">Fakultas Teknik</h5>
                                <div class="line my-2"></div>
                                <div>
                                    <h7 class="fw-normal mb-1">Nilai ISPU</h7>
                                </div>
                                <div>
                                    <h7 class="fw-normal mb-1">Tanggal</h7>
                                </div>
                                <div>
                                    <h7 class="fw-normal mb-1">Kriteria</h7>
                                </div>
                                <div>
                                    <h8 style="text-decoration: underline" >Klik disini untuk melihat detail</h8>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-3 col-sm-5 mt-4 mt-sm-0">
                            <div class="bg-white center px-5 py-3 border">
                                <h5 class="fw-normal mb-1">Matematika dan Ilmu Pengetahuan Alam</h5>
                                <div class="line my-2"></div>
                                <div>
                                    <h7 class="fw-normal mb-1">Nilai ISPU</h7>
                                </div>
                                <div>
                                    <h7 class="fw-normal mb-1">Tanggal</h7>
                                </div>
                                <div>
                                    <h7 class="fw-normal mb-1">Kriteria</h7>
                                </div>
                                <div>
                                    <h8 style="text-decoration: underline" >Klik disini untuk melihat detail</h8>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-3 col-sm-5 mt-4 mt-sm-0">
                            <div class="bg-white center px-5 py-3 border">
                                <h5 class="fw-normal mb-1">Fakultas Ilmu Sosial dan Ilmu Politik</h5>
                                <div class="line my-2"></div>
                                <div>
                                    <h7 class="fw-normal mb-1">Nilai ISPU</h7>
                                </div>
                                <div>
                                    <h7 class="fw-normal mb-1">Tanggal</h7>
                                </div>
                                <div>
                                    <h7 class="fw-normal mb-1">Kriteria</h7>
                                </div>
                                <div>
                                    <h8 style="text-decoration: underline" >Klik disini untuk melihat detail</h8>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-3 col-sm-5 mt-4 mt-sm-0">
                            <div class="bg-white center px-5 py-3 border">
                                <h5 class="fw-normal mb-1">Fakultas Ekonomi dan Bisnisk</h5>
                                <div class="line my-2"></div>
                                <div>
                                    <h7 class="fw-normal mb-1">Nilai ISPU</h7>
                                </div>
                                <div>
                                    <h7 class="fw-normal mb-1">Tanggal</h7>
                                </div>
                                <div>
                                    <h7 class="fw-normal mb-1">Kriteria</h7>
                                </div>
                                <div>
                                    <h8 style="text-decoration: underline" >Klik disini untuk melihat detail</h8>
                                </div>
                            </div>
                            </div>
                            

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="section border-0 bg-transparent mb-1">
                <div class="container">
                    <div class="row justify-content-between align-items-end bottommargin">
                        <div class="col-md-7">
                            <div class="heading-block border-bottom-0 mb-3">
                                <h2>Ready to Fund? Explore Projects</h2>
                            </div>
                            <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Iste reprehenderit fugiat quisquam nesciunt. Dicta quis, rem consequuntur est beatae
                                qui.</p>
                        </div>
                        <div class="col-md-5 d-flex flex-row justify-content-md-end mt-4 mt-md-0">
                            <div class="dropdown">
                                <a class="dropdown-toggle button button-border button-rounded ls0 fw-semibold nott btn"
                                    href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    All Projects
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">+ Tech &amp; Innovations</a>
                                    <a class="dropdown-item" href="#">+ Art</a>
                                    <a class="dropdown-item" href="#">+ Travel</a>
                                    <a class="dropdown-item" href="#">+ Music</a>
                                    <a class="dropdown-item" href="#">+ Gadgets</a>
                                    <a class="dropdown-item" href="#">+ Fashion</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-toggle button button-border button-rounded ls0 fw-semibold nott btn"
                                    href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Most Funded
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Recent Projects</a>
                                    <a class="dropdown-item" href="#">Popular Projects</a>
                                    <a class="dropdown-item" href="#">Ending Soon</a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div> --}}

        </div>
    </section><!-- #content end -->
@endsection


@push('js')
@endpush