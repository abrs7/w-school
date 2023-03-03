<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="log.css" />
    
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   
</head>
<body background="images/login.jpg" class="body_deg">
  <center>
      <div class="form_deg"> 
          
          <form  action="login_check.php" method="POST" class="login_form">
          <center class="title_deg">Login Page
              <h4><?php
              error_reporting(0);
              session_start();
              session_destroy();
              echo $_SESSION['loginMessage'];?></h4>
          </center>
              <div> 
              <label class="label_deg">
                  Username
              </label>
              <input type="text"  name="username">    
              </div>
              <div> 
              <label class="label_deg">
                  Password
              </label>
              <input  type="password"  name="password">    
              </div>
              <div> 
              
              <input class="btn btn-success" type="submit" name="submit" value="Login"> 
            <a href="signup.php">   <input class="btn bt-success" type="signup"   name="signing" value="SignUp"> </a>
              <div class="form-check mb-3 mb-md-0">
            <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
            <label class="form-check-label" for="loginCheck"> Remember me </label>
          </div>
        </div>   
              </div>
          </form>
      </div>
  </center>
</body>
</html>