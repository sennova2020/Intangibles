<?php
		class Conexion{
			var $ruta;
			var $usuario;
			var $contrasena;
			var $baseDatos;

			function __construct(){
				$this->ruta       ="localhost";
				$this->usuario    ="root"; 
				$this->contrasena ="*s3nn0v4Wz"; 
				$this->baseDatos  ="sennova_formulario";
			}

			function conectarse(){
				@$enlace = mysqli_connect($this->ruta, $this->usuario, $this->contrasena, $this->baseDatos);
				mysqli_set_charset($enlace, "utf8");
				if(!$enlace){
				die('Error de Conexión' /*(' . mysqli_connect_errno() . ') '.mysqli_connect_error()'*/);
				}
				return($enlace);}
			}
