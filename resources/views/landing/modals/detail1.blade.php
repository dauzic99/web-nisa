<!-- Modal -->
<div class="modal fade bs-detail1-modal-centered" tabindex="-1" role="dialog" aria-labelledby="centerModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header center">
                <h4 class="modal-title" id="myModalLabel" >DATA DETAIL</h4>
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
               <h3 class="modal-isi" id="mymodal">Fakultas Teknik</h3>
            <h5> kualitas udara "SEDANG" dengan parameter : 
               <br> PM10: 60
               <br> CO  : 86
               <br> NO2 : 89
               <br> O2  : 65
            </h5>
               <canvas id="detail1Chart"></canvas>
            </div>
        </div>
    </div>
</div>

@push('js')
<script src="{{ asset('canvas/js/chart.js') }}"></script>
    <script src="{{ asset('canvas/js/chart-utils.js') }}"></script>
<script>
    
    $(document).ready(function () {
        var labels = [
            "PM10",
            "CO",
            "NO2",
            "O2"
        ];
        var data = [
            {
                label:"PPM",   
                data:[20.5,30,70.5,50.6],
                backgroundColor: ['#009ef7',
                    '#50CD89',
        '#F1416C',
        '#003f5c',],
                borderColor: ['#009ef7',
        '#50CD89',
        '#F1416C',
        '#003f5c',],
            },
            
        ];

        barChart(labels,data,"detail1Chart","Data Test");
    });
    
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
                    display: false
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
@endpush
