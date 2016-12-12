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
$nombre = mysqli_real_escape_string($conn, $_POST['nombreCompleto']);
$correo = mysqli_real_escape_string($conn, $_POST['correoElectronico']);
$carnet = mysqli_real_escape_string($conn, $_POST['carne']);
$tel = mysqli_real_escape_string($conn, $_POST['telefono']);
$dato = mysqli_real_escape_string($conn, $_POST['datos']);

$value = mysqli_query($conn, "SELECT carnet FROM ESTUDIANTE WHERE carnet='$carnet'");


$num_rows = mysqli_num_rows($value);
if($num_rows > 0){ //existe

        $var = (explode("/",$dato));
        foreach ($var as $value) {
        if ($value == "" ) {
        
        echo "Null";
       
        }
        else{
        

        $sql = "insert into PREMATRICULA values ('$carnet', '$value')";
        mysqli_query($conn, $sql);
        
        }
        
        }
        

        //
        
}else{ //no existe

        $var = (explode("/",$dato));
        foreach ($var as $value) {
        $sql = "insert into PREMATRICULA values ('$carnet', '$value')";
        mysqli_query($conn, $sql);
        }

       $sql = "insert into ESTUDIANTE values ('$nombre', '$carnet', '$correo', '$tel')";
       mysqli_query($conn, $sql);
    
    
}
 
    
// close connection
mysqli_close($conn);
?>