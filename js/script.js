function contar(){
  var limite = 300;
  var textarea = document.getElementById("conteudoComentario").value.length;

  var caracteresRestantes = limite - textarea;
  document.getElementById("contador").innerHTML = caracteresRestantes + " caracteres restantes";
}

function login(){
  var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');  // XMLHttpRequest object

  request.open("POST", "phpResponses/ae.php", true);
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  request.send(); 

  request.onreadystatechange = function() {
    if (request.readyState == 4) {
      document.getElementById("parteDoLogin").innerHTML = request.responseText;
    }
  }
}

function verify(){
  var termos = document.getElementById("termos").checked;
  if(!termos){
    alert("Você deve aceitar os termos!");
  }
}

function logout(){
  var divLogin = '<ul><li><h1>Entrar</h1></li><li><p>Não perca tempo! <a href="?page=registro">Registre-se.</a></p></li><form action="" method="post" enctype="multipart/form-data"><li class="username"><input name="usuario" type="text" class="login-input" placeholder="Usuário" id="usuario"/></li><li class="password"><input name="senha" type="password" class="login-input" placeholder="Senha" id="senha"/></li><input type="hidden" name="acao" value="logar"><input type="submit" value="Entrar"></form></ul>';

  document.getElementById("parteDoLogin").innerHTML = divLogin;
}