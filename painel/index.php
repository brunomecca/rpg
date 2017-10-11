<?php
	require "../connect.php";
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mundo Aventurado</title>
<link href="css/stryle.css" rel="stylesheet" type="text/css" />
</head>

<body bgcolor="#CCCCCC">
<div id="boxLogin">
<h2><center>Mundo Aventurado</center></h2>
 <br /><br />
 <form action="" method="post" enctype="multipart/form-data">
<center><span>Nome:</span> <br /><input type="text" name="nome" maxlength="200" /><br /><br />
<span>Senha:</span><br /><input type="password" name="senha" maxlength="200" /><br /><br />
<input type="hidden" name="acao" value="logar" />
<input type="submit" value="Logar" class="btn" /></center>
</form>
<div id="rodape">
<br><br>
</div>
</div>
<?php
	if(isset($_POST['acao']) && $_POST['acao'] == 'logar'){
		$nome = $_POST['nome'];
		$senha = $_POST['senha'];
		if (preg_match('/^[a-zA-Z0-9]+/', $nome)) {
			$selecionaUser = mysqli_query($link,"SELECT * FROM usuarios WHERE nome = '$nome' AND senha = '$senha'");
			$conta = @mysqli_num_rows($selecionaUser);
			
			if($conta <= 0){
				echo '<script>alert("Login errado!");</script>';
			}else{
				while($lnUser = mysqli_fetch_array($selecionaUser)){
					$_SESSION['nome'] = $lnUser['nome'];
					$_SESSION['senha'] = $lnUser['senha'];
					
					echo '<script>location.href="admin.php";</script>';
				}
			}
		}
		else {
		    echo '<script>alert("Caracteres inválidos!");</script>';
		}
	}
?>
</body>
</html>