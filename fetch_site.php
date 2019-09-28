<?php
require_once("connect.php");



$statement=mysqli_query($conn,"SELECT   
										site_descr AS description,
										site_location AS location,
										picture AS imagePath,
										id
	FROM touristic_site WHERE id ='{$_GET['data']}' ORDER BY id DESC ");


$rows=array();

while ($response=mysqli_fetch_assoc($statement)){
	    $rows[]=$response;

}
echo  json_encode($rows);


?>