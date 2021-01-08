<?php
session_start();
function liderRol($number){
    $salir = null;
    for($i = 0;$i<$number; $i++){
        $salir.="../";
    }
    if($_SESSION["rol"]!=2){
        echo '<script>location.href="'.$salir.'index.php"</script>';
    }
}
?>
