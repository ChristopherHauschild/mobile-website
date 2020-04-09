<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Cadastre-se </title>
	<link rel="stylesheet" type="text/css" href="https://christopherhauschild.github.io/mobile_website.github.io/estilo.css">
	<link rel="shortcut icon" type="image/x-icon" href="https://christopherhauschild.github.io/mobile_website.github.io/design/logo.png">
	<script type="text/javascript" src="mascara.js"></script>
	<script language="JavaScript" type="text/javascript" src="cidades-estados-1.4-utf8.js"></script>
	<!-- Precisa fazer escala correta no mobile -->
	<meta name="viewport" content="widht=device-widht, initial-scale=1.0">
</head>

<body>
	<div class="container">
		<div class="cabecalho">
				<div class="cabecalhoL1">

					<div class="menu">
						<input type="checkbox" id="chkMenu">
						<label class="iconeMenu"for="chkMenu"><img src="design/menu.png"></label>
					
						<div class="barraMenu">
						<nav>
							<div class="menuCategorias">
							<input type="checkbox" id="chkMenuCategorias">
							<label class="iconeMenuCategorias"for="chkMenuCategorias"><p style="color: #eb008b">NOSSAS CATEGORIAS</p></label>
								<div class="barraMenuCategorias">
									<nav>
										<p><a href="https://christopherhauschild.github.io/mobile_website.github.io/produtos.php?cat=Abstrato">ABSTRATO</a></p>
										<p><a href="https://christopherhauschild.github.io/mobile_website.github.io/produtos.php?cat=Natureza">NATUREZA</a></p>
										<p><a href="https://christopherhauschild.github.io/mobile_website.github.io/produtos.php?cat=Urban"> URBAN</a></p>
										<p><a href="https://christopherhauschild.github.io/mobile_website.github.io/produtos.php?cat=Mundo"> MUNDO</a></p>
									</nav>
								</div>
							</div>
							<div class="menuColecoes">
							<input type="checkbox" id="chkMenuColecoes">
							<label class="iconeMenuColecoes"for="chkMenuColecoes"><p>COLEÇÕES</p></label>
								<div class="barraMenuColecoes">
									<nav>
										<p><a href="https://christopherhauschild.github.io/mobile_website.github.io/login.php">CIDADES</a></p>
										<p><a href="https://christopherhauschild.github.io/mobile_website.github.io/carrinho.php">DAY AND NIGHT</a></p>
										<p><a href="https://christopherhauschild.github.io/mobile_website.github.io/produtos.php">#GIRLPOWER</a></p>
										<p><a href="https://christopherhauschild.github.io/mobile_website.github.io/produtos.php"> LIFE A HOLIC</a></p>
										<p><a href="https://christopherhauschild.github.io/mobile_website.github.io/produtos.php"> URBANO</a></p>
									</nav>
								</div>
							</div>
							<div class="menuAcessorios">
							<input type="checkbox" id="chkMenuAcessorios">
							<label class="iconeMenuAcessorios"for="chkMenuAcessorios"><p>ACESSÓRIOS</p></label>
								<div class="barraMenuAcessorios">
									<nav>
										<p><a href="https://christopherhauschild.github.io/mobile_website.github.io/login.php">PULSEIRAS & COLARES</a></p>
										<p><a href="https://christopherhauschild.github.io/mobile_website.github.io/carrinho.php">ALMOFADAS</a></p>
										<p><a href="https://christopherhauschild.github.io/mobile_website.github.io/produtos.php">CAMISETAS</a></p>
									</nav>
								</div>
							</div>
							<p><a href="https://christopherhauschild.github.io/mobile_website.github.io/centraldeAtendimento.php">CONTATE-NOS</a></p>
							<p><a href="https://christopherhauschild.github.io/mobile_website.github.io/index.php"> PÁGINA INICIAL</a></p>
						</nav>
						</div>

					</div>
					<div class="logo"><a href="https://christopherhauschild.github.io/mobile_website.github.io/index.php"><img alt="logo escrito PICTURAE" src="design/logotipo.png"></a></div>
					<div class="favoritos">
					<a href="https://christopherhauschild.github.io/mobile_website.github.io/cadastro.php"><img alt="icone de um usuario" src="design/favoritos.png"></a></div>
					<div class="carrinho">
					<a href="https://christopherhauschild.github.io/mobile_website.github.io/carrinho.php"><img alt="icone de um carrinho"src="design/carrinho.png"></a></div>
				</div>

				<form action="https://christopherhauschild.github.io/mobile_website.github.io/produtos.php" method="GET">
				<div class="cabecalhoL2">
					<input type="text" name="busca" style="font-size: 96%; font-family: Roboto Light; color: black; margin-left: 12px;" placeholder="O que você procura?...">
					<input type="submit" id="btnBuscar">
					<label for="btnBuscar" class="lblBuscar"><img src="design/lupa.png"></label>
				</div>
				</form>
		</div>
<div class="finalizar-compra">

<?php
include "includes/conexao.php";

if ($_POST['nome'] != "" && $_POST['sobrenome'] != "" && $_POST['senha'] != "" && $_POST['email'] != "") {

	$nome  = $_POST['nome'];
	$sobrenome  = $_POST['sobrenome'];
	$senha = $_POST['senha'];
	$email = $_POST['email'];

	$sql = "INSERT INTO usuario(nome, sobrenome, senha, email)
		             VALUES ('$nome', '$sobrenome', '$senha', '$email');
";

	$retornoInsert = mysqli_query($conexao, $sql);

	if ($retornoInsert) {
		echo "Registro salvo com sucesso!";
	} else {
		echo "Erro ao salvar registro!";
	}
	mysqli_close($conexao);
} else {
	echo "Opss! Tente novamente! Mas agora preenchendo todos os campos!";
	echo "<a href=\"usuario-cadastra.php\">Cadastro de Usuário</a>";
}
?>
<br><br>
<a href="usuario-lista.php">Lista Usuário</a>
</div>
<div class="rodape">
			<div class="rodape-redes-sociais-titulo">
				Nos acompanhe nas Redes Sociais
			</div>
			<div class="rodape-redes-sociais-icones">
				<div class="redes-sociais-icone">
				<div>
					<img src="design/tt.png">
				</div>
				<div>
					<p> urban_arts </p>
				</div>
			</div>
			<div class="redes-sociais-icone">
				<div>
					<img src="design/face.png">
				</div>
				<div>
					<p> Urban Art's </p>
				</div>
			</div>
			<div class="redes-sociais-icone">
				<div>
					<img src="design/insta.png">
				</div>
				<div>
					<p> @urbanarts </p>
				</div>
			</div>
			</div>

			<div class="rodape-info-titulo">
			Minha Conta I Central de Atendimento I Home
			</div>

			<div class="rodape-atendimento">
				<div class="rodape-atendimento-esquerda">
					<p>Atendimento: <br>
					(51) 99999-9999</p>
				</div>
				<div class="rodape-atendimento-direita">
					<p>Horário de Atendimento: <br>
					Seg. a Sex. - 8:00hrs a 18:00hrs</p>
				</div>
			</div>

			<div class="rodape-mapa">
			<a href="https://christopherhauschild.github.io/mobile_website.github.io/index.php"><img alt="endereço loja" src="design/mapa.png"></a>
			</div>

			<div class="rodape-copyright">
				Copyright by Christopher
			</div>
			
		</div>

	</div>
</body>
</html>
