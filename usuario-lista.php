<?php
//Conectar no banco
include "includes/conexao.php";

$sql       = 'SELECT * FROM usuario';
$resultado = mysqli_query($conexao, $sql);

mysqli_close($conexao);

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Listar Usuários</title>
        <link href="css/style-admin.css" rel="stylesheet">
    </head>
    <body>
<h1>Lista Usuário</h1>
<table>
    <tr>
    	<th>Id</th>
        <th>Nome</th>
        <th>Sobrenome</th>
        <th>Senha</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>
<?php while ($dados = mysqli_fetch_array($resultado)) {
	echo "<tr>";
	echo "<td>".$dados['id']."</td>";
	echo "<td>".$dados['nome']."</td>";
    echo "<td>".$dados['sobrenome']."</td>";
	echo "<td>".$dados['senha']."</td>";
	echo "<td>".$dados['email']."</td>";
	echo " <td> <a href='https://christopherhauschild.github.io/mobile_website.github.io/usuario-edita.php?id={$dados['id']}'>Editar</a>  ";
	echo "      <a href='https://christopherhauschild.github.io/mobile_website.github.io/usuario-deleta-ok.php?id={$dados['id']}'>Deletar</a>  </td>";
	echo "</tr>";
}
?>
</table>


<br>
<a href="https://christopherhauschild.github.io/mobile_website.github.io/cadastroNovo.php">Cadastrar Usuário</a>

    </body>
</html>
