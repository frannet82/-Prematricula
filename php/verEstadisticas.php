<?php

    // include db connect class
    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
 
    // mysql inserting a new row
    $result = @mysql_query("CALL sp_porcentaje()");
	echo "<dl><dt>Cantidad de cursos solicitados</dt>";
        echo "<br>";
	while ($row = mysql_fetch_row($result)){ 
        $row0 = utf8_encode("$row[0]");
	echo "<dd class='percentage percentage-$row[2]'>";
        echo "<span class='text'> Curso: $row0 Cantidad: $row[1] &nbsp;</span></dd>";
        echo "<br>";
	}
            
        echo "<br>"; 

	
?>