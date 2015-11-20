<?php 
	include("config.php");
    $resposta = array();
   // $resposta["resposta"] = array();
    $files = file_get_contents("php://input");
    $parametros = json_decode($files); 
    $email      = $parametros->email;

	$link = mysqli_connect($HOST,$USUARIO,$SENHA,$NOMEDOBD) or die(mysqli_error($link));
    mysqli_set_charset($link,'utf8') or die(mysqli_error($link));
    $sql  = "insert into usuarios(email) values ('" . $email . "')";
	$resultado = mysqli_query($link,$sql)or die(mysqli_error($link));

	if($resultado > 0){
        
        $_id = mysqli_insert_id($link);

        if($resultado2 > 0)
        {
            $resposta["status"] = true;
            $resposta["info"]   = "Email gravado com sucesso";
            $resposta["nome"]   = $nome;
            $resposta["id"]     = $_id; 
        }
	}                                          
	else{
        $resposta["status"] = false;
        $resposta["info"]   = "Erro na gravação do email";
        $resposta["nome"]   = $nome;
        $resposta["id"]     = 0;
    } 
    
    mysqli_close($link);
   // mysqli_free_result($resultado);
    echo json_encode($resposta);
	
?>