<?php 
	include("config.php");
    $resposta = array();
    $nome    = $_POST["nome"];
    $email   = $_POST["email"];

	$link = mysqli_connect($HOST,$USUARIO,$SENHA,$NOMEDOBD) or die(mysqli_connect_error());
    mysqli_set_charset($link,'utf8') or die(mysqli_error($link));

    $sql_verifica_email = "select * from usuarios where email_usuario='" . $email . "'";
    $sql_insere_email = "insert into usuarios(nome_usuario,email_usuario) values ('" . $nome . "','" . $email . "')";

	$result_verificacao = mysqli_query($link,$sql_verifica_email)or die(mysqli_error($link));
    if(mysqli_num_rows($result_verificacao) > 0){
            $resposta["status"] = false;
            $resposta["info"]   = "O e-mail informado já foi cadastrado";
            $resposta["id"]     = 0;
    
    }
    else{
       $result_insercao = mysqli_query($link,$sql_insere_email)or die(mysqli_error($link));
	   if($result_insercao > 0){        
            $_id = mysqli_insert_id($link);
            $resposta["status"] = true;
            $resposta["info"]   = "E-mail gravado com sucesso";
            $resposta["id"]     = $_id;      
	   }                                          
	   else{
            $resposta["status"] = false;
            $resposta["info"]   = "Erro na gravação do e-mail";
            $resposta["id"]     = 0;
        } 
    
    }
    
    mysqli_close($link);
    //mysqli_free_result($resultado);
    echo json_encode($resposta);
	
?>