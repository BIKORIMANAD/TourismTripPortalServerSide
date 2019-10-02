<?php 

header("Content-Type: application/json; charset=UTF-8");

require_once 'connect.php';

$key = $_POST['key'];

if ( $key == "update" ){

    


    $id         = $_POST['id'];
    $name       = $_POST['name'];
    $descr      = $_POST['species'];
    $url        = $_POST['breed'];
    $status     = $_POST['gender'];
    $visit_date = $_POST['birth'];
    $picture    = $_POST['picture'];

    $visit_date =  date('Y-m-d', strtotime($visit_date));

    $query = "UPDATE touristic_site SET 
    site_name='$name', 
    site_descr='$descr', 
    site_location='$url',
    site_type='$status',
    created_at='$visit_date' 
    WHERE id='$id' ";

        if ( mysqli_query($conn, $query) ){

            if ($picture == null) {

                $result["value"] = "1";
                $result["message"] = "Success";
    
                echo json_encode($result);
                mysqli_close($conn);

            } else {

                $path = "pets_picture/$id.jpeg";
                $finalPath = "/TourismTripPortal/".$path;

                $insert_picture = "UPDATE touristic_site SET picture='$finalPath' WHERE id='$id' ";
            
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