<?php

header("Content-Type: application/json; charset=UTF-8");

require_once 'connect.php';

$key = $_POST['key'];

if ( $key == "update_love" ){

    $id    = $_POST['id'];
    $love  = $_POST['love'];

    $query = "UPDATE planned_trip SET likes='$love' WHERE id='$id' ";

        if ( mysqli_query($conn, $query) ){
            $result["value"] = "1";
            $result["message"] = "Visibility set to : ".$love;

            echo json_encode($result);
            mysqli_close($conn);

        } 
        else {
            $response["value"] = "0";
            $response["message"] = "Error! ".mysqli_error($conn);
            echo json_encode($response);

            mysqli_close($conn);
        }

} else {
    $response["value"] = "0";
    $response["message"] = "Error! ".mysqli_error($conn);
    echo json_encode($response);

    mysqli_close($conn);
}

?>