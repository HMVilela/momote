<?php 
	include("config.php");
    $resposta = array();
   // $resposta["resposta"] = array();
    $files = file_get_contents("php://input");
    $parametros = json_decode($files); 
    $nome       = $parametros->nome;
    $nivel      = $parametros->nivel;
    $senha      = $parametros->senha;
    $genero     = $parametros->genero;
    $cpf        = $parametros->cpf;
    $endereco   = $parametros->endereco;
    $id_estado  = $parametros->id_estado;
    $id_cidade  = $parametros->id_cidade;
    $empresa    = $parametros->empresa;
    $cnpj       = $parametros->cnpj;
    $telefone   = $parametros->telefone;
    $celular    = $parametros->celular;
    $email      = $parametros->email;
    $info       = $parametros->info;
	$link = mysqli_connect($HOST,$USUARIO,$SENHA,$NOMEDOBD) or die(mysqli_error());

    $sql  = "insert into cliente(nome_empresa,cnpj,nome,email,cpf_cnpj,endereco,cidade,estado,";
    $sql .= "telefone,celular,sexo, nivel,info) values('$empresa','$cnpj','$nome','$email','$cpf','$endereco',";
    $sql .= "$id_cidade,$id_estado,'$telefone','$celular',$genero,$nivel,'$info')";
  // echo "sql: " . $sql;
	$resultado = mysqli_query($link,$sql)or die(mysqli_error($link));

	if($resultado > 0){
        
        $_id = mysqli_insert_id($link);
        
        $sql2 = "insert into login(id_usuario,usuario,senha,nivel,tipo) values($_id,'$email','$senha',$nivel,$LOGIN_TIPO_CLIENTE)";
        $resultado2 = mysqli_query($link,$sql2);
        if($resultado2 > 0)
        {
            $resposta["status"] = true;
            $resposta["info"]   = "Gravado com sucesso";
            $resposta["nome"]   = $nome;
            $resposta["id"]     = $_id; 
        }
	}                                          
	else{
        $resposta["status"] = false;
        $resposta["info"]   = "Erro na gravação";
        $resposta["nome"]   = $nome;
        $resposta["id"]     = 0;
    } 
    
    mysqli_close($link);
   // mysqli_free_result($resultado);
    echo json_encode($resposta);
	
?>