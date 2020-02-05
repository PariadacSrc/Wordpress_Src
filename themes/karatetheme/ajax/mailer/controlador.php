<?php

	require_once(__DIR__.'/mailmaster/PHPMailerAutoload.php');

	function inicializar_correo(){


		$mail = new PHPMailer;

		// $mail->isSMTP();                                      // Set mailer to use SMTP
		// $mail->Host = 'dime197.dizinc.com';  // Specify main and backup SMTP servers
		// $mail->SMTPAuth = true;                               // Enable SMTP authentication
		// $mail->Username = 'admingrupocoex@grupocoex.co';                 // SMTP username
		// $mail->Password = 'a!0mtPpH^=Cd';                           // SMTP password
		// $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		// $mail->Port = 465;                                    // TCP port to connect to
		// $mail->isHTML(true);
		// $mail->CharSet = "utf-8";


		$mail->isHTML(true);
		$mail->CharSet = "utf-8";

		return $mail;

	}


	function principal_send($de,$para,$asunto,$datos,$plantilla=false){

		$correo=inicializar_correo();

		$correo->setFrom($de[0],$de[1]);
		$correo->addReplyTo($de[0],$de[1] );
		$correo->addAddress($para[0],$para[1]);
		$correo->Subject=$asunto;

		if ($plantilla) {

			ob_start();

				include($plantilla);
				$correo->Body = ob_get_contents();

			ob_end_clean();
		}

		$retorno=$correo->send();

		unset($correo);

		return $retorno;

	}

	


?>