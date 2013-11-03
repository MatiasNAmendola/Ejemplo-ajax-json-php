function env_correo(){
$data = json_decode(stripslashes($_GET["info"])); // recogemos el JSON enviado desde JS y eliminamos los slashes /

//verificamos que las variables sean válidas

if( !empty($data->nombre) // validamos que el nombre no este vacío
and filter_var($data->correo,FILTER_VALIDATE_EMAIL) // validamos que el correo, sea un correo válido
and !empty($data->mensaje) // validamos que el mensaje no este vacío

){
$headers = 'From: '. $data->correo . "\r\n" . // correo que remite
'Reply-To: '. $data->correo . "\r\n" . // correo al que responde el mensaje quien lo reciba
'X-Mailer: PHP/' . phpversion(); // esto es importante para que no nos marquen como spam

$data->mensaje = trim($data->mensaje); // eliminamos los espacios en blanco del mensaje para ahorrar caracteres

$firma = "\r\n\r\n\r\n\r\nSaludos Cordiales,"; // firma del correo

if (

mail("info@gomosoft.com", //correo al que se enviará
"contacto desde la web", $data->msg . $firma, // contenido del correo
$headers // cabeceras del mensaje para que no sea marcado como spam
)

)

echo json_encode(array("resp" => 1)); // regresamos un 1 si tenemos éxito enviando el mensaje

else

echo json_encode(array("resp" => 3)); // regresamos un 3 si el envío falla en el servidor
}

else

echo json_encode(array("resp" => 0)); // enviamos 0 si las variables no pasán los filtros
}

env_correo(); // llamamos a la función que se encarga de el envío del mensaje