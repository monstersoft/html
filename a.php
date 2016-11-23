<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="semantic/semantic.min.css">
</head>
<body>
	<a id="modalEliminar" href="#">modalEliminar</a>
<!--<div class="ui small basic test modal transition visible active" style="margin-top: -127.5px; display: block !important;">
    <div class="ui icon header">
      <i class="archive icon"></i>
      Archive Old Messages
    </div>
    <div class="content">
      <p>Your inbox is getting full, would you like us to enable automatic archiving of old messages?</p>
    </div>
    <div class="actions">
      <div class="ui red basic cancel inverted button">
        <i class="remove icon"></i>
        No
      </div>
      <div class="ui green ok inverted button">
        <i class="checkmark icon"></i>
        Yes
      </div>
    </div>
  </div>-->
	<script src="jquery/jquery-2.2.4.min.js"></script>
	<script src="semantic/semantic.js"></script>
	<script>
		$(document).ready(function(){
			$('#modalEliminar').click(function(){
				alert("asdasds");
				//$('.ui.basic.modal').modal('show');
			});
		});
	</script>
</body>
</html>