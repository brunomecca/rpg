<div class="right-column">
	<div class="right-column-content">
    	<div class="right-column-content-heading">
    	
    	<?php
        foreach($post as $post){
      ?>
        <div class="right-column-content-heading">
          <h1><a href="?single=<?php echo $post['id'];?>"><?php echo $post['titulo']; ?></a></h1>
          <h2><?php echo $post['categoria'];?></h2>
          <p><?php echo $post['data'];?></p>
        </div>
        <div class="right-column-content-content-single">
          <p><?php echo $post['conteudo'];?></p>
        </div>
      <?php
        }
      ?>


		</div>
	</div>

  <div class="right-column-content">
    <div class="right-column-content-heading">
      <h1>Comentar</h1><br>
      <?php
        if(MySession::naoLogado()){
          echo "<h2>Faça o login ou <a href='?page=registro'>registre-se</a> para comentar</h2>";
        }
        else{
      ?>

        <div class="comentar">
          <div class="comentario_pic">
            <img src="<?php echo $usuario->foto;?>">
            
          </div>
          <div class="comentario_section">
            <h2><?php echo $usuario->nome;?></h2>
            <form action="" method="post" enctype="multipart/form-data">
              <textarea style="resize: none" maxlength="300" oninput="contar()" name="conteudo" id="conteudoComentario" cols="60" rows="3"></textarea>
              <br>
              
              <input type="hidden" name="acao" value="comentar">
              <input type="submit" value="Comentar">
              <div class="contador" id="contador">300 caracteres restantes</div>
            </form>

          </div>
        </div>
      <?php
        }
      ?>

      <br>

  <hr><br>
      <h1> Comentários </h1><br>
      <?php
        foreach($comentarios as $comentario){
      ?>
      <?php
        $usuarioComentario = UserDao::getUser($comentario['usuario']);
      ?>
        <div class="right-column-content-heading" id="comments">
          <div class="comentario_pic">
            <img src="<?php echo $usuarioComentario->foto;?>">
          </div>
          <h2><?php echo $usuarioComentario->nome;?></h2>
          <h5><?php echo $comentario["data"];?><br></h5>
          <?php echo ucfirst($comentario["comentario"]);?>
        </div>
      <?php
        }
      ?>


    </div>
  </div>

</div>
