<?php

?>

  <div class="right-column">

    <div class="right-column-content">
      
      <div class="right-column-content-heading">
        <h1>Autorizar comentários</h1>
      </div>
	<div class="comentarios">
    		
    	
	    	<?php
	    	foreach($comentario as $c){
	    	?>
	    	<div class="comentarioTotalUp">
	    		<div class="comentarioTotal">
	    			<?php echo $c["comentario"];?>
	    		</div>
	    		<div class="dataComentario">
	    			<?php echo $c["data"];?>
	    		</div>
	    		<?php
	    			$id = $c["usuario"];
	    			$consulta = mysqli_query($link,"SELECT usuario FROM game_usuarios WHERE id = '$id'");
	    			$usuario = "";
	    			foreach($consulta as $c2){
	    				$usuario = $c2["usuario"];
	    			}
	    		?>
	    		<div class="userComentario">
	    			<?php echo $usuario;?>
	    		</div>

	    		<div class="btnsAcao">
	    			<div class="btnAprovar">
	    				<a href="page.php?aprovar=<?php echo $c['id'];?>">aprovar</a>
		    		</div>
		    		<div class"btnReprovar">
		    			<a href="page.php?reprovar=<?php echo $c['id'];?>">reprovar</a>
	    			</div>
	    		</div>
	    		
	    	<?php
	    	}
	    	?>
	    </div>
	</div>
    </div>

  </div>

</div>