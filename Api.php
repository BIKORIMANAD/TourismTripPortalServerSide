<?php 

	
	//database constants
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_NAME', 'tourism_trip');
	
	//connecting to database and getting the connection object
	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	
	//Checking if any error occured while connecting
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
	}
	
	//creating a query
	$today = date('Y-m-d');
	$true = true;
	$stmt = $conn->prepare("SELECT 
									planned_trip.id, 
									touristic_site.site_name, 
									planned_trip.descr, 
									planned_trip.url, 
									planned_trip.visit_date, 
									planned_trip.picture 
									FROM
									 planned_trip
									 INNER JOIN touristic_site 
									 ON `touristic_site`.`id` = `planned_trip`.`name` 
									 WHERE
									`planned_trip`.`visit_date` >= '$today' 
									AND name ='{$_GET['siteId']}' AND `planned_trip`.`likes`=true ORDER BY `planned_trip`.`visit_date` DESC;");
	
	//executing the query 
	$stmt->execute();
	
	//binding results to the query 
	$stmt->bind_result($id, $title, $shortdesc, $rating, $price, $image);
	
	$products = array(); 
	
	//traversing through all the result 
	while($stmt->fetch()){
		$temp = array();
		$temp['id'] = $id; 
		$temp['name'] = $title; 
		$temp['descr'] = $shortdesc; 
		$temp['url'] = $rating; 
		$temp['visit_date'] = $price; 
		$temp['picture'] = $image; 
		array_push($products, $temp);
	}
	
	//displaying the result in json format 
	echo json_encode($products);