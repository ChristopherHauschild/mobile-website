<?php 
session_start();

include "includes/conexao.php";

//Testa se um produto esta sendo adicionado ou se o usuario esta apenas entrando na página
if(isset($_GET['idProduto'])){
  
  //Cria a sessão com os produtos
  $_SESSION['carrinho'][$_GET['idProduto']] = $_GET['idProduto'];

  //Cria uma string com os ids no formato '1,2,3,4' para usar na consulta SQL
  $idProdutos = implode($_SESSION['carrinho'], ',');
  $sql = 'SELECT * FROM produto WHERE id IN ( '. $idProdutos .' )';

  //Executa a string SQL no banco
  $resultado = mysqli_query($conexao,$sql);

} else {
  //Testa se existem produtos no carrinho, se não tiver produtos na sessão o SQL não é executado
  if(isset($_SESSION['carrinho']) && count($_SESSION['carrinho'])>0){
    $idProdutos = implode($_SESSION['carrinho'], ',');
    $sql = 'SELECT * from produto where id in ( '. $idProdutos .' )';
    $resultado = mysqli_query($conexao,$sql);
  }
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Picturae </title>
	<link rel="stylesheet" type="text/css" href="https://christopherhauschild.github.io/mobile_website.github.io/estilo.css">
	<link rel="shortcut icon" type="image/x-icon" href="https://christopherhauschild.github.io/mobile_website.github.io/design/logo.png">
	<!-- Precisa fazer escala correta no mobile -->
	<meta name="viewport" content="widht=device-widht, initial-scale=1.0">

<style>

table{
	margin-top: 15px;
}

tr{
	margin-top: 5px;
}

td{
	height: 50px;
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

		<div class="fundo-produtos">
			<div class="titulo-carrinho">
			CONTINUAR A COMPRA </div>
           
               <?php 
                  $total = 0;
                  $quantidade = 0;
                  //Testa se existe algum retorno do banco.
                  if(isset($resultado)){

                    //Faz um while para imprimir os dados dos produtos do carrinho
                    while($produto = mysqli_fetch_array($resultado)) {
                    //Variavel para somar o total
                   	$quantidade = $quantidade + 1;
                    $total = $total + $produto['preco'];    
                  ?>
               	<div class="produto-carrinho">
               		<div class="produto-carrinho-esquerda">
						<div class="quadro-imagem-carrinho">
						<img src="produtos/<?php echo $produto['id']; ?>.png">
						</div>
					</div>
					<div class="produto-carrinho-direita">
						<div class="nome-quadro-carrinho">
						<?php echo strtoupper($produto['descricao']); ?> </div>
						<div class="categoria-quadro-carrinho">
						CATEGORIA: <?php echo strtoupper($produto['categoria']); ?> </div>
						<div class="artista-quadro-carrinho">
						DE <?php echo strtoupper($produto['artista']); ?> </div>
						<div class="preço-quadro-carrinho">
						R$ <?php echo number_format($produto['preco'], 2, ',','.'); ?> </div>
						<button name="excluir-carrinho"> EXCLUIR </button>
					</div>
				</div>
               <?php
                    } //FIM While
                  } //FIM IF
                  ?>
                <div class="produto-carrinho-total"><p>
                	QNT. DE PRODUTOS: <?php echo $quantidade; ?> <p style="color:black; margin-left: 6px">|</p> <p style="margin-left: 6px">TOTAL: R$ <?php echo number_format($total, 2, ',', '.'); ?>
                </p></div>
                 <button type="submit" name="finalizar"><a href="finalizar.php">  FINALIZAR  </a></button>
                 <button type="submit" name="comprar-mais"><a href="produtos.php">  ADICIONAR OUTROS PRODUTOS </a></button>      
            <!--Fim gerado com o PHP-->
         </div>

		<div style="margin-top: 138px" class="rodape">
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
