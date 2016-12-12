<?php
 
/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */
 
// array for JSON response
$response = array();
 
// check for required fields
if (isset($_POST['nombre']) && isset($_POST['carnet'])&& isset($_POST['email']) && isset($_POST['telefono'])) {
 
	$nombre = $_POST['nombre'];
	$carnet = $_POST['carnet'];
	$email = $_POST['email'];
	$telefono = $_POST['telefono'];
 
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
 
    // mysql inserting a new row
    $result = mysql_query("INSERT INTO ESTUDIANTE(nombre, carnet, email, telefono) VALUES('$nombre', '$carnet', '$email', '$telefono')");
 
    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "Prematricula guardada exitosamente.";
 
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
?>*