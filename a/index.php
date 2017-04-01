<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Document</title>
</head>
<body>
<div style="width: 100%;">
    <div id="parent">
        <canvas style="height: 300px;" id="myChart"></canvas>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.2.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>
    <script>
var canvas = document.getElementById("myChart");
var ctx = canvas.getContext("2d");

var parent = document.getElementById('parent');

canvas.width = parent.offsetWidth;
canvas.height = parent.offsetHeight;

var chart = new Chart(ctx, {
  type: 'line',
  options: {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
            xAxes: [{
                ticks: {
               autoSkip: true,
          maxRotation: 0,
          minRotation: 90,
        fontSize: 6
                }
            }]
        }
  },
  data: {
    labels: ['1','2','3','4','5','6','7','8','9','10',
    '11','12','13','14','15','16','17','18','19','20',
    '21','22','23','24','25','26','27','28','29','30',
    '31','32','33','34','35','36','37','38','39','40',
    '41','42','43','44','45','46','47','48','49','50',
    '51','52','53','54','55','56','57','58','59'],
    datasets: [
      {
        label: 'Test 01',
        data: [1, 2, 3, 4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,
        21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,
        43,44,45,46,47,48,49,50,51,54,53,55,55,56,57,58,59,60]
      },
      {
        label: 'Test 03',
        data: [3, 2, 5, 10, 23, 21]
      }
    ]
  }
});
    </script>
</body>
</html>