<?php 
	include("config.php");
    $resposta = array();
    $files = file_get_contents("php://input");
    $parametros = json_decode($files); 
    $nome       = $parametros->nome;
    $email      = $parametros->email;
    $assunto    = $parametros->assunto;
    $mensagem   = $parametros->mensagem;
    
    $msg = $nome . " diz: \r\n" . $mensagem;
    $header = "From: " . $email;
    if((mail($EMAIL_DE_DESTINO,$assunto,$msg,$header)) === true){
        $resposta["status"] = true;
        $resposta["info"]   = "Obrigado, seu e-mail foi enviado com sucesso!";
    }
    else{
        $resposta["status"] = false;
        $resposta["info"]   = "Desculpe, houve um erro ao enviar o e-mail.";
    }
	echo json_encode($resposta);
	
?>