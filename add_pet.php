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

    $query = "INSERT INTO `planned_trip` (`id`, `name`, `descr`, `url`, `status`, `visit_date`) VALUES (NULL, '$name', '$descr', '$url', '$status', '$birth_newformat')";







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