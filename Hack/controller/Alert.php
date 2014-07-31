<?php



class Alert{
	
	
	public static function return_error_div($errors=array()){
		
		echo '
		<div class="alert alert-dismissable alert-danger">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>Oh snap! You have errors...</strong> 
			
		
		<ul><li>';
		
		echo str_replace("_"," ",implode('<li>' , $errors));
		
		echo '</ul>';
		echo '</div>';
		
		
	}
	
	public static function correct($message){
		echo '<div class="alert alert-dismissable alert-success">
				<button type="button" class="close" data-dismiss="alert">×</button>
				 '.$message.'
			 </div>';
		
	}
	public static function correct_signup(){
		echo '<div class="alert alert-dismissable alert-success">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<strong>Well done!</strong> 
				You have successfully registered.You now have the ability to log in.
			</div>';
		
		
		
	}
	
	
}