<?php
	session_start();
	require "../model/PersonagemDAO.php";
	require "../model/Item.php";
	require "../model/Arma.php";
	require "../model/Armadura.php";
	require "../model/Utensilio.php";
	require "../model/Aura.php";

	$idPersonagem = $_SESSION["idPersonagem"];

	$armas = PersonagemDAO::getArmas($idPersonagem);
	$armaduras = PersonagemDAO::getArmaduras($idPersonagem);
	$utensilios = PersonagemDAO::getUtensilios($idPersonagem);
	$auras = PersonagemDAO::getAuras($idPersonagem);

?>

<script>
	$(function(){

		$("#voltar").click(function(){
			$.ajax({
				type: 'POST',
				url: "phpResponses/telaPrincipal.php",
				async: true,
				success: function(response){
					$("#cenarioPrincipal").html(response);
				}
			});
		});

	});
</script>

<div class="armazemScene">
	<div class="titleScene">
		ARMAZÉM
	</div>

	<div class="itensArmazem">
		<div class="armazemSections">
			<div class="sectionArmazem">
				<div class="titleSectionArmazem">
					Armas
				</div>
				<?php
				foreach($armas as $arma){
				?>
					<div class="itemArmazemSection">
						<div class="fotoItem">
							<img src="images/items/arma/<?php echo $arma->arte?>">
						</div>
						<div class="nomeItem">
							<?php echo $arma->nome; ?>
						</div>
					</div>
				<?php
				}
				?>
			</div>

			<div class="sectionArmazem">
				<div class="titleSectionArmazem">
					Armaduras
				</div>
				<?php
				foreach($armaduras as $armadura){
				?>
					<div class="itemArmazemSection">
						<div class="fotoItem">
							<img src="images/items/armadura/<?php echo $armadura->arte?>">
						</div>
						<div class="nomeItem">
							<?php echo $armadura->nome; ?>
						</div>
					</div>
				<?php
				}
				?>
			</div>

			<div class="sectionArmazem">
				<div class="titleSectionArmazem">
					Utensílios
				</div>
				<?php
				foreach($utensilios as $utensilio){
				?>
					<div class="itemArmazemSection">
						<div class="fotoItem">
							<img src="images/items/utensilio/<?php echo $utensilio->arte?>">
						</div>
						<div class="nomeItem">
							<?php echo $utensilio->nome; ?>
						</div>
					</div>
				<?php
				}
				?>
			</div>

			<div class="sectionArmazem">
				<div class="titleSectionArmazem">
					Auras
				</div>
				<?php
				foreach($auras as $aura){
				?>
					<div class="itemArmazemSection">
						<div class="fotoItem">
							<img src="images/items/aura/<?php echo $aura->arte?>">
						</div>
						<div class="nomeItem">
							<?php echo $aura->nome; ?>
						</div>
					</div>
				<?php
				}
				?>
			</div>
		</div>
	</div>

	<div class="btnGo">
				<button id="voltar" class="btnVoltar">VOLTAR</button>
			</div>

</div>