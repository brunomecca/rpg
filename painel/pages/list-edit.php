<h2>Lista de Postagens para Editar</h2>

<?php
		if(isset($_GET['pag'])){
			$pg = (int)$_GET['pag'];
		}else{
			$pg = 1;
		}
	
		$maximo = 6;
		$inicio = ($pg * $maximo) - $maximo;
		
		$selecionaPosts = mysql_query("SELECT * FROM postagens ORDER BY id DESC LIMIT $inicio, $maximo");
		$conta = @mysql_num_rows($selecionaPosts);
		
		if($conta != 0){
			while($lnMsg = mysql_fetch_array($selecionaPosts)){
	?>
    
<div id="msgs">
	<h3><?php echo $lnMsg['titulo']; ?></h3>
    <a href="admin.php?pg=editar&id=<?php echo $lnMsg['id']; ?>" class="lk">Editar Postagem</a>
</div>

<?php 
}}else{
	echo "<p>Nenhuma mensagem de contato</p>";
}

if(isset($_GET['action']) && $_GET['action'] == 'excluir'){
	$identifica = $_GET['id'];
	$deleta = mysql_query("DELETE FROM contato WHERE id = '$identifica'");
	echo '<script>alert("Mensagem deletada com sucesso!");</script>';
}
?>

<div class="paginacao">
<?php
	$selSql = mysql_query("SELECT id FROM postagens");
	$totalPosts = mysql_num_rows($selSql);
	
	$pags = ceil($totalPosts/$maximo);
	// 8/2 = 4
	$links = 2;
	
	echo "<a href=\"?pg=list-edit&pag=1\">Primeira Página</a>";
	
	for($i = $pg - $links; $i <= $pg - 1; $i++){
		if($i <= 0){}else{
			echo "<a href=\"?pg=list-edit&pag=$i\">$i</a>";
		}
	}
	
	//echo $pg;
	echo "<div id class=\"pgSel\">".$pg."</div>";
	
	for($i = $pg + 1; $i <= $pg + $links; $i++){
		if($i > $pags){}else{
			echo "<a href=\"?pg=list-edit&pag=$i\">$i</a>";
		}
	}
	
	echo "<a href=\"?pg=list-edit&pag=$pags\">Última Página</a>";
?>
</div>