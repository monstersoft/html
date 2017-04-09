<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
<div class="col">
    <div class="c0"></div>
    <div class="c1">
        <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora porro praesentium, odit illum, eum ullam consequatur alias facere inventore pariatur aspernatur vero in, a quisquam cupiditate expedita accusantium. Ipsum, accusamus</div>
        <div>Aut illum doloremque minima ipsa sunt, expedita officiis fuga facere similique modi autem repudiandae nam unde, architecto ab quod non reiciendis et saepe quas. Eaque nemo ea, rerum obcaecati id.</div>
        <div>Modi voluptate mollitia cupiditate fuga, nihil iste, sed incidunt facere dolorem natus quia similique. Minus cupiditate excepturi, veritatis modi magnam error deserunt sapiente incidunt ipsam voluptates quo dolorum, dolorem nesciunt.</div>
        <div>Ad nisi obcaecati odio, labore cumque dolor. Velit quibusdam, repudiandae placeat! Eius velit qui quas. Incidunt sit omnis, adipisci excepturi deserunt assumenda aut, vero ut voluptatem, ex a soluta reiciendis!</div>
        <div>Magnam sit sequi neque cumque incidunt id, saepe accusantium magni aliquam a minus, doloribus consequatur nisi ab quam, obcaecati dicta hic eos. Repellendus aliquid, libero modi officiis quisquam, in cupiditate.</div>
    </div>
</div>



</body>
</html