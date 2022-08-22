@extends('landing.layouts.template')

@section('title')
    | Kuesioner IKM
@endsection

@push('plugin-css')
    @livewireStyles
@endpush
@section('content')
    <!-- Content s============================================= -->
    <!-- Page Title
                                                                                  ============================================= -->
    <section id="page-title">
        <div class="container clearfix">
            <h1>Form Kuesioner</h1>
            <span>Silahkan isi pertanyaan berikut untuk berpartisipasi dalam penilaian IKM DPRD Provinsi Kalimantan
                TImur</span>

        </div>
    </section><!-- #page-title end -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="row gutter-40 col-mb-80 justify-content-center">
                    <div class="postcontent col-lg-8">
                        @livewire('container-questioner', [
                            'services' => $services,
                            'ip' => request()->ip(),
                        ])

                    </div>


                </div>

            </div>
        </div>
    </section>
@endsection


@push('js')
    @livewireScripts
@endpush
