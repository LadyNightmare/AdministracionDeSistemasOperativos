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

  include("Fechahora.php");
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
	$codModulo=$_POST["modulo"];
	$consulta="SELECT CODIGO, NOMBRE,FECHAINI,FECHAFIN FROM CAMPANIA ".
			"WHERE MODULO=$codModulo ORDER BY FECHAFIN DESC";

  //echo $consulta;
  // ejecutamos la consulta
  if ($resultado = $connector->query($consulta))
  {	  

	  // si el resultado tiene registros...
	 echo "Número de campañas: ".$resultado->num_rows."<br>\n<hr>\n"; 

	 if ($resultado->num_rows > 0)
	  {
	     // ... mostramos cada una de los registros

       // Mostramos la cabecera de la tabla
        echo "<table width=100% align='center' class='campo'>\n";
	echo "<tr>\n";
	echo "\t<td class='leyenda' >Nombre</td>\n";
        echo "\t<td class='leyenda' >Fecha inicio</td>\n";
        echo "\t<td class='leyenda' >Fecha fin</td>\n";
	echo "</tr>\n";

	     while($campania= $resultado->fetch_assoc())
	     {
	       	$codCampania=$campania["CODIGO"];
	        $nomCampania=$campania["NOMBRE"];
	        $finiCampania=fecha($campania["FECHAINI"]);
                $ffinCampania=fecha($campania["FECHAFIN"]);

	        echo "<tr>\n";
	        echo "\t<td class='dato' >$nomCampania</td>\n";
	        echo "\t<td class='dato' >$finiCampania</td>\n";
	        echo "\t<td class='dato' >$ffinCampania</td>\n";
	       echo "</tr>\n";
	     }
       echo "</table>\n";
	  }   
	  else
	  {
	     echo "No hay campañas registradas de este módulo en el sistema<br>\n";     
	  }
	  
	 $resultado->free();
 }	 
 $connector->close();


  
?>	
</body>
</html>
