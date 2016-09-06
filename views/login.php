<?php

echo'
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Sign-Up/Login Form</title>
    <link href="http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600" rel="stylesheet" type="text/css">
    
    <link rel="stylesheet" href="'.adm.'assets/css/normalize.css">

    
        <link rel="stylesheet" href="'.adm.'/assets/css/style.css">

    
    
    
  </head>

  <body>

    <div class="form">
      
      <ul class="tab-group">
        
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Welcome Back!</h1>
          
         <form action="" method="POST">
            <div class="field-wrap">
            <label>
              <span class="req"></span>
            </label>
           <input type="text" name="user" placeholder="User" id="user">
          </div>
          
          <div class="field-wrap">
            <label>
              
            </label>
            <input type="password" name="password" placeholder="password" id="pass">
          </div>
          
          <p class="forgot"><a href="#">Forgot Password?</a></p>
           <p class="forgot"><a href="'.root.'register">Register</a></p>
          
          <button class="button button-block"/><input type="submit" name="submit" value="Login" ></button>
          
          </form>


       
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

        <script src="'.adm.'assets/js/index.js"></script>

    
    
    
  </body>
</html>
';
?>

