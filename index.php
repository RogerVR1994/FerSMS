<?php
	$result = false;

	if(!empty($_POST)){

	    require ('plivo-curl-wrapper.php');
	    //use Plivo\RestAPI;
	    $auth_id = "MAZTKYMJIWY2Y3YZNIYZ";
	    $auth_token = "YjdlOGJlZTg3NzBhZTI1ZTI0MmY0NWNhNTRmN2U5";
	    
	    $p = new RestAPI($auth_id, $auth_token);

	    $number = $_POST['number'];
	    $sms = $_POST['sms'];
	    $sms = '+52'.$sms;
	    // Send a message
	    $params = array(
	            'src' => '14083598743', // Sender's phone number with country code
	            'dst' => $number, // Receiver's phone number with country code
	            'text' => $sms 
	        );
	    // Send message
	    $response = $p->send_message($params);
	    // Print the response
	    //echo "Response : ";
	    //print_r($response['response']);
	    // Print the Api ID
	    //echo "<br> Api ID : {$response['response']['api_id']} <br>";
	    // Print the Message UUID
	    //echo "Message UUID : {$response['response']['message_uuid'][0]} <br>";
	    //header("Location: /Redes/hola.html");
	    $result = true;
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Enviar SMS</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h1>Enviar SMS</h1>
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