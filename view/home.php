<div class="right-column">
      
      <?php
        foreach($posts as $post){
      ?>
      <div class="right-column-content">
        <div class="right-column-content-heading">
          <h1><a href="?single=<?php echo $post['id'];?>"><?php echo $post['titulo']; ?></a></h1>
          <h2><?php echo $post['categoria'];?></h2>
          <p><?php echo $post['data'];?></p>
        </div>
        <div class="right-column-content-img-left"> <img src="painel2/imagens-posts/<?php echo $post['foto'];?>" alt="banner" /> </div>
        <div class="right-column-content-content">
          <p><?php echo substr($post['conteudo'], 0, 500);?></p>
          <div class="button"><a href="?single=<?php echo $post['id'];?>" >LER MAIS</a></div>
        </div>
      </div>
      <?php
        }

        //paginacao
        $numberPosts = PostDAO::numberPosts();
        $numberPostsMaxPage = PostDAO::$maximoPosts;
        $pg = PostDAO::numberPage();
        $pags = ceil($numberPosts/$numberPostsMaxPage);
        $links = 2;

        echo "<a href=\"?pag=1\"><div class='paginacao'>Primeira Página </a>";
  
        for($i = $pg - $links; $i <= $pg - 1; $i++){
          if($i <= 0){}
            else{
            echo "<a href=\"?pag=$i\"> $i </a>";
          }
        }
        
        //echo $pg;
        echo "".$pg."";
        
        for($i = $pg + 1; $i <= $pg + $links; $i++){
          if($i > $pags){}
            else{
            echo "<a href=\"?pag=$i\"> $i </a>";
          }
        }
  
        echo "<a href=\"?pag=$pags\"> Última Página</a></div>";
      ?>

      

    </div>

