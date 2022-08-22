<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            font-size: 14px;
        }

        h3 {
            font-size: 17px;
        }


        hr {
            clear: both;
        }

        img {
            margin: 2px;
        }

        @page size-A4 {
            size: 21.0cm 29.7cm;
            margin: 1cm;
        }

        @page rotate-landscape {
            size: landscape;
        }

        div.page-portrait {
            visibility: visible;

            font-size: 12px;
            margin: 2px 0px 2px 0px;
            width: 17cm;
        }

        div.page-landscape {
            visibility: visible;

            font-size: 12px;
            margin: 6px 0px 6px 0px;
            width: 25.5cm;
        }

        div.page-break {
            visibility: visible;
            page-break-after: always;
        }

        div.nobreak {
            visibility: visible;
        }

        table {
            border-collapse: collapse;
        }

        .box {
            border: 1px solid #000;
            padding: 4px;
        }

        font.l1 {
            font-size: 22px;
            color: #448a37;
        }

        font.l2 {
            font-size: 16px;

        }

        font.l3 {
            font-size: 14px;

        }

        .lu {
            text-decoration: underline;
        }

        .lb {
            font-weight: bold;
        }

        p {
            font-size: 14px;
        }

        table tr td {

            font-size: 12px;
            padding: 2px;

        }

        table tr th {

            font-size: 12px;
            font-weight: bold;
            background-color: #eee;
            padding: 2px;
        }

        .tabel-common tr td {

            font-size: 12px;
            padding: 2px;
            border: 1px solid #000;
            /* border-right: 1px solid #000; */
            vertical-align: top;
            height: 20px;
            vertical-align: middle;
        }


        .tabel-common tr th {

            font-size: 12px;
            font-weight: bold;
            background-color: #eee;
            padding: 2px;
            border: 1px solid #000;
        }

        .tabel-common .nama {
            width: 120px;
            overflow: hidden;
        }

        .tabel-small tr td {

            font-size: 10px;
            padding: 2px;
            border: 1px solid #000;
            vertical-align: top;
            height: 20px;
            vertical-align: middle;
        }

        .tabel-small tr th {

            font-size: 10px;
            font-weight: bold;
            background-color: #eee;
            padding: 2px;
            border: 1px solid #000;
        }

        .tabel1-5 th td {
            text-height: 30px;
        }

        .hidden {
            visibility: hidden;
        }

        div.nobreak .hidden {
            display: none;
        }

        div.page-break .hidden {
            display: none;
        }

        .tabel-info tr td,
        th {

            font-size: 12px;
            padding: 2px;
            font-weight: bold;
        }

        .page-break {
            clear: both;
        }

        .link {
            clear: both;
            visibility: hidden;
            display: none;
        }
        table { page-break-inside:auto }
    tr .no    { page-break-inside:avoid; page-break-after:auto }
    </style>
    <title>Print Jawaban Responden</title>
</head>

<body>
    <div align='center'>
        <font class='l2 lb lu'> Jawaban Responden</font>
    </div> <br><br>
    <table width='30%'>
        <tr>
            <td>Periode</td>
            <td>: {{ $respondent->created_at->month <= 6 ? 'Januari - Juni': 'Juli - Desember' }} {{ $respondent->created_at->year }}</td>
        </tr>
        <tr>
            <td>Fraksi</td>
            <td>: {{ $respondent->fraction }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>: {{ $respondent->gender }}</td>
        </tr>
    </table>
    <br>
    <table class='tabel-common' width='100%'>
        @foreach ($respondent->responses as $response)
            <tr>
                <th class="no" rowspan="{{ count($response->question->answers) + 1 }}">{{ $loop->iteration }}.</th>
                <th align="left">{{ $response->question->content }}</th>
            </tr>
            @foreach ($response->question->answers as $answer)
                <tr>
                    <td class="option">
                        <!--begin::Input-->
                        <input {{ $response->answer_id == $answer->id ? 'checked' : 'disabled' }}
                            name="radio{{ $answer->id }}" type="radio" value="{{ $answer->id }}" />
                        <!--end::Input-->
                        <!--begin::Label-->
                        <label>
                            {{ $answer->answer }}
                        </label>
                        <!--end::Label-->
                    </td>
                </tr>
            @endforeach
        @endforeach
        <tr>
            <th class="no" rowspan="2">{{ count($respondent->responses) + 1 }}.</th>
            <th align="left">Saran</th>
        </tr>
        <tr>
            <td class="option">
                {{ $respondent->suggestion->content }}
            </td>
        </tr>
    </table>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        window.print()
});
</script>
</html>
