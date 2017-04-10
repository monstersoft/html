<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="a/recursos/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.10.1/chartist.min.css" />
</head>
    <body>
<div class="ct-chart"></div>
        <script src="a/recursos/jquery/jquery.min.js"></script>
        <script src="a/recursos/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.10.1/chartist.min.js"></script>
<script>
var data = {
    labels: ['08:00 am','08:01 am','08:02 am','08:03 am','08:04 am','08:05 am','08:06 am','08:07 am','08:08 am','08:09 am',
                '08:10 am','08:11 am','08:12 am','08:13 am','08:14 am','08:15 am','08:16 am','08:17 am','08:18 am','08:19 am',
                '08:20 am','08:21 am','08:22 am','08:23 am','08:24 am','08:25 am','08:26 am','08:27 am','08:28 am','08:28 am',
                '08:30 am','08:31 am','08:32 am','08:33 am','08:34 am','08:35 am','08:36 am','08:37 am','08:38 am','08:39 am',
                '08:40 am','08:41 am','08:42 am','08:43 am','08:44 am','08:45 am','08:46 am','08:47 am','08:48 am','08:49 am',
                '08:50 am','08:51 am','08:52 am','08:53 am','08:54 am','08:55 am','08:56 am','08:57 am','08:58 am','08:59 am'],
    series: [
        get(0,60),
        get(0,60)
    ],
    colors:["#333", "#222", "#111", "#000"]
};
var options = {
    width: 2000,
    height: 300
}
new Chartist.Line('.ct-chart', data, options);
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