<div class="right-column">
	<div class="right-column-content">
    	
    	<div class="right-column-content-heading">
    		<h1>Registre-se e faça parte do Mundo Aventurado!</h1>
    		<h2>Comece hoje mesmo a jogar!</h2>
    		<br>
    		<form action="" method="post" enctype="multipart/form-data">
    			Nome:<br>
    			<input type="text"  id="nome" name="nome" required="true">
            	<br><br>
            	Usuário:<br>
            	<input type="text" id="usuario" name="usuario" required="true">
            	<br><br>
            	E-mail:<br>
    			<input type="text" id="email" name="email" required="true">
            	<br><br>
            	Confirmação de e-mail:<br>
            	<input type="text" id="confirmEmail" name="confirmEmail" required="true">
            	<br><br>
            	Senha:<br>
            	<input type="password" id="senha" name="senha" required="true">
            	<br><br>
            	Confirmar senha:<br>
            	<input type="password" id="confirmSenha" name="confirmSenha" required="true">
            	<br><br>
            	<input type="checkbox" name="newsletter" value="sim" checked>Desejo receber brindes, eventos e promoções no e-mail.<br>
            	<input type="checkbox" name="termos" id="termos" onchange="verify()" value="sim">Aceito os <a href="?page=termos"> Termos e Condições</a> do jogo Mundo Aventurado.<br>
            	<br>
            	<input type="hidden" name="acao" value="registro">
            	<input type="submit" value="Cadastrar">

            </form>
    		
    	</div>

    </div>
</div>
<br>


<script>
	function verify(){
		var termos = document.getElementById("termos").checked;
		if(!termos){
			alert("Você deve aceitar os termos!");
		}
	}
</script>