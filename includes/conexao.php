<?php

//Conectar no banco
$databaseHost    = 'localhost';
$databaseUsuario = 'root';
$databaseSenha   = '';
$databaseNome    = 'sistema';

$conexao = mysqli_connect($databaseHost, $databaseUsuario, $databaseSenha, $databaseNome);

/*$conexao = mysqli_connect($databaseHost, $databaseUsuario, $databaseSenha, $databaseNome);
if (mysqli_connect_error($conexao)) {
echo "Problemas para conectar no banco. Verifique os dados!";
die();
}
mysqli_set_charset($conexao, "utf8");
//echo "Connected successfully";*/

?>
