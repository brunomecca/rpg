<h2>Editar Postagem</h2>

<?php
	$pegaId = $_GET['id'];
	$selecionaPostsEditar = mysql_query("SELECT * FROM postagens WHERE id = '$pegaId' LIMIT 1");
	$linha = mysql_fetch_array($selecionaPostsEditar);
?>
<div id="msgs">
<form method="post" enctype="multipart/form-data">
	<span>Título:</span> <br><input type="text" name="titulo" value="<?php echo $linha['titulo']; ?>"><br><br>
    <span>Categoria: Games/Curiosidades/Tecnologia/Downloads/Contos/Programas/Tutoriais/Videos</span> <br><input type="text" name="autor" value="<?php echo $linha['autor']; ?>"><br><br>
    <span>Segunda Categoria: Games/Curiosidades/Tecnologia/Downloads/Contos/Programas/Tutoriais/Videos<br>Se não tiver segunda categoria, deixe em branco.<br><strong>NÃO ESQUEÇA DE COLOCAR / ANTES DA SEGUNDA CATEGORIA. EXEMPLO: /GAMES</strong></span> <br><input type="text" name="segundacateg"><br><br>
	<span>Data:</span> <br><input type="text" name="data" value="<?php echo $linha['data']; ?>"><br><br>
    <span>Imagem: </span><br><input type="file" name="imagem"><br><br>
    <span>Contéudo: </span><br><textarea name="conteudo" cols="65" rows="20"><?php echo $linha['conteudo']; ?></textarea><br><br>
    <input type="hidden" name="acao" value="cadastrar">
    <input type="submit" value="Cadastrar Postagem">
</form>

<?php
	if(isset($_POST['acao']) && $_POST['acao'] == 'cadastrar'){
		$titulo = ucfirst(trim($_POST['titulo']));
		$autor = ucfirst(trim($_POST['autor']));
		$segundacateg = ucfirst(trim($_POST['segundacateg']));
		$data = ucfirst(trim($_POST['data']));
		$conteudo = trim($_POST['conteudo']);
		
		//Upload de Imgs
		$pasta = 'imagens-posts';
		$permite = array('image/jpg','image/jpeg','image/pjpeg');
		
		$imagem = $_FILES['imagem'];
		$destino = $imagem['tmp_name'];
		$nome = $imagem['name'];
		$tipo = $imagem['type'];
		
		require('funcao.php');
		
		if(empty($titulo) || empty($autor) || empty($data) || empty($conteudo)){
			echo '<script>alert("Preencha todos os campos");</script>';
		}else{
				if(!empty($nome) && in_array($tipo, $permite)){
					upload($destino, $nome, 200, $pasta);
					
					$insereDados = mysql_query("UPDATE postagens SET titulo = '$titulo', conteudo = '$conteudo', foto = '$nome', autor = '$autor', segundacateg = '$segundacateg', data = '$data' WHERE id = '$pegaId'");
					echo '<script>alert("Editado com sucesso!");</script>';
							
				}elseif(empty($nome)){
					$insereDados = mysql_query("UPDATE postagens SET titulo = '$titulo', conteudo = '$conteudo', autor = '$autor', data = '$data' WHERE id = '$pegaId'");
					echo '<script>alert("Editado com sucesso!");</script>';
				}else{
					echo '<script>alert("Aceitamos apenas imagens JPEG!");</script>';
				}
		}
	}
?>
</div>