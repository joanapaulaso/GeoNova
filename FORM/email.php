<?php

$name		= $_POST["name"];	// Pega o valor do campo Nome
$email		= $_POST["email"];	// Pega o valor do campo Email
$msg	= $_POST["msg"];	// Pega os valores do campo Mensagem

// Variável que junta os valores acima e monta o corpo do email

$Vai 		= "Nome: $name\n\nE-mail: $email\n\nMensagem: $msg\n";

require_once("phpmailer/class.phpmailer.php");

define('GUSER', 'joanapaulasoliveira@gmail.com');	// <-- Insira aqui o seu GMail
define('GPWD', '#P4ul4J04n4#');		// <-- Insira aqui a senha do seu GMail

function smtpmailer($para, $de, $de_nome, $assunto, $corpo) { 
	global $error;
	$mail = new PHPMailer();
	$mail->IsSMTP();		// Ativar SMTP
	$mail->SMTPDebug = 0;		// Debugar: 1 = erros e mensagens, 2 = mensagens apenas
	$mail->SMTPAuth = true;		// Autenticação ativada
	// $mail->SMTPSecure = 'ssl';	// SSL REQUERIDO pelo GMail
	$mail->Host = 'smtp.gmail.com';	// SMTP utilizado
	$mail->Port = 465;  		// A porta 587 deverá estar aberta em seu servidor
	$mail->Username = GUSER;
	$mail->Password = GPWD;
	$mail->SetFrom($de, $de_nome);
	$mail->Subject = $assunto;
	$mail->Body = $corpo;
    $mail->AddAddress($para);
    
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} else {
		$error = 'Mensagem enviada!';
		return true;
	}
}

if (smtpmailer('joanapaulasoliveira@gmail.com', 'joanapaulasoliveira@gmail.com', 'GeoNova', 'Formulario de contato', $Vai)) {

    Header("location:https://joanapaulaso.github.io/GeoNova/FORM/enviado.html"); // Redireciona para uma página de obrigado.

}

if (!empty($error)) echo $error;

?>