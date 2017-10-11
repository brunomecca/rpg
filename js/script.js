function comentar(php_file, tagID){
  var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');  // XMLHttpRequest object

  // gets data from form fields, using their ID
  var conteudo = document.getElementById("conteudo").value;

  // create pairs index=value with data that must be sent to server
  var  the_data = "conteudo="+conteudo;

  request.open("POST", php_file, true);     // sets the request

  // adds a header to tell the PHP script to recognize the data as is sent via POST
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  request.send(the_data);   // sends the request

  // Check request status
  // If the response is received completely, will be transferred to the HTML tag with tagID

  request.onreadystatechange = function() {
    if (request.readyState == 4) {
      document.getElementById(tagID).innerHTML = document.getElementById(tagID) + request.responseText;
    }
  }
}

function contar(){
  var limite = 300;
  var textarea = document.getElementById("conteudoComentario").value.length;

  var caracteresRestantes = limite - textarea;
  document.getElementById("contador").innerHTML = caracteresRestantes + " caracteres restantes";
}