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
 
// Escape user inputs for security
$tiempoInicial = mysqli_real_escape_string($conn, $_POST['tiempoInicial']);
$tiempoFinal = mysqli_real_escape_string($conn, $_POST['tiempoFinal']);
$value = mysqli_query($conn, "SELECT * FROM HORARIO WHERE habilitado=1");

$num_rows = mysqli_num_rows($value);
if($num_rows > 0){ //existe

        echo "Error";
        
        
}else{ //no existe
        $sql = "INSERT INTO `HORARIO`(fechaInicial,fechaFinal,habilitado) VALUES ('$tiempoInicial','$tiempoFinal','1')";
  
}
 

if(mysqli_query($conn, $sql)){
      echo "Exito";
}


mysqli_close($conn);
?>