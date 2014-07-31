<?php

//session_start();

$GLOBALS['config']=array(

	'mysql'=>array(
		//will have to add in the future
		'host' =>'',
		'username' => 'root',
		'password'=>'',
		'db'=>'web'
		
	
	),
	'remember'=>array(
		'cookie_name'=> 'hash',
		'cookie_expiry'=>604800
	),
	'session'=>array(
	
		'session_name'=>'user'
	
	),


);

spl_autoload_register(function($class){
	
	require_once ''. $class . '.php';
	
	
});