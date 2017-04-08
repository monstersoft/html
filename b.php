<!DOCTYPE html>
<html>
<head>
</head>
<body>

<img id="scream" src="Pixel-Ruler_1.jpg"><br>
<canvas id="myCanvas" width="600" height="700"></canvas>

<script>
document.getElementById("scream").onload = function() {
    var c = document.getElementById("myCanvas");
    var ctx = c.getContext("2d");
    var img = document.getElementById("scream");
    ctx.drawImage(img,30,30,60,60,0,0);
    //var imgData = ctx.getImageData(0, 0, c.width, c.height);
    //ctx.putImageData(imgData, 10, 10);
};
</script>
</body>
</html