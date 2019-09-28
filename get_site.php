<?php 

header("Content-Type: application/json; charset=UTF-8");

require_once 'connect.php';

$query = "SELECT * FROM `touristic_site`  ORDER BY id DESC ";
$result = mysqli_query($conn, $query);
$response = array();

$server_name = $_SERVER['SERVER_ADDR'];

while( $row = mysqli_fetch_assoc($result) ){

    array_push($response, 
    array(
        'id'        =>$row['id'], 
        'name'      =>$row['site_name'], 
        'species'   =>$row['site_descr'],
        'breed'     =>$row['site_location'],
        'gender'    =>$row['site_type'],
        'birth'     =>date('d M Y', strtotime($row['created_at'])),
        'picture'   =>"http://$server_name/" . $row['picture'],
        'love'      =>$row['likes']) 
    );
}

echo json_encode($response);

mysqli_close($conn);

?>