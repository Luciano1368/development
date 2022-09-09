SE CREA LA BASE DE DATOS DENTRO DE MYSQL
SE CAMBIA EL NOMBRE DE LA BD DENTRO DEL ARCHIVO dist/conect/dbConnect.php 

$servername = "SERVIDOR_NOMBRE";
$database = "NOMBRE_BD";
$username = "USUARIO";
$password = "CONTRASEÑA";


LUEGO DE CAMBIAR EL NOMBRE Y COLOCAR LAS CREDENCIALES DE SU BD MYSQL SE PROCEDE A INGRESAR A:

http://localhost/PhpNativo/

EL ORDEN DE LAS CARPETAS ES:

PhpNativo
	app
		controller //Parte del procesamiento de php
		paginas 	//Parte visible por el usuario
	assets
		build 		//librerias para formar la vista
		img
	dist
		conect 		//conexiones a bd, URL, etc
		includes 
		js 			//Javascript del proyecto