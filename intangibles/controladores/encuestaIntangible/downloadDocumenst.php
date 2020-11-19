<?php
$archivo = trim($_GET['document']);
#Ruta absoluta, no importa qué tipo sea
$rutaArchivo = "../../documentos/".$archivo;

# Obtener nombre sin ruta completa, únicamente para sugerirlo al guardar
$nombreArchivo = basename($rutaArchivo);


header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary");
header("Content-disposition: attachment; filename=$nombreArchivo");
# Leer el archivo y sacarlo al navegador
readfile($rutaArchivo);

?>