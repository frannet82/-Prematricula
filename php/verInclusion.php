<?php
 
/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */
 
// array for JSON response
$response = array();
 
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
 
    // mysql inserting a new row
    $result = @mysql_query("SELECT ESTUDIANTE.nombre, INCLUSION.* FROM INCLUSION,ESTUDIANTE WHERE ESTUDIANTE.carnet = INCLUSION.carnet");
	echo "<table>";  
	echo "<tr>";  
	echo "<th>Nombre</th>";  
	echo "<th>Carnet</th>";  
	echo "<th>Dia de la matrícula</th>";
        echo "<th>Hora de la matrícula</th>";
        echo "<th>Código del curso</th>";
        echo "<th>Grupo</th>";
	echo "<th>Cumple con los requisitos</th>";
	echo "<th>Presenta choque de horario</th>";
	echo "<th>RN</th>";
	echo "<th>Comentarios</th>";  	
	echo "</tr>";  
	while ($row = mysql_fetch_row($result)){
                $row0 = utf8_encode("$row[0]");
                $row9 = utf8_encode("$row[9]");
		echo "<tr>";  
		echo "<td>$row0</td>";  
		echo "<td>$row[1]</td>";  
		echo "<td>$row[2]</td>";
		echo "<td>$row[3]</td>";  
		echo "<td>$row[4]</td>";
		echo "<td>$row[5]</td>";  	
		echo "<td>$row[6]</td>";
		echo "<td>$row[7]</td>";
                echo "<td>$row[8]</td>";
		echo "<td>$row9</td>";
		echo "</tr>";  
	}  
	echo "</table>";

	
?>