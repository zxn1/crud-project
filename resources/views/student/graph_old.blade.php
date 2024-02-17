<html>
    <head>
        <title>graph</title>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    </head>
    <body>
        <div id="chart"></div>

        <script>
            var options = {
            series: [{
            name: 'Inflation',
            data: [{{ $studProfileMale }}, {{ $studProfileFemale }}]
            }],
            chart: {
            height: 350,
            type: 'bar',
            },
            plotOptions: {
            bar: {
                borderRadius: 10,
                dataLabels: {
                position: 'top', // top, center, bottom
                },
            }
            },
            dataLabels: {
            enabled: true,
            formatter: function (val) {
                return val + "%";
            },
            offsetY: -20,
            style: {
                fontSize: '12px',
                colors: ["#304758"]
            }
            },
            
            xaxis: {
            categories: ["Male", "Female"],
            position: 'top',
            axisBorder: {
                show: false
            },
            axisTicks: {
                show: false
            },
            crosshairs: {
                fill: {
                type: 'gradient',
                gradient: {
                    colorFrom: '#D8E3F0',
                    colorTo: '#BED1E6',
                    stops: [0, 100],
                    opacityFrom: 0.4,
                    opacityTo: 0.5,
                }
                }
            },
            tooltip: {
                enabled: true,
            }
            },
            yaxis: {
            axisBorder: {
                show: false
            },
            axisTicks: {
                show: false,
            },
            labels: {
                show: false,
                formatter: function (val) {
                return val + "%";
                }
            }
            
            },
            title: {
            text: 'Maklumat tentang lelaki dan perempuan yang berdaftar didalam sistem.',
            floating: true,
            offsetY: 330,
            align: 'center',
            style: {
                color: '#444'
            }
            }
            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        </script>
    </body>
</html>