<style>
    .col-print-1 {
        width: 8%;
        float: left;
    }

    .col-print-2 {
        width: 16%;
        float: left;
    }

    .col-print-3 {
        width: 25%;
        float: left;
    }

    .col-print-4 {
        width: 33%;
        float: left;
    }

    .col-print-5 {
        width: 42%;
        float: left;
    }

    .col-print-6 {
        width: 50%;
        float: left;
    }

    .col-print-7 {
        width: 58%;
        float: left;
    }

    .col-print-8 {
        width: 66%;
        float: left;
    }

    .col-print-9 {
        width: 75%;
        float: left;
    }

    .col-print-10 {
        width: 83%;
        float: left;
    }

    .col-print-11 {
        width: 92%;
        float: left;
    }

    .col-print-12 {
        width: 100%;
        float: left;
    }
</style>

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row" id="printable">
                <div class="section-title text-center">
                    <p class="text-uppercase text-black">
                        <b>Pengolahan Indeks Kepuasan Masyarakat</b>
                        <br>
                        <b>PER ANGGOTA DPRD Provinsi Kalimantan Timur</b>
                        <br>
                        <b>dan Per Unsur Pelayanan</b>
                        <br>
                        <b>Tahun {{ $year }}</b>
                    </p>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-row-solid table-row-gray-300 align-middle gs-0 gy-4"
                            style="margin-top: 15px;
                        margin-bottom: 15px;">
                            <tbody>
                                <tr>
                                    <td style="padding: 0">SKPD</td>
                                    <td style="padding: 0">:</td>
                                    <td style="padding: 0">SEKRETARIAT DPRD PROVINSI KALIMANTAN TIMUR</td>
                                </tr>
                                <tr>
                                    <td style="padding: 0">Alamat</td>
                                    <td style="padding: 0">:</td>
                                    <td style="padding: 0">Jl. Teuku Umar Karang Paci Samarinda</td>
                                </tr>
                                <tr>
                                    <td style="padding: 0">Telp/Fax</td>
                                    <td style="padding: 0">:</td>
                                    <td style="padding: 0">Telp. 0541 - 273567 ; Fax. 0541 - 273567</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table border table-row-bordered table-row-gray-300 align-middle gs-0 gy-4"
                            style="">
                            <thead>
                                <tr class="fw-bolder">
                                    <th class="text-center">NO</th>
                                    <th class="text-center">ASPEK PELAYANAN</th>
                                    <th class="text-center" width="20%">NILAI IKM</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $service->name }}</td>
                                        <td class="text-center">
                                            {{ number_format($avg_service[$loop->index], '3', ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-row-solid table-row-gray-300 align-middle gs-0 gy-4"
                            style="margin-top: 15px;
                        margin-bottom: 15px;">
                            <tbody>
                                <tr>
                                    <td style="padding: 0" width="30%">IKM UNIT PELAYANAN</td>
                                    <td style="padding: 0">:</td>
                                    <td style="padding: 0">{{ number_format($indeks, '3', ',', '.') }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-row-solid table-row-gray-300 align-middle gs-0 gy-4"
                            style="margin-top: 15px;
                        margin-bottom: 15px;">
                            <thead>
                                <tr class="fw-bolder">
                                    <td style="padding: 0">Mutu Pelayanan</td>
                                    <td style="padding: 0">:</td>
                                    <td style="padding: 0"></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="30%" style="padding: 0">A (Sangat Baik)</td>
                                    <td style="padding: 0">:</td>
                                    <td style="padding: 0">81,26 - 100,00
                                    </td>
                                </tr>
                                <tr>
                                    <td width="30%" style="padding: 0">B (Baik)</td>
                                    <td style="padding: 0">:</td>
                                    <td style="padding: 0">62,51 - 81,25
                                    </td>
                                </tr>
                                <tr>
                                    <td width="30%" style="padding: 0">C (Kurang Baik)</td>
                                    <td style="padding: 0">:</td>
                                    <td style="padding: 0">43,76 - 62,50
                                    </td>
                                </tr>
                                <tr>
                                    <td width="30%" style="padding: 0">D (Tidak Baik)</td>
                                    <td style="padding: 0">:</td>
                                    <td style="padding: 0">25,00 - 43,75
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-print-8">

                    </div>
                    <div class="col-print-4">
                        <br><br>
                        <p style="text-align: right">Samarinda,
                            {{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>
                        <br>
                        <p style="text-align: right">Mengetahui,</p>
                        <p style="text-align: right">Sekretaris DPRD Provinsi Kalimantan Timur,</p>

                        <br><br><br><br>
                        <p style="text-align: right;text-decoration: underline">Drs. H. MUHAMMAD RAMADHAN, M.M.T</p>
                        <p style="text-align: right;margin-right: 23px">NIP. 19640128 199003 1 006</p>
                        &nbsp;&nbsp;&nbsp;&nbsp;

                    </div>

                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12">
                    <a href="#" class=""></a>
                    <button class="btn btn-light-primary" onclick="printDiv('printable')">
                        <span class="svg-icon svg-icon-primary svg-icon-2x">
                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Devices/Printer.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M16,17 L16,21 C16,21.5522847 15.5522847,22 15,22 L9,22 C8.44771525,22 8,21.5522847 8,21 L8,17 L5,17 C3.8954305,17 3,16.1045695 3,15 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,15 C21,16.1045695 20.1045695,17 19,17 L16,17 Z M17.5,11 C18.3284271,11 19,10.3284271 19,9.5 C19,8.67157288 18.3284271,8 17.5,8 C16.6715729,8 16,8.67157288 16,9.5 C16,10.3284271 16.6715729,11 17.5,11 Z M10,14 L10,20 L14,20 L14,14 L10,14 Z"
                                        fill="#000000" />
                                    <rect fill="#000000" opacity="0.3" x="8" y="2" width="8"
                                        height="2" rx="1" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>Print
                    </button>
                </div>
            </div>
        </div>
    </div>




    <hr>
</div>


<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
