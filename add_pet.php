<?php 

require_once 'connect.php';

$key = $_POST['key'];

$name       = $_POST['name'];
$descr      = $_POST['species'];
$url        = $_POST['breed'];
$status     = $_POST['gender'];
$visit_date = $_POST['birth'];
$picture    = $_POST['picture'];
$company_id = $_POST['companyID'];

if ( $key == "insert" ){

    $birth_newformat = date('Y-m-d', strtotime($visit_date));

    $query = "INSERT INTO `planned_trip` (`id`, `name`, `descr`, `url`, `status`, `visit_date`,company_id)
                                 VALUES 
                                         (NULL, '$name', '$descr', '$url', '$status', '$birth_newformat','$company_id')";
    if ( mysqli_query($conn, $query) ){

            if ($picture == null) {

                $finalPath = "http://172.20.10.6/2019/TourismTripPortal/pets_picture/visitrwanda.jpg"; 
                $result["value"] = "1";
                $result["message"] = "Success";
    
                echo json_encode($result);
                mysqli_close($conn);

            } else {

                $id = mysqli_insert_id($conn);
                $path = "http://172.20.10.6/2019/TourismTripPortal/pets_picture/$id.jpeg";
                $finalPath = $path;

                $insert_picture = "UPDATE  planned_trip SET picture='$finalPath' WHERE id='$id' ";
            
                if (mysqli_query($conn, $insert_picture)) {
            
                    if ( file_put_contents( $path, base64_decode($picture) ) ) {
                        
                        $result["value"] = "1";
                        $result["message"] = "Success!";
                        echo json_encode($result);
                        mysqli_close($conn);
            
                    } else {
                        
                        $response["value"] = "0";
                        $response["message"] = "Error! ".mysqli_error($conn);
                        echo json_encode($response);
                        mysqli_close($conn);
                    }

                }
            }

        } 
        else {
            $response["value"] = "0";
            $response["message"] = "Error! ".mysqli_error($conn);
            echo json_encode($response);

            mysqli_close($conn);
        }
}

?>