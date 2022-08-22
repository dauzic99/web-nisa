@extends('landing.layouts.template')

@section('title')
@endsection

@section('slider')
    @include('landing.layouts.partials.slider')
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
                                <h2>Bagaimana Cara Menilai Kami ?</h2>
                            </div>
                            <p class="text-muted mb-0">Untuk mengungkapkan tingkat kepuasan anda terhadap kinerja DPRD
                                Provinsi Kalimantan Timur, Anda dapat mengikuti serangkaian petunjuk yang tersedia dibawah.
                                Atau anda dapat mengunduh panduan berikut.
                            </p>
                            <br>
                            <a href="{{ route('kuesioner.download') }}" class="mb-0">Panduan Mengisi
                                Kuesioner</a>
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
                                <h5 class="fw-normal mb-1">Indeks Kepuasan</h5>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="row justify-content-around">
                        <div class="col-lg-3 col-md-4 mt-5">
                            <div class="feature-text">
                                <div class="fbox-text color">1.</div>
                                <h3>Register Your Account.</h3>
                            </div>
                            <p>Credibly maximize highly efficient data through alignments.</p>
                        </div>
                        <div class="col-lg-3 col-md-4 mt-5">
                            <div class="feature-text">
                                <div class="fbox-text color">2.</div>
                                <h3>Choose your Investor.</h3>
                            </div>
                            <p>Professionally develop intermandated resources through.</p>
                        </div>
                        <div class="col-lg-3 col-md-4 mt-5">
                            <div class="feature-text">
                                <div class="fbox-text color">3.</div>
                                <h3>Fund the Innovation.</h3>
                            </div>
                            <p>Highly efficient data through multifunctional alignments.</p>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <h3>Video Tutorial</h3>
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/xgTwEAUrOqU"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
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
