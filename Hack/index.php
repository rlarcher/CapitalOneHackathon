<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type='text/javascript' src="js/bootstrap.js"></script>
</head>

<body>
<div id="background_image">

	<!--<img src="images/town.png">-->

    <div id="main">
    	<div id="buttons" style="opacity:1;">	
           
            <button id="first_button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#loginModal" data-backdrop="static">Login</button>
            <button id="second_button" class="btn btn-info btn-lg" data-toggle="modal" name="register" data-target="#registerModal" data-backdrop="static">	            Register
            </button>
        </div>
    </div>
</div>



 <!-- Modal -->
<div class="modal fade" id="loginModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Sign In</h4>
      </div>
      <div class="modal-body">
       
     
        <fieldset>
                <div class="form-group">
                  <input class="form-control" placeholder="E-mail" name="email" type="text" id="email_log" required>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Password" name="password" type="password" id="password_log"required>
              </div>
            </fieldset>
            
        <div id="error_log">
             
        </div>
      </div>
      <div class="modal-footer">
        
        <button style="margin-right:10px;"type="submit" id="login" name="login" value="login" class="btn btn-success btn-padding">Log In</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




 	
<div class="modal fade" id="registerModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Register</h4>
      </div>
      <div class="modal-body">
        <fieldset>
              <div class="form-group">
                  <input id="first" class="form-control" placeholder="First Name" name="first_name" type="text" required>
              </div>
              <div class="form-group">
                  <input id="last" class="form-control" placeholder="Last Name" name="last_name" type="text" required>
              </div>
              <div class="form-group">
                  <input id="email_sign" class="form-control" placeholder="E-mail" name="email" type="text" required>
              </div>
              <div class="form-group">
                <input id="password_sign" class="form-control" placeholder="Password" name="password" type="password" value="" required>
              </div>
            </fieldset>
            
            
            <div id="error_sign">
             
            </div>
      </div>
      <div class="modal-footer">
        
        <button id="signup" class="btn btn-danger" name="register" value="register">Sign Up</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src= "js/sign.js"></script>     
</body>
</html>
