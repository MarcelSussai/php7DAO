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

$user = new Usuario();
$user->loadById(19);
echo $user;
?>
</body>
</html>