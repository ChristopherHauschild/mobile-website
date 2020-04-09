	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<title> Cadastre-se </title>
		<link rel="stylesheet" type="text/css" href="estilo.css">
		<link rel="shortcut icon" type="image/x-icon" href="design/logo.png">
		<script type="text/javascript" src="mascara.js"></script>
		<script language="JavaScript" type="text/javascript" src="cidades-estados-1.4-utf8.js"></script>
		<!-- Precisa fazer escala correta no mobile -->
		<meta name="viewport" content="widht=device-widht, initial-scale=1.0">
	</head>

	<script language="JavaScript">
	 function mascara(t, mask){
	 var i = t.value.length;
	 var saida = mask.substring(1,0);
	 var texto = mask.substring(i)
	 if (texto.substring(0,1) != saida){
	 t.value += texto.substring(0,1);
	 }
	 }
	 </script>

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

			<div class="cadastro-novo">
				<form action="usuario-cadastra-ok.php" method="POST">
				<h1> QUERO ME CADASTRAR </h1>
				<br>
				<h2> DADOS PESSOAIS </h2>
				<br>
				Informe seu nome
				<br>
				<input type="text" name="nome" placeholder=" . . ." required="true">
				<br>
				Informe seu sobrenome
				<br>
				<input type="text" name="sobrenome" placeholder=" . . ." required="true">
				<br>
				Informe sua data de nascimento
				<br>
				<input type="text" name="nascimento" maxlength="10" onkeypress="mascaraData( this, event )" placeholder=". . / . . / . . . ." required="true"/>
				<br>
				Informe seu telefone celular
				<br>
				<input type="text" name="celular" onkeypress="mascara(this, '## #####-####')" maxlength="13" placeholder="( . . )  . . . . . - . . . ." required="true">
				<br>
				Informe seu CPF
				<br>
				<input type="text" name="cpf" onkeypress="mascara(this, '###.###.###-##')" maxlength="14" placeholder=" . . . " required="true">
				<br><br>
				<h2> ENDEREÇO </h2>
				<br>
				Informe seu Estado
				<br>
				<select id="estado" value="" required="true"></select>
				<br>
				Informe sua cidade
				<br>
		    	<select id="cidade" value="" required="true"></select>
		    	<script language="JavaScript" type="text/javascript" charset="utf-8">
		      	new dgCidadesEstados({
		        cidade: document.getElementById('cidade'),
		        estado: document.getElementById('estado')
		      	})
	    		</script>
	    		<br>
				Informe seu CEP
				<br>
				<input type="text" name="cep" onkeypress="mascara(this, '#####-###')" maxlength="9" placeholder=" . . . . . - . . . ." required="true">
				<br>
				Informe sua rua
				<br>
				<input type="text" name="rua" placeholder=" . . .">
				<br>
				<div class="cadastro-bairro-numero">
				<p>Bairro</p> <input type="text" name="bairro-cadastro" placeholder=" . . .">
				<p style="margin-left: 3%">Nº</p> <input type="text" name="numero-cadastro" placeholder=" . . .">
				</div>
				<br>
				Complemento (apto/bloco)
				<br>
				<input type="text" name="complemento" placeholder=" . . .">
				<br><br>
				<h2> CONTA </h2>
				<br>
				Informe seu email
				<br>
				<input type="text" name="email" placeholder=" . . . " required="true">
				<br>
				Digite sua senha
				<br>
				<input type="password" name="senha" placeholder=" . . . " required="true">
				<br>
				Confirme sua senha
				<br>
				<input type="password" name="confirmar-senha-cadastro" placeholder=" . . . " required="true">
				<br>
				<iframe src="direitos-autorais.html"></iframe>
				<div class="checkbox-direitos-autorais">
				<input type="checkbox" name="direitos-autorais-cadastro" placeholder=" . . . " required="true">
				<p>Li e aceito os termos das condições</p>
				</div>
				<input type="submit" name="enviar-cadastrar" value="Cadastrar">
				</form>
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
				<a href="index.php"><img alt="endereço loja" src="design/mapa.png"></a>
				</div>

				<div class="rodape-copyright">
					Copyright by Christopher
				</div>
				
			</div>

	</div>

	</body>
	</html>