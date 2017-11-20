<?php
	session_start();
	$id = $_SESSION["idPersonagem"];

	require "../../connect.php";
	require "../model/ItemDAO.php";

	$nivel = "";
	$clase = "";
	$xp = "";
	$xpProximoNv = "";

	//itens equipados
	$primeiraMao = "";
	$segundaMao = "";
	$armadura = "";
	$utensilio = "";
	$aura = "";
	$pntsDisponiveis = "";
	//personagem
	$forca = 0;
	$iniciativa = 0;
	$vigor = 0;
	$vitalidade = 0;
	$ataque = 0;
	$defesa = 0;

	$cons = mysqli_query($link,"SELECT * FROM game_personagem WHERE id = '$id'");
	foreach($cons as $c){
		$classe = $c["classe"];
		$nivel = $c["nivel"];
		$xp = $c["xp"];
		$xpProximoNv = $c["xpProximoNv"];
		$primeiraMao = $c["primeiraMao"];
		$segundaMao = $c["segundaMao"];
		$armadura = $c["armadura"];
		$utensilio = $c["utensilio"];
		$aura = $c["aura"];
		$pntsDisponiveis = $c["pntsDisponiveis"];
		$tabelaAtributo = $c["tabelaAtributo"];
		$tabelaElemento = $c["tabelaElemento"];
		$ataque = $c["ataque"];
		$defesa = $c["defesa"];
		$consultaTabelaAtributo = mysqli_query($link,"SELECT * FROM game_tabelaatributo WHERE id = '$tabelaAtributo'");
		foreach($consultaTabelaAtributo as $c2){
			$forca = $c2["forca"];
			$iniciativa = $c2["iniciativa"];
			$vigor = $c2["vigor"];
			$vitalidade = $c2["vitalidade"];
		}
		$consultaTabelaElemento = mysqli_query($link,"SELECT * FROM game_tabelaelemento WHERE id = '$tabelaElemento'");
		foreach($consultaTabelaElemento as $c3){
			$elementos = [
				"agua" => $c3["agua"],
				"terra" => $c3["terra"],
				"luz" => $c3["luz"],
				"natureza" => $c3["natureza"],
				"fogo" => $c3["fogo"],
				"raio" => $c3["raio"],
				"trevas" => $c3["trevas"],
				"veneno" => $c3["veneno"],
				"neutro" => $c3["neutro"],
			];
		}
	}

	$atributos = [
		"forca" => $forca,
		"iniciativa" => $iniciativa,
		"vigor" => $vigor,
		"vitalidade" => $vitalidade,
		"ataque" => $ataque,
		"defesa" => $defesa,
	];
		
	$primeiraMao = ItemDAO::getItem($primeiraMao);
	$segundaMao = ItemDAO::getItem($segundaMao);
	$armadura = ItemDAO::getItem($armadura);
	$utensilio = ItemDAO::getItem($utensilio);
	$aura = ItemDAO::getItem($aura);

	if($classe == 1){
		$classe = '<img src="images/classes/superhero.png">';
	}
	else if($classe == 2){
		$classe = '<img src="images/classes/thief.png">';
	}

	function getTabelaItem($itemNumber, $item){
		if(get_class($item) == "Item"){
			return " ";
		}
		if($itemNumber == 1){

			//primeiraMao
			$retorno = "<div class='tabelaAttArma'>
				<table class='santuarioTable'><tr><td>Ataque</td><td>+". $item->ataque ."</td></tr>
				<tr><td>Elemento</td><td>".getElemento($item->elemento)."</td></tr>
				<tr><td>Poder <br>do elemento</td><td>+".$item->attElemento."</td></tr>
				</table>
			</div>";
			return retirarQuebraDeLinhas($retorno);
		}
		else if($itemNumber == 2){
			//segundaMao
			$retorno = "<div class='tabelaAttArma'>
				<table class='santuarioTable'><tr><td>Ataque</td><td>+". $item->ataque ."</td></tr>
				<tr><td>Elemento</td><td>".getElemento($item->elemento)."</td></tr>
				<tr><td>Poder <br>do elemento</td><td>+".$item->attElemento."</td></tr>
				</table>
			</div>";
			return retirarQuebraDeLinhas($retorno);
		}
		else if($itemNumber == 3){
			//armadura
			$retorno = "<div class='tabelaAttArma'>
				<table class='santuarioTable'><tr><td>Defesa</td><td>+". $item->defesa ."</td></tr>
				<tr><td>Elemento</td><td>". getElemento($item->elemento)."</td></tr>
				<tr><td>Poder <br>do elemento</td><td>+".$item->attElemento."</td></tr>
				</table>
			</div>";
			return retirarQuebraDeLinhas($retorno);
		}
		else if($itemNumber == 4){
			//utensilio
			$retorno = "<div class='tabelaAttArma'>
				<table class='santuarioTable'><tr><td>Aura</td><td>". ItemDAO::getAuraName($item->aura) ."</td></tr>
				<tr><td>Elemento</td><td>". getElemento($item->elemento)."</td></tr>
				<tr><td>Poder <br>do elemento</td><td>+".$item->attElemento."</td></tr>
				</table>
			</div>";
			return retirarQuebraDeLinhas($retorno);
		}
	}

	function getTableAura($aura, $atributos){
		if(get_class($aura) == "Item"){
			return " ";
		}
		$retorno = "<div class='tabelaAttArma'>
			<table class='santuarioTable'><tr><td>Inspirador</td><td>". ucfirst($aura->inspirador) ."</td></tr>";
		
		$number = $atributos[$aura->inspirador];
		if($aura->attInspirador < 0){
			$number = ($number * $aura->attInspirador)- $number;
		}
		else{
			$number = $aura->attInspirador;
		}
		$retorno = $retorno . "<tr><td>Poder <br>do inspirador</td><td>+". intval($number)."</td></tr>
			<tr><td>Elemento</td><td>". getElemento($aura->elemento) ."</td></tr>
			<tr><td>Poder <br>do elemento</td><td>+". $aura->attElemento ."</td></tr>
			</table>
		</div>";
		return retirarQuebraDeLinhas($retorno);
		
	}

	function retirarQuebraDeLinhas($info){
		$a = trim(preg_replace('/\s+/', ' ', $info));
		return $a;
	}
	
	function getTabelaAtributo($atributos, $pnts){
		$up = "";
		if($pnts > 0){
			$up = "<img src='images/up.png'>";
		}

		$retorno = "<table class='santuarioTable'><tr><td>Força</td><td><div id='forca'>". $atributos["forca"] ."</div><div class='upSantuario' id='upForca'>". $up ."</div></td></tr>
				<tr><td>Iniciativa</td><td><div id='iniciativa'>". $atributos["iniciativa"]."</div><div class='upSantuario' id='upIniciativa'>". $up ."</div></td></tr>
				<tr><td>Vigor</td><td><div id='vigor'>". $atributos["vigor"]."</div><div class='upSantuario' id='upVigor'>". $up ."</div></td></tr>
				<tr><td>Vitalidade</td><td><div id='vitalidade'>". $atributos["vitalidade"]."</div><div class='upSantuario' id='upVitalidade'>". $up ."</div></td></tr>
				</table>";
		return retirarQuebraDeLinhas($retorno);
	}

	$tabelaElementos = "<table class='santuarioTable'><tr><td>Água</td><td>". $elementos["agua"] ."</td></tr>
						<tr><td>Terra</td><td>". $elementos["terra"] ."</td></tr>
						<tr><td>Luz</td><td>". $elementos["luz"] ."</td></tr>
						<tr><td>Natureza</td><td>". $elementos["natureza"] ."</td></tr>
						<tr><td>Fogo</td><td>". $elementos["fogo"] ."</td></tr>
						<tr><td>Raio</td><td>". $elementos["raio"] ."</td></tr>
						<tr><td>Trevas</td><td>". $elementos["trevas"] ."</td></tr>
						<tr><td>Veneno</td><td>". $elementos["veneno"] ."</td></tr>
						<tr><td>Neutro</td><td>". $elementos["neutro"] ."</td></tr>
				</table>"; 
	$tabelaElementos = retirarQuebraDeLinhas($tabelaElementos);
?>

<script>
	$(function(){



		$("#tabelaEsquerda").html("<?php echo getTabelaAtributo($atributos,$pntsDisponiveis);?>");

		var namesAtts = ["#upForca","#upIniciativa","#upVigor", "#upVitalidade"];

		$("#upForca").click(function(){
			$.post("phpResponses/up.php", {campo: "1"})
			.done(function(data){
				$("#pnts").html(data);
				var text = parseInt($("#forca").text());
				$("#forca").html(text+1);

				var pntsDisponiveis = parseInt($("#pnts").text().substring(20));
				if(pntsDisponiveis == 0){
					$("#upForca").html("");
					$("#upIniciativa").html("");
					$("#upVigor").html("");
					$("#upVitalidade").html("");
				}
				
			});
		});

		$("#upIniciativa").click(function(){
			$.post("phpResponses/up.php", {campo: "2"})
			.done(function(data){
				$("#pnts").html(data);
				var text = parseInt($("#iniciativa").text());
				$("#iniciativa").html(text+1);

				var pntsDisponiveis = parseInt($("#pnts").text().substring(20));
				if(pntsDisponiveis == 0){
					$("#upForca").html("");
					$("#upIniciativa").html("");
					$("#upVigor").html("");
					$("#upVitalidade").html("");
				}
				
			});
		});

		$("#upVigor").click(function(){
			$.post("phpResponses/up.php", {campo: "3"})
			.done(function(data){
				$("#pnts").html(data);
				var text = parseInt($("#vigor").text());
				$("#vigor").html(text+1);

				var pntsDisponiveis = parseInt($("#pnts").text().substring(20));
				if(pntsDisponiveis == 0){
					$("#upForca").html("");
					$("#upIniciativa").html("");
					$("#upVigor").html("");
					$("#upVitalidade").html("");
				}
				
			});
		});

		$("#upVitalidade").click(function(){
			$.post("phpResponses/up.php", {campo: "4"})
			.done(function(data){
				$("#pnts").html(data);
				var text = parseInt($("#vitalidade").text());
				$("#vitalidade").html(text+1);

				var pntsDisponiveis = parseInt($("#pnts").text().substring(20));
				if(pntsDisponiveis == 0){
					$("#upForca").html("");
					$("#upIniciativa").html("");
					$("#upVigor").html("");
					$("#upVitalidade").html("");
				}
				
			});
		});
		
	

		$("#primeiraMaoSection").css("cursor","pointer");
		$("#primeiraMaoSection").click(function(){
			<?php 
				$item = getTabelaItem(1,$primeiraMao);
			?>
			$("#tabelaDireita").html("<?php echo $item;?>");
		});

		$("#segundaMaoSection").css("cursor","pointer");
		$("#segundaMaoSection").click(function(){
			<?php 
				$item = getTabelaItem(2,$segundaMao);
			?>
			$("#tabelaDireita").html("<?php echo $item;?>");
		});

		$("#armaduraSection").css("cursor","pointer");
		$("#armaduraSection").click(function(){
			<?php 
				$item = getTabelaItem(3,$armadura);
			?>
			$("#tabelaDireita").html("<?php echo $item;?>");
		});

		$("#utensilioSection").css("cursor","pointer");
		$("#utensilioSection").click(function(){
			<?php 
				$item = getTabelaItem(4,$utensilio);
			?>
			$("#tabelaDireita").html("<?php echo $item;?>");
		});

		$("#auraSection").css("cursor","pointer");
		$("#auraSection").click(function(){
			<?php 
				$item = getTableAura($aura,$atributos);
			?>
			$("#tabelaDireita").html("<?php echo $item;?>");
		});

		//botao voltar
		$("#voltar").click(function(){
			$.ajax({
				type: 'POST',
				url: "phpResponses/telaPrincipal.php",
				async: true,
				success: function(response){
					$("#primeiraMaoSection").css("cursor","auto");
					$("#segundaMaoSection").css("cursor","auto");
					$("#armaduraSection").css("cursor","auto");
					$("#utensilioSection").css("cursor","auto");
					$("#auraSection").css("cursor","auto");
					$("#cenarioPrincipal").html(response);
				}
			});
		});

		$("#setaVerElement").click(function(){
			$("#tabelaEsquerda").html("<?php echo $tabelaElementos;?>");
		});

		$("#setaVerAtt").click(function(){
			$("#tabelaEsquerda").html("<?php echo getTabelaAtributo($atributos,$pntsDisponiveis);?>");
		});
	});
</script>

<div class="santuarioScene">
	<div class="santuarioThings">
		
		<div class="infoCharSantuario">

			<div class="setaVerAtt" id="setaVerAtt">
				<img src="images/setaEsquerda.png">
			</div>

			<div class="imgCharSantuario">
				<?php echo $classe;?>
			</div>

			<div class="setaVerElement" id="setaVerElement">
				<img src="images/setaDireita.png">
			</div>
		</div>
		<br>
		<div class="barraENivel">
			Xp: <?php echo $xp . "/" . $xpProximoNv;
				$widthXp =  round(200 * intval($xp) / intval($xpProximoNv));
			?>
			<div class="barraSantuarioXp">
				<?php echo "<div style='background-color: #6E6E6E; width:".$widthXp."px; height:15px; float:left;'></div>";?>
			</div>
			<br>
			Nível: <?php echo $nivel;?><br>
			<div id="pnts">Pontos disponíveis: <?php echo $pntsDisponiveis;?></div>
		</div>
		<br>
		<div class="tabelasComAsInfoSantuario">
			<div class="tabelaEsquerda" id="tabelaEsquerda">
				
			</div>
			<div class="tabelaDireita" id="tabelaDireita">
				
			</div>
		</div>
		
	</div>

	<div style="margin-top:220px; color:white">
		<h5>No santuário você pode clicar no item equipado para ver informações.</h5>
	</div>
	<div class="btnGo">
		<button id="voltar" class="btnVoltar">VOLTAR</button>
	</div>
</div>

<?php
	function getElemento($id){
		if($id == 0)
			return "Neutro";
		if($id == 1)
			return "Água";
		if($id == 2)
			return "Fogo";
		if($id == 3)
			return "Terra";
		if($id == 4)
			return "Raio";
		if($id == 5)
			return "Luz";
		if($id == 6)
			return "Trevas";
		if($id == 7)
			return "Natureza";
		if($id == 8)
			return "Veneno";

	}

?>