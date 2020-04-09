	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<title> Produtos </title>
		<link rel="stylesheet" type="text/css" href="https://christopherhauschild.github.io/mobile_website.github.io/estilo.css">
		<link rel="shortcut icon" type="image/x-icon" href="https://christopherhauschild.github.io/mobile_website.github.io/design/logo.png">
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
						<div class="logo"><a href="index.php"><img alt="logo escrito PICTURAE" src="design/logotipo.png"></a></div>
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

			<div class="titulo-produtos">
				PRODUTOS
			</div>

			<div class="fundo-produtos">
			<?php
					
					include "includes/conexao.php";

					$busca = "";

					$sql = "";

					$cat = "";

					$art = "";

					if(ISSET($_GET['cat'])){
						$cat = $_GET['cat'];
						$sql = "SELECT * FROM produto where categoria = '$cat'";
					} else {

					$sql = "SELECT * FROM produto where 1=1";

					}

					if(ISSET($_GET['art'])){
						$art = $_GET['art'];
						$sql = "SELECT * FROM produto where artista = '$art'";
					}
					
					if(ISSET($_GET['busca'])){
						$busca = $_GET['busca'];
						$sql= $sql." and descricao like '%$busca%'";
					}


					$resultado = mysqli_query($conexao, $sql);
					while ($dados = $resultado->fetch_array(MYSQLI_ASSOC)) {
						$prod_cod = $dados['id'];
						$prod_descricao = strtoupper($dados['descricao']);
						$prod_categoria = $dados['categoria'];
						$prod_artista = $dados['artista'];
						$prod_preco = number_format($dados['preco'], 2, ',','.');

						echo "
					<div class='produtos'>
					<div>
						<a href='quadro.php?qdr=$prod_cod'><img src='produtos/$prod_cod.png'></a>
					</div>
					<div>
					<p class='nome-produto'> $prod_descricao </p>
					<p class='categoria-produto'> $prod_categoria </p>
					<p class='artista-produto'> de $prod_artista </p>
					<p class='preço-produto'> R$ $prod_preco </p>
					</div>
					</div>
						";
					}
				?>
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
