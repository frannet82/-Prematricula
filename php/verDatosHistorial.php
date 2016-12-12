<?php
 
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
 
    // mysql inserting a new row
    $result = @mysql_query("SELECT cantPrematriculas, cantInclusiones, cantLevantamientos, fechaInicial,fechafinal FROM HISTORIAL");
	echo "<table  class='responsive'>";  
	echo "<tr>";  
	echo "<th>Cantidad de prematriculados</th>";  
	echo "<th>Cantidad de inclusiones realizadas</th>";  
	echo "<th>Cantidad de levantamientos de requisitos.</th>";
    echo "<th>Fecha de inicio</th>";
    echo "<th>Fecha final</th>";  	
	echo "</tr>";  
	while ($row = mysql_fetch_row($result)){
		echo "<tr>";  
		echo "<td>$row[0]</td>";  
		echo "<td>$row[1]</td>";  
		echo "<td>$row[2]</td>";
		echo "<td>$row[3]</td>";
		echo "<td>$row[4]</td>";			
		echo "</tr>";  
	}  
	echo "</table>";

	
?>