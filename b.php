<!DOCTYPE html>
<html>
<head>
<style>

    .col {
        width: 100%;
        height: 250px;
        overflow: auto;
        position: relative;
    }
    .c1 {
        position: absolute;
        top: 0;
        left: 0px;
        width: 2000px;
        height: 200px;
        border: 5px solid green;
        z-index: 0;
    }
    .c0 {
        position: sticky;
        top: 0;
        left: 0;
        width: 50px;
        height: 200px;
        border: 5px solid black;
        z-index: 1;
        background: black;
    }
    </style>
</head>
<body>
<img id="scream" src="robot.jpg" alt="The Scream">
<canvas id="myCanvas" height="549" width="300"></canvas>

<script>
window.onload = function() {
    var c = document.getElementById("myCanvas");
    var ctx = c.getContext("2d");
    var img = document.getElementById("scream");
    
    /*drawImage(
        Specifies the image canvas or video element to use, 
        The x coordinate where to start clipping, 
        The y coordinate where to start clipping,
        The width of the clipped image,
        The height of the clipped image,
        The x coordinate where to place the image on the canvas,
        The y coordinate where to place the image on the canvas,
        The width of the image to use,
        The height of the image to use)*/
    
    ctx.drawImage(img,0,0,300,549,0,0,300,549);
};
</script>

</body>
</html