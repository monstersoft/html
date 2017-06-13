<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="recursos/semantic/semantic.min.css">
    <style>
        .ui.action.fluid.input {
            padding: 5px;
        }
    </style>
</head>
<body>
<div class="ui action fluid input">
  <input type="text" value=",---,_          ," id="foo1">
  <button class="ui teal right icon button btn" data-clipboard-target="#foo1"><i class="copy icon"></i></button>
</div>
<div class="ui action fluid input">
  <input type="text" value=">   `'-.  .--'/" id="foo2">
  <button class="ui teal right icon button btn" data-clipboard-target="#foo2"><i class="copy icon"></i></button>
</div>
<div class="ui action fluid input">
  <input type="text" value=".--'` ._      `/   <" id="foo3">
  <button class="ui teal right icon button btn" data-clipboard-target="#foo3"><i class="copy icon"></i></button>
</div>
<div class="ui action fluid input">
  <input type="text" value=">,-' ._'.. ..__ . ' '-." id="foo4">
  <button class="ui teal right icon button btn" data-clipboard-target="#foo4"><i class="copy icon"></i></button>
</div>
<div class="ui action fluid input">
  <input type="text" value=".-'   .'`         `'.     '." id="foo5">
  <button class="ui teal right icon button btn" data-clipboard-target="#foo5"><i class="copy icon"></i></button>
</div>
<div class="ui action fluid input">
  <input type="text" value=">   / >`-.     .-'< \ , '._\" id="foo6">
  <button class="ui teal right icon button btn" data-clipboard-target="#foo6"><i class="copy icon"></i></button>
</div>
<div class="ui action fluid input">
  <input type="text" value="/    ; '-._>   <_.-' ;  '._>" id="foo7">
  <button class="ui teal right icon button btn" data-clipboard-target="#foo7"><i class="copy icon"></i></button>
</div>
<div class="ui action fluid input">
  <input type="text" value="`>  ,/  /___\ /___\  \_  /" id="foo8">
  <button class="ui teal right icon button btn" data-clipboard-target="#foo8"><i class="copy icon"></i></button>
</div>
<div class="ui action fluid input">
  <input type="text" value="`.-|(|  \o_/  \o_/   |)|`" id="foo9">
  <button class="ui teal right icon button btn" data-clipboard-target="#foo9"><i class="copy icon"></i></button>
</div>
<div class="ui action fluid input">
  <input type="text" value="\;        \      ;/" id="foo10">
  <button class="ui teal right icon button btn" data-clipboard-target="#foo10"><i class="copy icon"></i></button>
</div>
<div class="ui action fluid input">
  <input type="text" value="\  .-,   )-.  /" id="foo11">
  <button class="ui teal right icon button btn" data-clipboard-target="#foo11"><i class="copy icon"></i></button>
</div>
<div class="ui action fluid input">
  <input type="text" value="/`  .'-'.  `\" id="foo12">
  <button class="ui teal right icon button btn" data-clipboard-target="#foo12"><i class="copy icon"></i></button>
</div>
<div class="ui action fluid input">
  <input type="text" value=";_.-`.___.'-.;" id="foo13">
  <button class="ui teal right icon button btn" data-clipboard-target="#foo13"><i class="copy icon"></i></button>
</div>
<script src="recursos/jquery/jquery.min.js"></script>
<script src="recursos/semantic/semantic.min.js"></script>
<script src="clipboard.min.js"></script>
<script>
    $(document).ready(function(){
        new Clipboard('.btn');
    });
</script>
</body>
</html>
