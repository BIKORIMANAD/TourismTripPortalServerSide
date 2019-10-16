<?php 

require_once 'connect.php';

$key = $_POST['key'];

$name       = $_POST['name'];
$descr      = $_POST['species'];
$url        = $_POST['breed'];
$status     = date('Y-m-d');
$visit_date = $_POST['birth'];
// $picture    = mysqli_real_escape_string($_POST['picture']);


if ( $key == "insert" ){

    $birth_newformat = date('Y-m-d', strtotime($visit_date));

    $query = "INSERT INTO `booking` SET `booking_id` = NULL, `name` = '$name', `email` = '$descr', `phone` = '$url', `address` = '$visit_date', `created_at` = '$status'";

    if ( mysqli_query($conn, $query) ){
        $result["value"] = "1";
        $result["message"] = "Success";
        echo json_encode($result);
        mysqli_close($conn);

    } else {
        $response["value"] = "0";
        $response["message"] = "Error! ".mysqli_error($conn);
        echo json_encode($response);
        mysqli_close($conn);
    }
}
    else {
            $response["value"] = "0";
            $response["message"] = "Error! ".mysqli_error($conn);
            echo json_encode($response);

            mysqli_close($conn);
        }


?>