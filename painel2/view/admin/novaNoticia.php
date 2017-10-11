<?php
?>

  <div class="right-column">

    <div class="right-column-content">
      
      <div class="right-column-content-heading">
        <h1>Adicionar nova notícia</h1>
      </div>

      <div class="right-column-content-content">
        <form method="post" enctype="multipart/form-data">
          <span>Título</span> <br><input type="text" name="titulo"><br><br>
          <span>Categoria: </span> <br><input type="text" name="categoria"><br><br>
          <span>Data:</span> <br><input type="text" name="data" value="<?php echo $dia.'/'.$mes.'/'.$ano; ?>"><br><br>
          <span>Imagem </span><br><input type="file" name="imagem"><br><br>
          <span>Contéudo</span><br><textarea id="conteudo" name="conteudo" cols="75" rows="20"></textarea><br><br>
          <input type="hidden" name="acao" value="cadastrar">
          <input type="submit" value="Cadastrar Postagem">
        </form>
      </div>

    </div>

  </div>

</div> <!-- fecha a div class page que começa em admin.php -->