<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <script src="jquery/pace.min.js"></script>
        <style>

            /*! NProgress (c) 2013, CSS code Aizum Blog */
.pace {
  -webkit-pointer-events: none;
  pointer-events: none;

  -webkit-user-select: none;
  -moz-user-select: none;
  user-select: none;

  position: fixed;
  top: 0;
  left: 0;
  width: 100%;

  -webkit-transform: translate3d(0, -50px, 0);
  -ms-transform: translate3d(0, -50px, 0);
  transform: translate3d(0, -50px, 0);

  -webkit-transition: -webkit-transform .5s ease-out;
  -ms-transition: -webkit-transform .5s ease-out;
  transition: transform .5s ease-out;
}

.pace.pace-active {
  -webkit-transform: translate3d(0, 0, 0);
  -ms-transform: translate3d(0, 0, 0);
  transform: translate3d(0, 0, 0);
}

.pace .pace-progress {
  display: block;
  position: fixed;
  z-index: 2000;
  top: 0;
  right: 100%;
  width: 100%;
  height: 10px;
  background: #29d;

  pointer-events: none;
}
        </style>
    </head>
    <script src="jquery/jquery-2.2.4.min.js"></script>
    <body>
        <div id="nprogress"></div>
        <h1>hello</h1>
    </body>
</html>
