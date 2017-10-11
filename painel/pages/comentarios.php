<h2>Moderar Comentários</h2>

<?php
		if(isset($_GET['pag'])){
			$pg = (int)$_GET['pag'];
		}else{
			$pg = 1;
		}
	
		$maximo = 10;
		$inicio = ($pg * $maximo) - $maximo;
		
		$selecionaComentarios = mysql_query("SELECT * FROM comentarios WHERE status = 'nao' ORDER BY id DESC LIMIT $inicio, $maximo");
		$conta = @mysql_num_rows($selecionaComentarios);
		
		if($conta != 0){
			while($lnMsg = mysql_fetch_array($selecionaComentarios)){
	?>
    
<div id="msgs">
	<h3><?php echo $lnMsg['nome']; ?></h3>
    <p><?php echo $lnMsg['comentario']; ?></p>
    <a href="?pg=comentarios&action=aceitar&id=<?php echo $lnMsg['id']; ?>" class="lk2">Aceitar Comentário</a>
    <a href="?pg=comentarios&action=excluir&id=<?php echo $lnMsg['id']; ?>" class="lk">Excluir Comentário</a>
</div>

<?php 
}}else{
	echo "<p>Nenhuma mensagem de contato</p>";
}

if(isset($_GET['action']) && $_GET['action'] == 'excluir'){
	$identifica = $_GET['id'];
	$deleta = mysql_query("DELETE FROM comentarios WHERE id = '$identifica'");
	echo '<script>alert("Comentário deletada com sucesso!");</script>';
}

if(isset($_GET['action']) && $_GET['action'] == 'aceitar'){
	$identifica = $_GET['id'];
	$aceitar = mysql_query("UPDATE comentarios SET status = 'sim' WHERE id = '$identifica'");
	echo '<script>alert("Comentário aceito com sucesso!");</script>';
}
?>

<div class="paginacao">
<?php
	$selSql = mysql_query("SELECT id FROM comentarios WHERE status = 'nao'");
	$totalPosts = mysql_num_rows($selSql);
	
	$pags = ceil($totalPosts/$maximo);
	// 8/2 = 4
	$links = 2;
	
	echo "<a href=\"?pg=comentarios&pag=1\">Primeira Página</a>";
	
	for($i = $pg - $links; $i <= $pg - 1; $i++){
		if($i <= 0){}else{
			echo "<a href=\"?pg=comentarios&pag=$i\">$i</a>";
		}
	}
	
	//echo $pg;
	echo "<div id class=\"pgSel\">".$pg."</div>";
	
	for($i = $pg + 1; $i <= $pg + $links; $i++){
		if($i > $pags){}else{
			echo "<a href=\"?pg=comentarios&pag=$i\">$i</a>";
		}
	}
	
	echo "<a href=\"?pg=comentarios&pag=$pags\">Última Página</a>";
?>
</div>