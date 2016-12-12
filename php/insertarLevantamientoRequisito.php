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
$nombreCursoMatricular = mysqli_real_escape_string($conn, $_POST['nombreCursoMatricular']);
$codigoCurso = mysqli_real_escape_string($conn, $_POST['codigoCurso']);
$nombreCursoRequisito = mysqli_real_escape_string($conn, $_POST['nombreCursoRequisito']);
$comentarios = mysqli_real_escape_string($conn, $_POST['comentarios']);

$value = mysqli_query($conn, "SELECT carnet FROM ESTUDIANTE WHERE carnet='$carnet'");


$num_rows = mysqli_num_rows($value);
if($num_rows > 0){ //existe

        $url = '2016tecpremadise.co.nf/js/app.js';
        $sql = "insert into LEVANTAMIENTOREQUISITO values ('$carnet', '$codigoCurso', '$nombreCursoRequisito', 'SI', 'NO', '0', '$comentarios')";
        mysqli_query($conn, $sql);
        
}else{ //no existe

    $sql = "insert into ESTUDIANTE values 
        ('$nombre', '$carnet', '$correo', '$tel')";
        
    mysqli_query($conn, $sql);
    
    $sql = "insert into LEVANTAMIENTOREQUISITO values ('$carnet', '$codigoCurso', '$nombreCursoRequisito', 'SI', 'NO', '0', '$comentarios')";
    mysqli_query($conn, $sql);
    
}
 
// attempt insert query execution


if(mysqli_query($conn, $sql)){
      echo "Levantamiento de requisitos realizado exitosamente.";
}

echo '<script type="text/javascript">
           window.location = "http://2016tecpremadise.co.nf/levantamiento.html"
      </script>';
      
//} else{
  //  echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
//}
 
// close connection
mysqli_close($conn);
?>