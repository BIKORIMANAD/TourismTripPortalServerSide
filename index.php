<?php

require_once 'Functions.php';

$fun = new Functions();


if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $data = json_decode(file_get_contents("php://input"));

  if(isset($data -> operation)){

  	$operation = $data -> operation;

  	if(!empty($operation)){

  		if($operation == 'register'){

  			if(isset($data -> user ) && 
          !empty($data -> user) && 
           isset($data -> user -> name)&&
           isset($data -> user -> company_name)&&
           isset($data -> user -> company_tin)&&
           isset($data -> user -> company_address)&&
           isset($data -> user -> company_phone)&&
           isset($data -> user -> email) && 
           isset($data -> user -> password)){

  				$user = $data -> user;
  				$name = $user -> name;
          $cname = $user -> company_name;
          $ctin = $user -> company_tin;
          $caddress = $user -> company_address;
          $cphone = $user -> company_phone;
          $email = $user -> email;
  				$password = $user -> password;

          if ($fun -> isEmailValid($email)) {
            
            echo $fun -> registerUser($name,$cname,$ctin,$caddress,$cphone,$email,$password);

          } else {

            echo $fun -> getMsgInvalidEmail();
          }

  			} else {

  				echo $fun -> getMsgInvalidParam();

  			}

  		}else if ($operation == 'login') {

        if(isset($data -> user ) && !empty($data -> user) && isset($data -> user -> email) && isset($data -> user -> password)){

          $user = $data -> user;
          $email = $user -> email;
          $password = $user -> password;

          echo $fun -> loginUser($email, $password);

        } else {

          echo $fun -> getMsgInvalidParam();

        }
      } else if ($operation == 'chgPass') {

        if(isset($data -> user ) && !empty($data -> user) && isset($data -> user -> email) && isset($data -> user -> old_password) 
          && isset($data -> user -> new_password)){

          $user = $data -> user;
          $email = $user -> email;
          $old_password = $user -> old_password;
          $new_password = $user -> new_password;

          echo $fun -> changePassword($email, $old_password, $new_password);

        } else {

          echo $fun -> getMsgInvalidParam();

        }
      }else if ($operation == 'resPassReq') {

        if(isset($data -> user) && !empty($data -> user) &&isset($data -> user -> email)){

          $user = $data -> user;
          $email = $user -> email;

          echo $fun -> resetPasswordRequest($email);

        } else {

          echo $fun -> getMsgInvalidParam();

        }
      }else if ($operation == 'resPass') {

        if(isset($data -> user) && !empty($data -> user) && isset($data -> user -> email) && isset($data -> user -> password) 
          && isset($data -> user -> code)){

          $user = $data -> user;
          $email = $user -> email;
          $code = $user -> code;
          $password = $user -> password;
          
          echo $fun -> resetPassword($email,$code,$password);

        } else {

          echo $fun -> getMsgInvalidParam();

        }
      }

  	}else{

  		
  		echo $fun -> getMsgParamNotEmpty();

  	}
  } else {

  		echo $fun -> getMsgInvalidParam();

  }
} else if ($_SERVER['REQUEST_METHOD'] == 'GET'){


  echo "Login API";

}

