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
                <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{ $datas->count() }}</div>
                <div class="fw-bold text-gray-400">Jumlah Responden Per Periode</div>
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
                <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{ $indeks }} %</div>
                <div class="fw-bold text-gray-400">Indeks Kepuasan Masyarakat</div>
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
                <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">
                    @if ($indeks >= 88.31)
                        A (Sangat Baik)
                    @elseif ($indeks >= 76.61)
                        B (Baik)
                    @elseif ($indeks >= 65)
                        C (Kurang Baik)
                    @else
                        D (Tidak Baik)
                    @endif
                </div>
                <div class="fw-bold text-gray-400">Predikat</div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Statistics Widget 5-->
    </div>
</div>


<div class="row g-5 g-xl-8 mt-3">
    <div class="col-12">
        <div class="card card-xl-stretch">
            <div class="card-header align-items-center border-0 mt-4">
                <h3 class="card-title align-items-start flex-column">
                    <span class="fw-bolder mb-2 text-dark">Indeks Per Unsur (%)</span>
                    <span class="text-muted fw-bold fs-7">{{ $count_service }} Unsur</span>
                    <span class="text-muted fw-bold fs-7">{{ $datas->count() }} Responden</span>
                </h3>
            </div>
            <div class="card-body pt-5">
                <canvas id="servicesChart"></canvas>
            </div>
        </div>
    </div>
</div>


<div class="row g-5 g-xl-8 mt-3">
    <div class="col-12">
        <div class="card card-xl-stretch">
            <div class="card-header align-items-center border-0 mt-4">
                <h3 class="card-title align-items-start flex-column">
                    <span class="fw-bolder mb-2 text-dark">Indeks Per Unsur Berdasarkan Fraksi (%)</span>
                    <span class="text-muted fw-bold fs-7">{{ $count_fraction }} Fraksi</span>
                    <span class="text-muted fw-bold fs-7">{{ $datas->count() }} Responden</span>
                </h3>
            </div>
            <div class="card-body pt-5">
                <canvas id="fractionChart"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="row g-5 g-xl-8 mt-3">
    <div class="col-12">
        <div class="card card-xl-stretch">
            <div class="card-header align-items-center border-0 mt-4">
                <h3 class="card-title align-items-start flex-column">
                    <span class="fw-bolder mb-2 text-dark">Indeks Per Unsur Berdasarkan Jenis Kelamin (%)</span>
                    <span class="text-muted fw-bold fs-7">{{ $count_gender }} Jenis Kelamin</span>
                    <span class="text-muted fw-bold fs-7">{{ $datas->count() }} Responden</span>
                </h3>
            </div>
            <div class="card-body pt-5">
                <canvas id="genderChart"></canvas>
            </div>
        </div>
    </div>
</div>


<script>
    var colorList = [
        '#009ef7',
        '#50CD89',
        '#F1416C',
        '#003f5c',
        '#58508d',
        '#bc5090',
        '#ff6361',
        '#ffa600'
    ];
    $(document).ready(function() {
        getDataServices();
        getDataGender();
        getDataFraction();
    });

    function getDataServices() {
        var avgJson = {!! $avg_service !!};
        var services = {!! $services !!};
        var avg = [];
        for (var i in avgJson)
            avg.push(avgJson[i]);

        // var countQ = $('#countQ').val();
        var labelsService = [];
        $.each(services, function(indexInArray, value) {
            labelsService.push(value.name)
        });
        // console.log(avgJson);
        // console.log(labelsService);
        servicesChart(labelsService, avg);
    }



    function getDataGender() {
        var data_gender = {!! $data_gender !!};
        var services = {!! $services !!};
        var labelsService = [];
        $.each(services, function(indexInArray, value) {
            labelsService.push(value.name)
        });
        var data = [];
        data_gender.forEach((element, i) => {
            data.push({
                label: element.label,
                data: element.avg,
                backgroundColor: colorList[i],
                borderColor: colorList[i],
            });
        });


        barChart(labelsService, data, "genderChart");
    }

    function getDataFraction() {
        var data_fraction = {!! $data_fraction !!};
        var services = {!! $services !!};
        var labelsService = [];
        $.each(services, function(indexInArray, value) {
            labelsService.push(value.name)
        });
        var data = [];
        data_fraction.forEach((element, i) => {
            data.push({
                label: element.label,
                data: element.avg,
                backgroundColor: colorList[colorList.length - 1 - i],
                borderColor: colorList[colorList.length - 1 - i],
            });
        });


        barChart(labelsService, data, "fractionChart");
    }
</script>
