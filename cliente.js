function contacto(){
e.preventDefault();

// recogemos los datos en el objeto info

var info = {

"nombre" : $("input[name='nombre']").val(),
"correo" : $("input[name='correo']").val().replace("@","\@"),
"empresa" : $("input[name='empresa']").val(),
"mensaje" : $("textarea[name='mensaje']").val()

};

json_info = JSON.stringify(info);  // convertimos el objeto a una cadena JSON

// a través de este método le enviamos el JSON json_info al backend
$.getJSON(

"servidor.php", //url
{info : json_info }, //aquí como podemos ver es donde pasamos el json que contiene todas las variables
function(json){

//aquí es donde recibimos la respuesta del servidor, mostraremoos un mensaje dependiendo el resultado de la petición (fallida/exitosa)

if(json.resp == 1) /
alert("Hemos recibido tu mensaje en breve lo responderemos");
else if (json.resp == 0)
alert("Parece que no has llenado bien los campos, Verificalos e intenta nuevamente.");

else if(json.resp == 3)

alert("Nuestro sistema no puede enviar el mensaje en esye momento, por favor intenta luego");

}

);

}

function ini_app(){

//con esto controlamos y modificamos la acción de envío por defecto del formulario

$("form[name='contacto']").submit(function(e){

contacto(e);  // como estamos controlando lo que sucede al enviar el formulario, entonces llamamos a la función contacto que se encarga de recoger y enviar al backend los datos recogidos

});

}

$(document).ready(function(){

ini_app(); //iniciamos nuestra pequeña app

});