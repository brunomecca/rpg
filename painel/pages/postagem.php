<h2>Cadastrar Postagem</h2>

<?php
	$dia = date("d");
	$mes = date("m");
	$ano = date("Y");
	
	date_default_timezone_set('America/Sao_Paulo');
?>
<div id="msgs">
<form method="post" enctype="multipart/form-data">
	<span>Título</span> <br><input type="text" name="titulo"><br><br>
    <span>Categoria: </span> <br><input type="text" name="categoria"><br><br>
	<span>Data:</span> <br><input type="text" name="data" value="<?php echo $dia.'/'.$mes.'/'.$ano; ?>"><br><br>
    <span>Imagem </span><br><input type="file" name="imagem"><br><br>
    <span>Contéudo</span><br><textarea name="conteudo" cols="65" rows="20"></textarea><br><br>
    <input type="hidden" name="acao" value="cadastrar">
    <input type="submit" value="Cadastrar Postagem">
</form>

<?php
	if(isset($_POST['acao']) && $_POST['acao'] == 'cadastrar'){
		$titulo = ucfirst(trim($_POST['titulo']));
		$categoria = ucfirst(trim($_POST['categoria']));
		$data = ucfirst(trim($_POST['data']));
		$conteudo = trim($_POST['conteudo']);
		
		$visitas = 0;
		
		//Upload de Imgs
		$pasta = 'imagens-posts';
		$permite = array('image/jpg','image/jpeg','image/pjpeg');
		
		$imagem = $_FILES['imagem'];
		$destino = $imagem['tmp_name'];
		$nome = substr(str_shuffle("AaBbCcDdEeFfGgHhIiJjKkLlMmNnPpQqRrSsTtUuVvYyXxWwZz23456789"),0,20);
		$tipo = $imagem['type'];
		
		require('funcao.php');

		
		if(empty($titulo) || empty($categoria) || empty($data)){
			echo '<script>alert("Preencha todos os campos");</script>';
		}else{
				if(!empty($nome) && in_array($tipo, $permite)){
					upload($destino, $nome, 400, $pasta);
					$insereDados3 = mysql_query("INSERT INTO postagens (titulo, conteudo, foto, categoria, data, views) VALUES ('$titulo','$conteudo','$nome','$categoria','$data','$visitas')");
					
					echo '<script>alert("Enviado com sucesso!");</script>';
							
				}else{
					echo "Aceitamos apenas imagens no formato JPEG";
				}
		}
	}
?>
</div>