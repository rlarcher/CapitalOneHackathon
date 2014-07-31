$('#signup').click(function(){
	console.log('hello');
	var first=document.getElementById('first').value;
	var last=document.getElementById('last').value;
	var email=document.getElementById('email_sign').value;
	var password=document.getElementById('password_sign').value;
			$.ajax({
				   type: "POST",
				   url: "controller/LoginController.php",
				   data: {
					   type : 'sign' , email :email , first_name :first , last_name :last , password: password
				   },
				   cache: false,
				  // dataType: 'json',
				   success: function(data){
					   console.log('hello2');
					   
						document.getElementById("error_sign").innerHTML=data;
						
					  // $("#"+id+"_group").removeClass( "btn-info" ).addClass( "btn-success" ).html('Unjoin the group : '+text);
					   
				   }
		
			   });
	
	
	
});



$('#login').click(function(){
	console.log('hellologin');
	
	var email=document.getElementById('email_log').value;
	var password=document.getElementById('password_log').value;
	console.log(email);
	console.log(password);
			$.ajax({
				   type: "POST",
				   url: "controller/LoginController.php",
				   data: {
					   type : 'log' , email :email , password: password
				   },
				   cache: false,
				  // dataType: 'json',
				   success: function(data){
					   console.log('hello2');
					   console.log(data);
					   console.log(data.length);
					  	if(data.length>10){
					  	 document.getElementById("error_log").innerHTML=data;
					   
						}else{
							window.location.href='http://localhost/Hack/intro.html';
							console.log('change to main');
							
						}
					   /*
					   if(data.passed){
					   	console.log(data);
						document.getElementById("error_log").innerHTML=data.content;
						// $("error_sign").text(data);
					   }else{
						 document.getElementById("error_log").innerHTML=data.content;
					   }*/
					  // $("#"+id+"_group").removeClass( "btn-info" ).addClass( "btn-success" ).html('Unjoin the group : '+text);
					   
				   }
		
			   });
	
	
	
});