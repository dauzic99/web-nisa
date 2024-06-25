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
                                        <th>Ozon</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($datas as $d)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $d['timestamp'] }}</td>
                                            <td>{{ $d['data']['PM10'] }}</td>
                                            <td>{{ $d['data']['CO'] }}</td>
                                            <td>{{ $d['data']['NO2'] }}</td>
                                            <td>{{ $d['data']['Ozon'] }}</td>
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
                        <canvas id="detailChartOzon">
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
        var OzonData = @json(array_values($OzonData)); // Array of Ozon values for the month
        var latestDate = @json($latestDate);

        lineChart(labels, [{
            label: "PM10",
            data: pm10Data,
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }], "detailChartPm", "PM10 Levels Over Time of " + latestDate);
        lineChart(labels, [{
            label: "CO",
            data: coData,
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }], "detailChartCO", "CO Levels Over Time of " + latestDate);
        lineChart(labels, [{
            label: "NO2",
            data: no2Data,
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }], "detailChartNO2", "NO2 Levels Over Time of " + latestDate);
        lineChart(labels, [{
            label: "Ozon",
            data: OzonData,
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }], "detailChartOzon", "Ozon Levels Over Time of " + latestDate);
    });
</script>
