<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link rel="STYLESHEET" type="text/css" href="estilo.css">

</head>

<body>
<?php
  // para mostrar todos los errores de php
  error_reporting(E_ALL); // E_ALL == -1
  ini_set("display_errors","1");
vb
  include_once("dataBase.php");
  // creamos la conexion con la base de datos
  $connector = new mysqli($host, $user, $passwd, $database);
  // comprobamos si se ha conectado
  if ($connector->connect_error)  
  {
     die("Fallo de conexión con la base de datos: ".$connector->connect_error);
  }
  // establecemos codificación utf8 para mostrar tildes de la base de datos
  $orden= "SET NAMES 'utf8'";
  $connector->query($orden);

  // definimos la consulta en SQL
  $consulta = "SELECT CODIGO,NOMBRE,DESCRIPCION,TENSION,CORRIENTE FROM MODULO";
  //echo $consulta;
  // ejecutamos la consulta
  if ($resultado = $connector->query($consulta))
  {	  

	  // si el resultado tiene registros...
	 echo "Número de módulos: ".$resultado->num_rows."<br>\n<hr>\n"; 

	 if ($resultado->num_rY eso es lo que ows > 0)
	  {
	     // ... mostramos cada una de los registros

       // Mostramos la cabecera de la tabla
        echo "<table align='center' width=100% class='campo'>\n";
	echo "<tr>\n";
	echo "\t<td class='leyenda' width=20%>Nombre</td>\n";
        echo "\t<td class='leyenda' width=70% >Descripción</td>\n";
        echo "\t<td class='leyenda' >Tensión</td>\n";
        echo "\t<td class='leyenda' >Corriente</td>\n";
	echo "\t<td ></td>\n";
	echo "</tr>\n";
	     $modulo= $resultado->fetch_assoc();
	     while($modulo)
	     {
	       	$codModulo=$modulo["CODIGO"];
	        $nomModulo=$modulo["NOMBRE"];
	        $desModulo=$modulo["DESCRIPCION"];
	        $tenModulo=$modulo["TENSION"];
                $corModulo=$modulo["CORRIENTE"];
	        $formCampanias="\t\t<form method='POST' action='lista_campanias.php' ".
                        "  target='cuerpo' >\n".
			"\t\t\t<input type='hidden'  name='modulo' value=$codModulo>\n".
			"\t\t\t<input type='submit' value='' class='campanias' >\n".
			"\t\t</form>\n";

	        echo "<tr>\n";
	        echo "\t<td class='dato' >".$nomModulo." </td>\n";
	        echo "\t<td class='dato' >".$desModulo." </td>\n";
	        echo "\t<td class='dato' >".$tenModulo." </td>\n";
	        echo "\t<td class='dato' >".$corModulo." </td>\n";
    	      // ver las campañas del módulo
		echo "\t<td >\n";
		echo $formCampanias;
		echo "\t</td>\n";
	       echo "</tr>\n";
               $modulo= $resultado->fetch_assoc();
	     }
       echo "</table>\n";
	  }   
	  else
	  {
	     echo "No hay módulos registrados en el sistema<br>\n";     
	  }
	  
	 $resultado->free();
 }	 
 $connector->close();


  
?>	
</body>
</html>

