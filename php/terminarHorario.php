<?php

$dbhost = 'fdb13.biz.nf';
$dbuser = '2195469_premat';
$dbpass = 'adminpremat2016';
$dbname = '2195469_premat';
            
// Create connection
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$value = mysqli_query($conn, "SELECT * FROM HORARIO WHERE habilitado=1");


$num_rows = mysqli_num_rows($value);
if($num_rows > 0){ //existe

	$sql = "CALL sp_agregarHistorial();";
        mysqli_query($conn, $sql);
        $sql = "UPDATE HORARIO SET habilitado=0 WHERE habilitado=1;";
        
        
}else{ //no existe

	echo "Error";

}

if(mysqli_query($conn, $sql)){
      echo "Exito";
}

      
mysqli_close($conn);
?>