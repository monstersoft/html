<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="recursos/bootstrap/css/bootstrap.min.css">
    <style>
        .chartWrapper {
            position: relative;
            width: 100%;
            overflow: hidden;
        }

        .chartWrapper > canvas {
            position: absolute;
            left: 0;
            top: 0;
            pointer-events:none;
        }

        .chartAreaWrapper {
            overflow-x: scroll;
        }
        .border {
            border: 0.5px solid red;
        }
    </style>
</head>
<body>
    <div class="chartWrapper border">
        <div class="chartAreaWrapper">
            <canvas id="myChart" height="256" width="2000"></canvas>
        </div>
        <canvas id="myChartAxis" height="250" width="0"></canvas>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.0.min.js"></script>
    <script src="recursos/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>
    <script>
        var ctx = document.getElementById("myChart").getContext("2d");

        var data = {
                labels: ['08:00 am','08:01 am','08:02 am','08:03 am','08:04 am','08:05 am','08:06 am','08:07 am','08:08 am','08:09 am',
                '08:10 am','08:11 am','08:12 am','08:13 am','08:14 am','08:15 am','08:16 am','08:17 am','08:18 am','08:19 am',
                '08:20 am','08:21 am','08:22 am','08:23 am','08:24 am','08:25 am','08:26 am','08:27 am','08:28 am','08:28 am',
                '08:30 am','08:31 am','08:32 am','08:33 am','08:34 am','08:35 am','08:36 am','08:37 am','08:38 am','08:39 am',
                '08:40 am','08:41 am','08:42 am','08:43 am','08:44 am','08:45 am','08:46 am','08:47 am','08:48 am','08:49 am',
                '08:50 am','08:51 am','08:52 am','08:53 am','08:54 am','08:55 am','08:56 am','08:57 am','08:58 am','08:59 am'],
                datasets: [
                {
                    label: 'FRONTAL',
                    fill: false,
                    lineTension: 0,
                    backgroundColor: "#F5A214",
                    borderColor: "#F5A214",
                    borderWidth: 1,
                    pointRadius: 1,
                    data: get(0,5000)
                },
                {
                    label: 'TRASERA',
                    fill: false,
                    lineTension: 0,
                    backgroundColor: "#262626",
                    borderColor: "#262626",
                    borderWidth: 1,
                    pointRadius: 1,
                    data: get(0,5000)
                }
                ]
            }

        var chart = new Chart(ctx,{
            type: 'line',
            options: {
                responsive: false,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: true
                        },
                        ticks: {
                        autoSkip: true,
                        maxRotation: 0,
                        minRotation: 90,
                        fontSize: 10,
                        beginAtZero: true,
                        maxTicksLimit: 20
                        }
                    }],
                    yAxes:[{
                        gridLines: {
                            display: true
                        },
                        ticks: {
                            beginAtZero: true
                        },
                        stacked: false
                    }]
                }
            },
            data: data,
            onAnimationComplete: function () {
                var sourceCanvas = this.chart.ctx.canvas;
                var copyWidth = this.scale.xScalePaddingLeft - 5;
                // the +5 is so that the bottommost y axis label is not clipped off
                // we could factor this in using measureText if we wanted to be generic
                var copyHeight = this.scale.endPoint + 5;
                var targetCtx = document.getElementById("myChartAxis").getContext("2d");
                targetCtx.canvas.width = copyWidth;
                targetCtx.drawImage(sourceCanvas, 0, 0, copyWidth, copyHeight, 0, 0, copyWidth, copyHeight);
            }
        });
        
        function get(min, max) {
      var a = [];
      var i=0;
      while(i<=60) {
          a.push(Math.floor(Math.random() * (max - min + 1)) + min);
          i++;
      }
      return a;
    }

    </script>
</body>
</html>