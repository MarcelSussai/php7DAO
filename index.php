<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teste DAO</title>
</head>
<body>
<?php
require_once("config.php");
/*$sql = new Sql();
$usuarios = $sql->select("SELECT * FROM tb_user");
echo var_dump($usuarios);*/

// Carrega um Usuário
//$user = new Usuario();
//$user->loadById(19);
//echo $user;

// Carrega um lista de usuarios
//$lista = Usuario::getList();
//echo print_r($lista);

//$search = Usuario::search("05");
//echo json_encode($search);

/*
$usuario = new Usuario();
$usuario->login("user03", "senh03");
echo $usuario;
*/

$aluno = new Usuario();
$aluno->setVcLogin("aluno");
$aluno->setVcSenha("@alun1");
$aluno->insert();

echo $aluno;

?>
</body>
</html>