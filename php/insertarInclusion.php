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
$diaMatricula = mysqli_real_escape_string($conn, $_POST['diaMatricula']);
$horaMatricula = mysqli_real_escape_string($conn, $_POST['horaMatricula']);
$nombreCurso = mysqli_real_escape_string($conn, $_POST['nombreCurso']);
$codigoCurso = mysqli_real_escape_string($conn, $_POST['codigoCurso']);
$numeroGrupo = mysqli_real_escape_string($conn, $_POST['numeroGrupo']);
$comentarios = mysqli_real_escape_string($conn, $_POST['comentarios']);

$value = mysqli_query($conn, "SELECT carnet FROM ESTUDIANTE WHERE carnet='$carnet'");


$num_rows = mysqli_num_rows($value);
if($num_rows > 0){ //existe

        $url = '2016tecpremadise.co.nf/js/app.js';
        $sql = "insert into INCLUSION values ('$carnet', '$diaMatricula', '$horaMatricula', '$codigoCurso', '$numeroGrupo', 'SI', 'NO', '0', '$comentarios')";
        mysqli_query($conn, $sql);
        
}else{ //no existe

    $sql = "insert into ESTUDIANTE values 
        ('$nombre', '$carnet', '$correo', '$tel')";
        
    mysqli_query($conn, $sql);
    
    $sql = "insert into INCLUSION values ('$carnet', '$diaMatricula', '$horaMatricula', '$codigoCurso', '$numeroGrupo', 'SI', 'NO', '0', '$comentarios')";
    mysqli_query($conn, $sql);
    
}
 
// attempt insert query execution


if(mysqli_query($conn, $sql)){
      echo "Inclusión realizada exitosamente.";
}

echo '<script type="text/javascript">
           window.location = "http://2016tecpremadise.co.nf/inclusion.html"
      </script>';
      
//} else{
  //  echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
//}
 
// close connection
mysqli_close($conn);
?>