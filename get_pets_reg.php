<?php 

header("Content-Type: application/json; charset=UTF-8");

require_once 'connect.php';




$query = "SELECT booking.booking_id,
                                    booking.name, 
                                    booking.email, 
                                    booking.phone, 
                                    booking.address,
                                    booking.status,
                                    booking.created_at  FROM
                                     booking, planned_trip, users WHERE 
                                     `booking`.`trip_id` = `planned_trip`.`id`
                                     AND `planned_trip`.`company_id` = `users`.`sno`
                                      ORDER BY `booking`.`created_at` DESC";
$result = mysqli_query($conn, $query);
$response = array();

$server_name = $_SERVER['SERVER_ADDR'];
$today = date('d M Y');
while( $row = mysqli_fetch_assoc($result) ){

    array_push($response, 
    array(
        'id'        =>$row['booking_id'], 
        'name'      =>$row['name'], 
        'species'   =>"E-mail: ".$row['email'] ." - Address: ".$row['address'],
        'breed'     =>"Phone: ".$row['phone'],
        'birth'     =>(date('d M Y', strtotime($row['created_at']))==$today)?'today':date('d M Y', strtotime($row['created_at'])) ,
        'picture'   =>$row['email'],
        'love'      =>$row['status']) 
    );
}

echo json_encode($response);

mysqli_close($conn);

?>