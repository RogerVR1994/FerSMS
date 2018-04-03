<?php
	$result = false;

	if(!empty($_POST)){

	    require ('plivo-curl-wrapper.php');
	    
	    $auth_id = "MAZTKYMJIWY2Y3YZNIYZ";
	    $auth_token = "YjdlOGJlZTg3NzBhZTI1ZTI0MmY0NWNhNTRmN2U5";
	    
	    $p = new RestAPI($auth_id, $auth_token);

	    $number = $_POST['number'];
	    $sms = $_POST['sms'];
	    $number = '+52'.$number;
	    // Send a message
	    $params = array(
	            'src' => '14083598743', 
	            'dst' => $number, 
	            'text' => $sms 
	        );
	    // Enviar SMS
	    $response = $p->send_message($params);
	   
	    $result = true;
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Enviar SMS (Fer)</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h1>Enviar SMS (Fer)</h1>
		<?php
			if ($result == true){
				echo '<div class="alert alert-success">Success!</div>';
			} 
		?>
		<form action="index.php" method="POST">
			<label for="number">Número (10 dígitos)</label>
			<input type="text" name="number" id="number">
			<br>
			<label for="sms">Mensaje (no mas de 80 caracteres)</label>
			<input type="text" name="sms" id="sms">
			<br>
			<input type="submit" value="Save">
		</form>
	</div>
</body>
</html>