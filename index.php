
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<title> Picturae </title>
		<link rel="stylesheet" type="text/css" href="estilo.css">
		<link rel="shortcut icon" type="image/x-icon" href="design/logo.png">
		<!-- Precisa fazer escala correta no mobile -->
		<meta name="viewport" content="widht=device-widht, initial-scale=1.0">

		<style>
			.mySlides {
			display:none;
			margin-top: 13px;
		}
		</style>
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
											<p><a href="produtos.php?cat=Abstrato">ABSTRATO</a></p>
											<p><a href="produtos.php?cat=Natureza">NATUREZA</a></p>
											<p><a href="produtos.php?cat=Urban"> URBAN</a></p>
											<p><a href="produtos.php?cat=Mundo"> MUNDO</a></p>
										</nav>
									</div>
								</div>
								<div class="menuColecoes">
								<input type="checkbox" id="chkMenuColecoes">
								<label class="iconeMenuColecoes"for="chkMenuColecoes"><p>COLEÇÕES</p></label>
									<div class="barraMenuColecoes">
										<nav>
											<p><a href="login.php">CIDADES</a></p>
											<p><a href="carrinho.php">DAY AND NIGHT</a></p>
											<p><a href="produtos.php">#GIRLPOWER</a></p>
											<p><a href="produtos.php"> LIFE A HOLIC</a></p>
											<p><a href="produtos.php"> URBANO</a></p>
										</nav>
									</div>
								</div>
								<div class="menuAcessorios">
								<input type="checkbox" id="chkMenuAcessorios">
								<label class="iconeMenuAcessorios"for="chkMenuAcessorios"><p>ACESSÓRIOS</p></label>
									<div class="barraMenuAcessorios">
										<nav>
											<p><a href="login.php">PULSEIRAS & COLARES</a></p>
											<p><a href="carrinho.php">ALMOFADAS</a></p>
											<p><a href="produtos.php">CAMISETAS</a></p>
										</nav>
									</div>
								</div>
								<p><a href="centraldeAtendimento.php">CONTATE-NOS</a></p>
								<p><a href="index.php"> PÁGINA INICIAL</a></p>
							</nav>
							</div>

						</div>
						<div class="logo"><a href="index.php"><img alt="logo escrito PICTURAE" src="design/logotipo.png"></a></div>
						<div class="favoritos">
						<a href="cadastro.php"><img alt="icone de um usuario" src="design/favoritos.png"></a></div>
						<div class="carrinho">
						<a href="carrinho.php"><img alt="icone de um carrinho"src="design/carrinho.png"></a></div>
					</div>

					<form action="produtos.php" method="GET">
					<div class="cabecalhoL2">
						<input type="text" name="busca" style="font-size: 96%; font-family: Roboto Light; color: black; margin-left: 12px;" placeholder="O que você procura?...">
						<input type="submit" id="btnBuscar">
						<label for="btnBuscar" class="lblBuscar"><img src="design/lupa.png"></label>
					</div>
					</form>
			</div>

			<div class="inicio">
				<a href="index.php"><img alt="ofertas black friday" src="design/inicio.png"></a>
			</div>

			<ul class="slider">
				<li>
					<input type="radio" id="slide1" name="slide" checked>
		           	<label for="slide1"></label>
	           		<img src="design/banner3.png"/>
	     		</li>
	     		<li>
	     			<input type="radio" id="slide2" name="slide" checked>
		           	<label for="slide2"></label>
	          		<img src="design/banner1.png" />
	     		</li>
	     		<li>
	     			<input type="radio" id="slide3" name="slide" checked>
		           	<label for="slide3"></label>
	           		<img src="design/banner2.png" />
	     		</li>
	 		</ul>
			

			<div class="titulo-categoria-destaque">
				<p> Categorias Premium <p>
			</div>

			<div class="categoria-destaque">
				<?php
					include "includes/conexao.php";
					$sql = "SELECT * FROM categoria";

					$resultado = mysqli_query($conexao, $sql);
					while ($dados = $resultado->fetch_array(MYSQLI_ASSOC)) {
						$categ_cod = $dados['id'];
						$categ_descricao = $dados['descricao'];

						echo "
					<div class='categoria-destaque-produto'>
					<div>
						<a href='produtos.php?cat=$categ_descricao'><img src='categorias/$categ_cod.png'></a>
					</div>
					<div>
					<p class='nome-categoria'> $categ_descricao </p>
					</div>
					</div>
						";
					}
				?>
				
			</div>

			<div class="titulo-toparts">
				<p> Top Art's da Semana <p>
			</div>

			<div class="top-arts">
				<?php
					include "includes/conexao.php";
					$sql = ("SELECT p.id, p.descricao, p.categoria, p.artista, p.preco, Count(pi.id_produto) cont
						FROM produto p LEFT JOIN pedido_item pi
						ON p.id = pi.id_produto
						GROUP BY p.id, p.descricao, p.categoria, p.artista, p.preco
						ORDER BY cont DESC, descricao LIMIT 4;");

					$lista = mysqli_query($conexao, $sql);
					while ($dados = mysqli_fetch_array($lista)) {
						$prod_cod = $dados['id'];
						$prod_descricao = strtoupper($dados['descricao']);
						$prod_categoria = $dados['categoria'];
						$prod_artista = $dados['artista'];
						$prod_preco = number_format($dados['preco'], 2, ',','.');

						echo "
					<div class='top-arts-produto'>
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

			<div class="anuncio-home">
				<a href="produtos.php"><img alt="anuncio feira brasileira" src="design/anuncio1.png"></a>
			</div>

			<div class="titulo-artistas-premium">
				Artistas Premium
			</div>

			<div class="artistas-premium">

				<div class="artistas-premium-quadro">
					<div>
						<a href="produtos.php?art=Alexander Vogler"><img src="design/art1.png">
					</div></a>
				</div>
				<div class="artistas-premium-quadro">
					<div>
						<a href="produtos.php?art=Kllun Ab"><img src="design/art2.png">
					</div></a>
				</div>
				<div class="artistas-premium-quadro">
					<div>
						<a href="produtos.php?art=Aguilar Alcenza"><img src="design/art3.png">
					</div></a>
				</div>
				<div class="artistas-premium-quadro">
					<div>
						<a href="produtos.php?art=Kristoff Blei"><img src="design/art4.png">
					</div></a>
				</div>
			</div>

			<div class="titulo-oferta-email">
				Receba Ofertas Exclusivas No Seu Email
			</div>

			<form method="GET">
					<div class="oferta-email">
						<input type="text" name="cadastrar-email-oferta" style="font-size: 96%; font-family: Roboto Bold;  margin-left: 12px;" placeholder="Digite aqui o seu email...">
						<input type="submit" id="btnCadastrar-email-oferta">
						<label for="btnCadastrar-email-oferta" class="lblCadastrar-email-oferta"><img src="design/cadastrar-email-oferta.png"></label>
					</div>
					</form>

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
				<a href="index.php"><img alt="endereço loja" src="design/mapa.png"></a>
				</div>

				<div class="rodape-copyright">
					Copyright by Christopher
				</div>
				
			</div>

		</div>
	</body>
	</html>

