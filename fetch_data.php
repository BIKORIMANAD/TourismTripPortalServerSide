<?php
require_once("connect.php");



$statement=mysqli_query($conn,"SELECT   site_name AS siteName,
										site_descr AS description,
										site_location AS location,
										picture AS imagePath,
										id
	FROM touristic_site ORDER BY id DESC ");


$rows=array();

while ($response=mysqli_fetch_assoc($statement)){
	    $rows[]=$response;

}
echo  json_encode($rows);


?>