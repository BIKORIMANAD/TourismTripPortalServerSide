<?php
 
class DbOperation
{
    //Database connection link
    private $con;
 
    //Class constructor
    function __construct()
    {
        //Getting the DbConnect.php file
        require_once dirname(__FILE__) . '/DbConnect.php';
 
        //Creating a DbConnect object to connect to the database
        $db = new DbConnect();
 
        //Initializing our connection link of this class
        //by calling the method connect of DbConnect class
        $this->con = $db->connect();
    }
	
	/*
	* The create operation
	* When this method is called a new record is created in the database
	*/
	function createHero($name, $realname, $rating, $teamaffiliation){
		$stmt = $this->con->prepare("INSERT INTO suggestions (name, phoneNumber, Email, message) VALUES (?, ?, ?, ?)");
		$stmt->bind_param("ssis", $name, $realname, $rating, $teamaffiliation);
		if($stmt->execute())
			return true; 
		return false; 
	}

	/*
	* The read operation
	* When this method is called it is returning all the existing record of the database
	*/
	function getHeroes(){
		$stmt = $this->con->prepare("SELECT id, name, phoneNumber, Email, message FROM suggestions");
		$stmt->execute();
		$stmt->bind_result($id, $name, $realname, $rating, $teamaffiliation);
		
		$heroes = array(); 
		
		while($stmt->fetch()){
			$hero  = array();
			$hero['id'] = $id; 
			$hero['name'] = $name; 
			$hero['phoneNumber'] = $realname; 
			$hero['Email'] = $rating; 
			$hero['message'] = $teamaffiliation; 
			
			array_push($heroes, $hero); 
		}
		
		return $heroes; 
	}
	
	/*
	* The update operation
	* When this method is called the record with the given id is updated with the new given values
	*/
	function updateHero($id, $name, $realname, $rating, $teamaffiliation){
		$stmt = $this->con->prepare("UPDATE suggestions SET name = ?, phoneNumber = ?, Email = ?, message = ? WHERE id = ?");
		$stmt->bind_param("ssisi", $name, $realname, $rating, $teamaffiliation, $id);
		if($stmt->execute())
			return true; 
		return false; 
	}
	
	
	/*
	* The delete operation
	* When this method is called record is deleted for the given id 
	*/
	function deleteHero($id){
		$stmt = $this->con->prepare("DELETE FROM suggestions WHERE id = ? ");
		$stmt->bind_param("i", $id);
		if($stmt->execute())
			return true; 
		
		return false; 
	}
}