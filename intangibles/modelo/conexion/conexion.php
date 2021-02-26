<?php
		class Conexion{
			var $ruta;
			var $usuario;
			var $contrasena;
			var $baseDatos;

			function __construct(){
				$this->ruta       ="localhost";
				$this->usuario    ="root"; 
				$this->contrasena ="1842"; 
				$this->baseDatos  ="formulario";
			}

			function conectarse(){
				$base = new PDO("mysql:host=$this->ruta;dbname=$this->baseDatos", $this->usuario, $this->contrasena);
        		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				if(!$base){
				die('Error de Conexión' /*(' . mysqli_connect_errno() . ') '.mysqli_connect_error()'*/);
				}
				return($base);
			}
		
		}
		
