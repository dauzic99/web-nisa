<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="detailFacultyModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header center">
                <h4 class="modal-title" id="myModalLabel">DATA DETAIL</h4>
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <h3 class="modal-isi" id="mymodal">{{ $data->name }}</h3>
                <h5> kualitas udara "SEDANG" dengan parameter :
                </h5>
                <ul style="margin-left: 30px;">
                    <li id="pm10" data-value="{{ $data->getLatestReading()->PM10 }}">
                        PM10: {{ $data->getLatestReading()->PM10 }}
                    </li>
                    <li id="co" data-value="{{ $data->getLatestReading()->CO }}">
                        CO : {{ $data->getLatestReading()->CO }}
                    </li>
                    <li id="no2" data-value="{{ $data->getLatestReading()->NO2 }}">
                        NO2 : {{ $data->getLatestReading()->NO2 }}
                    </li>
                    <li id="o2" data-value="{{ $data->getLatestReading()->O2 }}">
                        O2 : {{ $data->getLatestReading()->O2 }}
                    </li>
                </ul>
                <div class="row">
                    <hr>
                </div>
                <canvas id="detailChart">

                </canvas>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        var pm10 = $('#pm10').data('value');
        var co = $('#co').data('value');
        var no2 = $('#no2').data('value');
        var o2 = $('#o2').data('value');
        var labels = [
            "PM10",
            "CO",
            "NO2",
            "O2"
        ];

        var dataDetail = [{
                label: "PPM",
                data: [pm10,
                    co,
                    no2,
                    o2
                ],
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
        console.log(dataDetail);
        doughnutChart(labels, dataDetail, "detailChart", "Data Test");
    });
</script>
