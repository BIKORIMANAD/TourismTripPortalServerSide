<?php 

header("Content-Type: application/json; charset=UTF-8");

require_once 'connect.php';




$query = "SELECT planned_trip.id,touristic_site.site_name, 
                                    planned_trip.descr, 
                                    planned_trip.url, 
                                    planned_trip.visit_date, 
                                    planned_trip.picture,planned_trip.likes,planned_trip.status  FROM
                                     planned_trip
                                     INNER JOIN touristic_site 
                                     ON `touristic_site`.`id` = `planned_trip`.`name` 
                                     ORDER BY planned_trip.id DESC ";
$result = mysqli_query($conn, $query);
$response = array();

$server_name = $_SERVER['SERVER_ADDR'];

while( $row = mysqli_fetch_assoc($result) ){

    array_push($response, 
    array(
        'id'        =>$row['id'], 
        'name'      =>$row['site_name'], 
        'species'   =>$row['descr'],
        'breed'     =>$row['url'],
        'gender'    =>$row['status'],
        'birth'     =>date('d M Y', strtotime($row['visit_date'])),
        'picture'   =>"http://$server_name/2019/TourismTripPortal" . $row['picture'],
        'love'      =>$row['likes']) 
    );
}

echo json_encode($response);

mysqli_close($conn);

?>