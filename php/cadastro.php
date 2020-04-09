	<?php
		session_start();

		$_SESSION['ID_USUARIO'] = null;  
		
		$location = 'index.php';

		if(isset($_GET['redirect']) &&  $_GET['redirect'] == 'finalizar'){
			$location = 'carrinho.php';
		}

		$msg = "";
		if(isset($_POST['email']) && $_POST['email'] != "" && isset($_POST['senha']) && $_POST['senha'] != "") {

			include "includes/conexao.php";
			$email = $_POST['email'];
			$senha = $_POST['senha'];

			$sql = "SELECT * FROM usuario where email = '$email' && senha = '$senha'";
			$resultado = mysqli_query($conexao,$sql);
			
			$usuario = mysqli_fetch_array($resultado);

			if(mysqli_num_rows($resultado)){	
				$_SESSION['ID_USUARIO'] = $usuario;			
				header('Location:'.$location);
			} else {			
				$msg = "Email ou senha inválidos!";
			}
		}
	?>
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

	<style>
			iframe{
				width: 90%;
				margin-left: 1.2%;
				margin-top: 2.5%;
				height: 100px;
				box-shadow: grey 1.3px 1.3px 0.8px;
				border-radius: 1px;
				background-color: white;
			}
	</style>

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

			<div class="titulo-cadastro"> LOGIN </div>

			<div class="cadastro-login">
				<form name="form-login" role="form" action= "" method="POST">
				<h1> JÁ SOU CADASTRADO</h1>
				<br>
				<h2> <?php echo $msg?> </h2>
				<br>
				Informe seu e-mail
				<br>
				<input type="text" name="email" placeholder="...">
				<br>
				Informe sua senha
				<br>
				<input type="password" name="senha" placeholder="...">
				<br>
				<button type="submit" name="enviar-login"> Entrar </button> 
				</form>

				<a style="height:50px" href="https://christopherhauschild.github.io/mobile_website.github.io/cadastroNovo.php"><p>Quero me Cadastrar</p></a>
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
