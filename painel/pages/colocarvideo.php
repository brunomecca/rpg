<h2>Video e foto Inicial</h2>
<div id="msgs">
<form method="post" enctype="multipart/form-data">
	<span>Título do vídeo:</span> <br><input type="text" name="titulovideodesc"><br><br>
    <span>Link do vídeo: IFRAME </span> <br><input type="text" name="linkvideo"><br><br>
    <span>Descrição do vídeo</span><br><textarea name="videodesc" cols="65" rows="20"></textarea><br><br>
    <input type="hidden" name="acao" value="cadastrar">
    <input type="submit" value="Cadastrar Postagem">
</form>

<?php
	if(isset($_POST['acao']) && $_POST['acao'] == 'cadastrar'){
		$titulovideodesc = ucfirst(trim($_POST['titulovideodesc']));
		$linkvideo = ucfirst(trim($_POST['linkvideo']));
		$videodesc = trim($_POST['videodesc']);

		
		if(empty($titulovideodesc) || empty($linkvideo)){
			echo '<script>alert("Preencha todos os campos");</script>';
		}else{
				if(!empty($linkvideo)){
					$insereDados3 = mysql_query("INSERT INTO postagens2 (titulovideodesc, videodesc, linkvideo) VALUES ('$titulovideodesc','$videodesc','$linkvideo')");
					
					echo '<script>alert("Enviado com sucesso!");</script>';
							
				}else{
					echo "Nem foi";
				}
		}
	}
?>
</div>