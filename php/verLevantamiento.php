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
    $result = @mysql_query("SELECT ESTUDIANTE.nombre, LEVANTAMIENTOREQUISITO.* FROM LEVANTAMIENTOREQUISITO,ESTUDIANTE WHERE ESTUDIANTE.carnet = LEVANTAMIENTOREQUISITO.carnet ");
	echo "<table>";  
	echo "<tr>";  
	echo "<th>Nombre</th>";  
	echo "<th>Carnet</th>";  
        echo "<th>Código del curso</th>";
        echo "<th>Nombre del curso requisito</th>";
	echo "<th>Levantamiento de requisito</th>";
	echo "<th>Presenta choque de horario</th>";
	echo "<th>RN</th>";
	echo "<th>Comentarios</th>";  	
	echo "</tr>";  
	while ($row = mysql_fetch_row($result)){
                $row0 = utf8_encode("$row[0]");
                $row3 = utf8_encode("$row[3]");
                $row7 = utf8_encode("$row[7]");
		echo "<tr>";  
		echo "<td>$row0</td>";  
		echo "<td>$row[1]</td>";  
		echo "<td>$row[2]</td>";
		echo "<td>$row3</td>";  
		echo "<td>$row[4]</td>";
		echo "<td>$row[5]</td>";  	
		echo "<td>$row[6]</td>";
		echo "<td>$row7</td>";
		echo "</tr>";  
	}  
	echo "</table>";

	
?>