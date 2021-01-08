<?php
session_start();
function adminRol($number){
    $salir = null;
    for($i = 0;$i<$number; $i++){
        $salir.="../";
    }
    if($_SESSION["rol"]!=1){
        echo '<script>location.href="'.$salir.'index.php"</script>';
    }
}
?>
