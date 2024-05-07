<?php

require("mail.php");

function validate($name, $email, $subject, $message, $form){
    return !empty($name) && !empty($email) && !empty($subject) && !empty($message);
}

$status = "";

if(isset($_POST["form"])){
    if(validate(...$_POST)){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];
        $name = $_POST["name"];

        // Mandar el Correo

        $body = "$name <$email> te envía el siguiente mensaje <br><br> $message";
        sendMail($subject, $body, $email, $name);
        
        $status = "success";
    }
    else {
        $status = "danger";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
	<title>Formulario de Contacto</title>
    </head>
    <body>
	<div id="app"></div>
	<?php if($status=="danger"): ?>
	    <div class="alert danger">
		<span>¡Surgió un problema!</span>
	    </div>
	<?php endif; ?>

	<?php if($status=="success"): ?>
            <div class="alert success">
		<span>¡Mensaje enviado con éxito!</span>
	    </div>
	<?php endif; ?>
	
	<form action="./" method="POST">
	    <h1>¡Deseas que te Contactemos!</h1>
	    
	    <div class="input-group">
		<label for="name">Nombre:</label>
		<input type="text" name="name" id="name"/>
	    </div>
	    
	    <div class="input-group">
		<label for="email">Correo:</label>
		<input type="email" name="email" id="email"/>
	    </div>
	    <div class="input-group">
		<label for="subject">Asunto:</label>
		<input type="text" name="subject" id="subject"/>
	    </div>
	    <div class="input-group">
		<label for="message">Mensaje:</label>
		<textarea name="message" id="message">
		</textarea>
	    </div>

	    <div class="button-container">
		<button name="form" type="submit">Enviar</button>
	    </div>
	    
	    <div class="contact-info">
		<div class="info">
		    <span>Avenida siempre viva</span>
		</div>
		
		<div class="info">
		    <span>alejandro.ayala@onecluster.org</span>
		</div>
	    </div>
	</form>
    </body>
</html>
