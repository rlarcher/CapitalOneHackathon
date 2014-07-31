<?php
  ini_set('display_errors',1);
  ini_set('display_startup_errors',1);
  error_reporting(-1);

  //require_once("../functions/functions.php");
  require_once("DB.php");
  require_once("Hash.php");
  require_once("Alert.php");
  require_once("Validate.php");

  //All login and register password checking and validation logic goes here
  
  $validate=new Validate();
  
  $type=$_POST['type'];
  
  if($type=='log'){
	  $info=array('passed'=>false , 'content'=>'');
	  $validation=$validate->check($_POST,array(
								'email'=> array(
									'required'=>true
								),
								'password'=>array(
									'required'=>true
								)
							));
							
							
							
	if($validation->passed()){
		
		if($validation->login_correct()){
			$info['passed']=true;
			
			//$info ['content']=Alert::correct_signup();
		}else{
			$info ['content']=Alert::return_error_div($validation->returnErrors());
		}
		
		
	}else{
		$info ['content']=Alert::return_error_div($validation->returnErrors());
	}
	
	echo $info ['content'];
	 // echo php_encode($info);
	
  }
  else if($type=='sign'){
	
		$validation=$validate->check($_POST,array(
		
								'first_name'=> array(
									'required'=>true
								),
								'last_name'=> array(
									'required'=>true
								),
								'email'=> array(
									'required'=>true,
									'unique'=>'email',
									'format'=>'email'
								),
								'password'=>array(
									'required'=>true,
									'min'=>6
								)
							
								
								/*,
								//I'm thinking of adding a duplicate password field to make sure the password entered is correct
								'password_again'=>array(
									'required'=>true,
									'matches'=>'password'
								)*/
						
						
							
							));
	
	//connect to database if there are no errors
	
	if($validation->passed()){
		
			$instance=DB::getInstance();
			
			$salt=Hash::salt(10);
			$hashed_password=Hash::make($_POST['password'],$salt);
			
			$instance->query('INSERT INTO user (email , password , salt , first_name , last_name ) VALUES (? , ? , ? , ? , ? )' ,
			 array($_POST['email'] , $hashed_password , $salt , $_POST['first_name'] , $_POST['last_name'] ));
			 
			Alert::correct('You have successfully entered the data. Please check your e-mail to complete the sign-up.');
			
			//send email functionality will come here
		
	}else{
		 Alert::return_error_div($validation->returnErrors());
	}
	
	
	
	
   
  }