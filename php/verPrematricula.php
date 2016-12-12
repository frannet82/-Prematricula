<?php

    // include db connect class
    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
 
    // mysql inserting a new row
    $result = @mysql_query("SELECT ESTUDIANTE.nombre,ESTUDIANTE.carnet, CURSO.nombre as Curso FROM CURSO,PREMATRICULA,ESTUDIANTE WHERE ESTUDIANTE.carnet = PREMATRICULA.carnet AND CURSO.codigo = PREMATRICULA.codigo");
	echo "<table>";  
	echo "<tr>";  
	echo "<th>Nombre</th>";  
	echo "<th>Carnet</th>";  
	echo "<th>Cursos</th>";  	
	echo "</tr>";  
	while ($row = mysql_fetch_row($result)){ 
        $row0 = utf8_encode("$row[0]");
        $row2 = utf8_encode("$row[2]");	
		echo "<tr>"; 
		echo "<td>$row0</td>";  
		echo "<td>$row[1]</td>";  
		echo "<td>$row2</td>"; 
		echo "</tr>";  
	}  
	echo "</table>";

	
?>