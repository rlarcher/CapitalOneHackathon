<?php 

class Validate{
	
	private $_passed=false,
			$_errors=array(),
			$_db=null;
			
	public function __construct(){
		
		$this->_db=DB::getInstance();
	}
			
	public function check($source, $items=array()){
		
		foreach($items as $item => $rules){
				$value=trim($source[$item]);
			foreach($rules as $rule => $rule_value){
				
		
				
				if($rule==='required' && empty($value)){
					$this->addError("{$item} is required");
				}else if(!empty($value)){
					
					switch($rule){
						
						case 'min':
							if(strlen($value)<$rule_value){
								$this->addError("{$item} must be a minimum of {$rule_value} characters");
							}
						break;
						
						case 'matches':
							if($value!= $source[$rule_value]){
								$this->addError("The two passwords do not match");
							}
						break;
						
						case 'unique':
							$count=$this->_db->query("SELECT email FROM users WHERE email = ?", array($value));
							if($count->count()>0){
								$this->addError("The email you provided already exists.");
							}
						break;
						
						case 'format':
						
							if(!filter_var($source[$rule_value], FILTER_VALIDATE_EMAIL)){
								
								$this->addError('The email you entered is not a valid e-mail');
								
							}
												
						break;
						
					}
					
					
				}
				
			}
			
		}
			
		
	
		if(empty($this->_errors)){
			$this->_passed=true;
			
		}
		
		return $this;
		
	}
	
	
	
	
	
	
	
	private function addError($error){
		$this->_errors[]=$error;
	}
	
	public function returnErrors(){
		
		return $this->_errors;
	}
	
	public function passed(){
		
		
		return $this->_passed;
		
	}
		
	
	public function get_db(){
		return $this->_db;
		
	}
	
	
	public function login_correct(){
		$email=$_POST['email'];
		$password=$_POST['password'];
		
		
		$db=DB::getInstance();
		
		
		//check if user exists
		$query=$db->query('SELECT salt FROM user WHERE email = ?', array($email));
		$salt=$query->result();
		if($query->count()>0){
			$hashed_password=Hash::make($password,$salt[0]['salt']);
			$user=$db->query
			("SELECT * FROM user WHERE email= ? AND password = ?", array($email,$hashed_password));
							
			if($user->count()==1){
									
				$_SESSION['email']=$email;
				$_SESSION['isLoggedIn'] = true;
				return true;
			
			}else{
				
				$this->addError('The email or password you entered is incorrect');
				return false;
			}
		
		}else{
			
			$this->addError('The email or password you entered is incorrect');
			return false;
		}
		
		
	}
	
	
	
}