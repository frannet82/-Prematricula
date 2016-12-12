<?php

$dbhost = 'fdb13.biz.nf';
$dbuser = '2195469_premat';
$dbpass = 'adminpremat2016';
$dbname = '2195469_premat';
            
// Create connection
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

//Users validation
$user = mysqli_real_escape_string($conn, $_POST['usuario1']);
$passw = mysqli_real_escape_string($conn, $_POST['contra1']);


// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$value = mysqli_query($conn, "SELECT Nombre FROM ADMINISTRADOR WHERE Nombre='$user' AND Password='$passw';");

$num_rows = mysqli_num_rows($value);
if($num_rows > 0){ //existe

	echo "Correcto";
        
        
}else{ //no existe

	echo "Error";

}

if(mysqli_query($conn, $sql)){
      echo "Exito";
}

      
mysqli_close($conn);
?>