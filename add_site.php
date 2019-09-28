<?php 

require_once 'connect.php';

$key = $_POST['key'];

$name       = $_POST['name'];
$descr      = $_POST['species'];
$url        = $_POST['breed'];
$status     = $_POST['gender'];
$visit_date = $_POST['birth'];
$picture    = $_POST['picture'];

if ( $key == "insert" ){

    $birth_newformat = date('Y-m-d', strtotime($visit_date));

    $query = "INSERT INTO touristic_site (site_name,site_descr,site_location,site_type,created_at)
    VALUES ('$name', '$descr', '$url', '$status', '$birth_newformat') ";

        if ( mysqli_query($conn, $query) ){

            if ($picture == null) {

                $finalPath = "pets_picture/visitrwanda.jpg"; 
                $result["value"] = "1";
                $result["message"] = "Success";
    
                echo json_encode($result);
                mysqli_close($conn);

            } else {

                $id = mysqli_insert_id($conn);
                $path = "pets_picture/$id.jpeg";
                $finalPath = $path;

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