<?php 

require_once ('controllers/sessions/security/validaCookie.php');
require_once ('controllers/sessions/security/myCript.php');

//invocacion de funcion de gestion de cookies
validaciones();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BIENVENIDO</title>
    <!-- url de la ubicaion del icono -->
    <link rel="Shortcut Icon" type="image/x-icon" href="images/logo.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Login/vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="Login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Login/css/util.css">
    <link rel="stylesheet" type="text/css" href="Login/css/main.css">
    <link rel="stylesheet" href="css/scroll.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.15.0/css/mdb.min.css" rel="stylesheet">
<!--===============================================================================================-->
</head>
<body>
    <!-- Default form login -->
    <div style="width: 100%; height: 50px; background-color: #ff6b00;"></div>
    <div class="container" style="margin-bottom: 20px;">
        <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <!-- url de la ubicaion del logo -->
                    <img class="img-repon" src="images/logo.png" alt="IMG" style="margin-top: 65px;"><br>
                    <b><p style="text-align: center; font-size: 25px; margin-top: -20px; color: #000;">RAS</p></b>
                    <!-- ================================================================== -->
                </div>

               <form class="login100-form validate-form" id="form" method="POST" action="controllers/sessions/login.php">
                        <span class="login100-form-title" style="font-size: 30px; ">
                           BIENVENIDO
                        </span>

                        <div class="wrap-input100 validate-input" data-validate="Usuario no Valido">
                            <input class="input100" type="text" name="email" placeholder="Usuario" id="email">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "Contraseña Requerida">
                            <input class="input100" type="password" name="pass" placeholder="Contraseña" id="pass">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>
                         <div class="custom-control custom-checkbox m-b-10 m-t-5" style="margin-left: 10px;">
                            <input type="checkbox" name="remember" class="custom-control-input" id="defaultUnchecked">
                            <label class="custom-control-label" for="defaultUnchecked">Recuerdame</label>
                        </div>
                        
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn">
                                INICIAR SESION
                            </button>
                        </div>

                        <div class="text-center p-t-30">
                            <span class="txt1">
                                Olvido
                            </span>
                            <a class="txt2" href="vista/forgetPass.php">
                                Usuario / Contraseña?
                            </a>
                        </div>

                        <div class="text-center p-t-120">
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- Footer -->
<!-- Footer -->
<footer class="page-footer font-small pt-4" style="background-color: #DC5C00; color: #fff;">
  <div class="container text-center text-md-left" >
    <div class="row">
      <div class="col-md-4 mx-auto" style="padding-top: 20px; text-align: center; color: #fff;">
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4"><img style="width: 60px;" src="images/senaB.png" alt=""></h5>
        <p style="color: #fff;">Servicio Nacional de Aprendizaje</p>
        <p style="color: #fff;">CENTRO DE DESARROLLO AGROINDUSTRIAL Y EMPRESARIAL</p>
      </div>
      <div class="col-md-3 mx-auto" style="padding-top: 20px; text-align: left;">
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4" style="font-size: 16px; font-weight: bold;">Información</h5>
        <ul class="list-unstyled" style="padding-top: 10px;">
          <li>
            <a href="#!">Derechos Reservados</a></p>
          </li>
          <li>
            <a href="#!">Manual de usuario</a></p>
          </li>
          <li>
            <a href="#!">FAQ</a></p>
          </li>
        </ul>
      </div>

      <div class="col-md-5 mx-auto" style="padding-top: 20px; text-align: left;">
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4" style="font-size: 16px; font-weight: bold;">Contactanos</h5>

        <ul class="list-unstyled" style="padding-top: 10px;">
          <li>
            <i class="fas fa-home mr-3" style="padding-right: 10px;"></i>Calle 2 No. 13 – 03 Barrio San Rafael Villeta</p>
          </li>
          <li>
            <i class="fas fa-envelope mr-3" style="padding-right: 10px;"></i>Atención telefónica: lunes a viernes 8:00 a.m. a 6:00 p.m</p>
          </li>
          <li>
            <i class="fas fa-phone mr-3" style="padding-right: 10px;"></i>Bogotá (57 1) 5925555 - Línea gratuita y resto del país 018000 910270</p>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="container-fluid" style="background-color: #BB4E00;">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12" style="text-align: center; padding-top: 15px;">
        <p class="copyright-text text-white">Copyright &copy; 2020
        </p>
      </div>
    </div>
  </div>

</footer>
<!-- Footer -->
<!-- Footer -->

    <!--===============================================================================================-->  
    <script src="Login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="Login/vendor/bootstrap/js/popper.js"></script>
    <script src="Login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="Login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="Login/vendor/tilt/tilt.jquery.min.js"></script>
    <!--===============================================================================================-->
    <script src="js/mains.js"></script>
    <!--===============================================================================================-->
    <script src="js/title.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.15.0/js/mdb.min.js"></script>
    <?php 
         // validar "recuerdame" para rellenar campos  
      if (isset($_COOKIE['remember'])  ) {

          $email=desencriptar($_COOKIE['dls']);
          $pass=desencriptar($_COOKIE['qwer']);
            echo "<script>
                 document.getElementById('email').value='$email';
                 document.getElementById('pass').value='$pass';
                 document.getElementById('defaultUnchecked').checked=true;            
                </script>";            
        }
    ?>
</body>
</html>