
<?php
	if(isset($_FILES['archivo'])) {
		$file = $_FILES['archivo'];
		$name = $file['tmp_name'];
		echo 'bien';
	}
	else
		echo 'Error';
 ?>