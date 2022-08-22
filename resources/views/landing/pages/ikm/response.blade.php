<div class="row" id="printable">
    <div class="section-title text-center">
        <p class="text-uppercase text-black">
            <b>Indeks Kepuasan Masyarakat (IKM)</b>
            <br>
            <b>DPRD Provinsi Kalimantan Timur</b>
            <br>
            Paruh ke-{{ $semester }}
        </p>
    </div>

    <div class="row">
        <div class="col-md-6">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center"><b>Nilai IKM</b></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">
                            <h1>{{ number_format($indeks, 2) }}
                            </h1>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center text-secondary">

                            @if ($indeks >= 88.31)
                                A (Sangat Baik)
                            @elseif ($indeks >= 76.61)
                                B (Baik)
                            @elseif ($indeks >= 65)
                                C (Kurang Baik)
                            @else
                                D (Tidak Baik)
                            @endif

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table">
                <thead>
                    {{-- <tr>
                        <th><b>Nama Layanan</b></th>
                        <th> : </th>
                        <th></th>
                    </tr> --}}
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center" colspan="3">
                            <b>RESPONDEN</b>
                        </td>
                    </tr>
                    <tr>
                        <td>JUMLAH</td>
                        <td> : </td>
                        <td>{{ $datas->count() }} orang</td>
                    </tr>
                    <tr>
                        <td>JENIS KELAMIN</td>
                        <td> : </td>
                        @php
                            $key = array_search('Laki-Laki', array_column($array_gender, 'gender'));
                        @endphp
                        <td>L = @if (is_int($key))
                                {{ $array_gender[$key]->total }}
                            @else
                                0
                            @endif orang</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        @php
                            $key = array_search('Perempuan', array_column($array_gender, 'gender'));
                        @endphp
                        <td>P = @if (is_int($key))
                                {{ $array_gender[$key]->total }}
                            @else
                                0
                            @endif orang</td>
                    </tr>
                    <tr>
                        <td>FRAKSI</td>
                        <td> : </td>
                        @php
                            $key = array_search('Fraksi Golkar', array_column($array_fraction, 'fraction'));
                        @endphp
                        <td>Fraksi Golkar = @if (is_int($key))
                                {{ $array_fraction[$key]->total }}
                            @else
                                0
                            @endif orang</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        @php
                            $key = array_search('Fraksi PDI-P', array_column($array_fraction, 'fraction'));
                        @endphp
                        <td>Fraksi PDI-P = @if (is_int($key))
                                {{ $array_fraction[$key]->total }}
                            @else
                                0
                            @endif orang</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        @php
                            $key = array_search('Fraksi Gerindra', array_column($array_fraction, 'fraction'));
                        @endphp
                        <td>Fraksi Gerindra = @if (is_int($key))
                                {{ $array_fraction[$key]->total }}
                            @else
                                0
                            @endif orang</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        @php
                            $key = array_search('Fraksi PKB-Hanura', array_column($array_fraction, 'fraction'));
                        @endphp
                        <td>Fraksi PKB-Hanura = @if (is_int($key))
                                {{ $array_fraction[$key]->total }}
                            @else
                                0
                            @endif orang</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        @php
                            $key = array_search('Fraksi PAN', array_column($array_fraction, 'fraction'));
                        @endphp
                        <td>Fraksi PAN = @if (is_int($key))
                                {{ $array_fraction[$key]->total }}
                            @else
                                0
                            @endif orang</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        @php
                            $key = array_search('Fraksi PPP', array_column($array_fraction, 'fraction'));
                        @endphp
                        <td>Fraksi PPP = @if (is_int($key))
                                {{ $array_fraction[$key]->total }}
                            @else
                                0
                            @endif orang</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        @php
                            $key = array_search('Fraksi PKS', array_column($array_fraction, 'fraction'));
                        @endphp
                        <td>Fraksi PKS = @if (is_int($key))
                                {{ $array_fraction[$key]->total }}
                            @else
                                0
                            @endif orang</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        @php
                            $key = array_search('Fraksi Demokrat-Nasdem', array_column($array_fraction, 'fraction'));
                        @endphp
                        <td>Fraksi Demokrat-Nasdem = @if (is_int($key))
                                {{ $array_fraction[$key]->total }}
                            @else
                                0
                            @endif orang</td>
                    </tr>
                    <tr>
                        <td>PERIODE SURVEI</td>
                        <td> : </td>
                        <td>{{ $period }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <a href="#" class=""></a>
        <button class="button button-border button-rounded button-teal" onclick="printDiv('printable')">
            <i class="icon-printer"></i>Print
        </button>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-12">
        <h3 style="text-align: center">Bagan IKM</h3>
    </div>

    <div class="bottommargin mx-auto" style="max-width: 750px; min-height: 350px;">
        <canvas id="servicesChart"></canvas>
    </div>
    <div class="bottommargin mx-auto" style="max-width: 750px; min-height: 350px;">
        <canvas id="fractionChart"></canvas>
    </div>

    <div class="bottommargin mx-auto" style="max-width: 750px; min-height: 350px;">
        <canvas id="genderChart"></canvas>
    </div>

</div>

<hr>




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


        barChart(labelsService, data, "genderChart", 'Bagan Penilaian IKM Berdasarkan Jenis Kelamin');
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
                backgroundColor: colorList[i],
                borderColor: colorList[i],
            });
        });


        barChart(labelsService, data, "fractionChart", 'Bagan Penilaian IKM Berdasarkan Fraksi');
    }


    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
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
                    display: true
                },
                title: {
                    display: true,
                    text: 'Bagan Penilaian IKM Per Unsur'
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
                    display: true
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
</script>
