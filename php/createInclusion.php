<?php
 
/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */
 
// array for JSON response
$response = array();
 
// check for required fields
if (isset($_POST['carnet'])) {
 
	$carnet = $_POST['carnet'];
	$diaMatricula = $_POST['diaMatricula'];
	$horaMatricula = $_POST['horaMatricula'];
	$codigoCurso = $_POST['codigoCurso'];
	$numeroGrupo = $_POST['numeroGrupo'];
	$cumpleRequisitos = $_POST['cumpleRequisitos'];
	$choqueHorario = $_POST['choqueHorario'];
	$RN = $_POST['RN'];
	$comentarios = $_POST['comentarios'];
 
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
 
    // mysql inserting a new row
    $result = mysql_query("INSERT INTO INCLUSION (carnet, diaMatricula, horaMatricula, codigoCurso, numeroGrupo, cumpleRequisitos, choqueHorario, RN, comentarios) VALUES('$carnet', '$diaMatricula', '$horaMatricula', '$codigoCurso', '$numeroGrupo', '$cumpleRequisitos', '$choqueHorario', '$RN', '$comentarios')");
 
    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "Inclusion guardada exitosamente.";
 
        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! Ha ocurrido un error.";
 
        // echoing JSON response
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Hacen falta datos.";
 
    // echoing JSON response
    echo json_encode($response);
}
?>

