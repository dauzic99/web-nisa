<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="detailFacultyModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header center">
                <h4 class="modal-title" id="myModalLabel">DATA DETAIL</h4>
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <h3 class="modal-isi" id="mymodal">{{ $faculty->name }}</h3>
                <h5> kualitas udara "SEDANG" dengan parameter :
                </h5>
                <ul style="margin-left: 30px;">
                    <li id="pm10" data-value="{{ $data['data']['PM 10'] }}">
                        PM10: {{ $data['data']['PM 10'] }}
                    </li>
                    <li id="co" data-value="{{ $data['data']['CO'] }}">
                        CO : {{ $data['data']['CO'] }}
                    </li>
                    <li id="no2" data-value="{{ $data['data']['NO2'] }}">
                        NO2 : {{ $data['data']['NO2'] }}
                    </li>
                    <li id="o3" data-value="{{ $data['data']['O3'] }}">
                        O3 : {{ $data['data']['O3'] }}
                    </li>
                </ul>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-hover" id="table-data" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Waktu</th>
                                        <th>PM10</th>
                                        <th>CO</th>
                                        <th>NO2</th>
                                        <th>O3</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($datas as $d)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $d['timestamp'] }}</td>
                                            <td>{{ $d['data']['PM 10'] }}</td>
                                            <td>{{ $d['data']['CO'] }}</td>
                                            <td>{{ $d['data']['NO2'] }}</td>
                                            <td>{{ $d['data']['O3'] }}</td>
                                        </tr>
                                    @empty
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <canvas id="detailChartPm">
                        </canvas>
                    </div>
                    <div class="col-md-12">
                        <canvas id="detailChartO3">
                        </canvas>
                    </div>
                    <div class="col-md-12">
                        <canvas id="detailChartCO">
                        </canvas>
                    </div>
                    <div class="col-md-12">
                        <canvas id="detailChartNO2">
                        </canvas>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#table-data').DataTable({});
        var labels = @json($labels); // Days of the month
        var pm10Data = @json(array_values($pm10Data)); // Array of PM10 values for the month
        var coData = @json(array_values($coData)); // Array of CO values for the month
        var no2Data = @json(array_values($no2Data)); // Array of NO2 values for the month
        var o3Data = @json(array_values($o3Data)); // Array of O3 values for the month
        // console.log(pm10Data);


        // Create the PM10 chart
        lineChart(labels, [{
            label: "PM10",
            data: pm10Data,
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }], "detailChartPm", "PM10 Levels Over Time of Today");
        lineChart(labels, [{
            label: "CO",
            data: coData,
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }], "detailChartCO", "CO Levels Over Time of Today");
        lineChart(labels, [{
            label: "NO2",
            data: no2Data,
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }], "detailChartNO2", "NO2 Levels Over Time of Today");
        lineChart(labels, [{
            label: "O3",
            data: o3Data,
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }], "detailChartO3", "O3 Levels Over Time of Today");
    });
</script>
