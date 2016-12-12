<?php

    // include db connect class
    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
 
    // mysql inserting a new row
    $result = @mysql_query("CALL sp_porcentaje()");
        
        while ($row = mysql_fetch_row($result)){
                echo"<div class='large-3 columns'>";
                echo "<div class='clearfix'>";
                $row0 = utf8_encode("$row[0]");
                $row2 = intval("$row[2]");
                echo "<p><font size='2' color='white'>$row0</font></p>";
                echo "<div class='c100 p$row2'>";
                echo "<span>$row2%</span>";
                echo"<div class='slice'>";
                        echo"<div class='bar'></div>";
                        echo"<div class='fill'></div>";
                echo"</div>";
                echo"</div>";
                echo"</div>";
                echo "</div>"; 
                

        }
             
        echo "<br>"; 

	
?>