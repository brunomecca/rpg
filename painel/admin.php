<?php
	require "../connect.php";
	header('Content-Type: text/html; charset=utf-8');
	session_start();
	
	if(!isset($_SESSION['nome']) || !isset($_SESSION['senha'])){
		header("Location:index.php");	
	}

	else{
		if(isset($_GET['acao']) && $_GET['acao'] == 'sair'){
			unset($_SESSION['nome']);
			unset($_SESSION['senha']);
			session_destroy();
			header("Location:index.php");
		}
	}
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Mundo Aventurado - Painel</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/CssAdmin/estilo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="opcoes.js"></script>
</head>

<body bgcolor="#CCCCCC">
<?php
	$nomeUser = $_SESSION['nome'];
	$senhaUser = $_SESSION['senha'];
	
	$selUser = mysqli_query($link,"SELECT * FROM usuarios WHERE nome = '$nomeUser' AND senha = '$senhaUser'");
	while($lnLineUser = mysqli_fetch_array($selUser)){
		$nome = $lnLineUser['nome'];
		$senha = $lnLineUser['senha'];
	}
?>

<div id="centro">
	<div id="topo">Bem-vindo, <?php echo '<b>'.ucfirst($nome).'</b>'; ?>
    	<div id="sair">
        	<a href="?acao=sair">Sair</a>
        </div>
    </div>
    
    <div id="conteudo">
    	<div id="esq">
        	<div id="menu">
            	<ul>
                	<li><a href="admin.php?pg=postagem">Adicionar notícia</a></li>
                	<li><a href="admin.php?pg=comentarios">Aceitar Comentários</a></li>
                    <li><a href="admin.php?pg=colocarvideo">Colocar vídeo</a></li>
                    <li><a href="admin.php?pg=list-edit">Editar Postagens</a></li>
                </ul>
            </div>
        </div>
        
        <div id="dir">
        	<?php
				if(isset($_GET['pg']) && $_GET['pg'] == 'postagem'){
					include('pages/postagem.php');
				}elseif(isset($_GET['pg']) && $_GET['pg'] == 'comentarios'){
					include('pages/comentarios.php');
				}elseif(isset($_GET['pg']) && $_GET['pg'] == 'colocarvideo'){
					include('pages/colocarvideo.php');
				}elseif(isset($_GET['pg']) && $_GET['pg'] == 'list-edit'){
					include('pages/list-edit.php');
				}elseif(isset($_GET['pg']) && $_GET['pg'] == 'editar'){
					include('pages/editar.php');
				}
			?>
        </div>
    </div>
</div>
<div id="rodape">Gerenciador de Conteúdo
</div>
</body>
</html>