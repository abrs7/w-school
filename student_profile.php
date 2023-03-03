

 <?php 

session_start();

if(!isset($_SESSION['username'])){
    header("location:login.php");
}
elseif($_SESSION['usertype'] == "admin"){
    header("location:login.php"); 
}

$host = "localhost";

$user = "root";

$password = "";

$db = "schoolproject";



$data = mysqli_connect($host, $user, $password, $db);

$name = $_SESSION['username'];

$sql = "SELECT * FROM user WHERE username ='$name'  ";

// $id = $_GET['student_id'];

$result = mysqli_query($data, $sql);

$info = mysqli_fetch_assoc($result);

if(isset($_POST['update_profile'])){

$s_email = $_POST['email'];
$s_phone = $_POST['phone'];
$s_password = $_POST['password'];


$sql2 = "UPDATE user SET email='$s_email', phone='$s_phone', password='$s_password', WHERE username='$name'" ;

$result2 = mysqli_query($data, $sql2);

if($result2){
    echo "update Success";
}
else{
    echo "Not Good";
}


}



?>
<!DOCTYPE html>
<html>
<head>

<?php

 include "student_css.php";

?>
<style type='text/css'>
label{
    
    display: inline-block;
    text-align: right;
    width: 100px;
    padding-top: 10px;
    padding-bottom: 10px;
    color: white;



}
.div_deg{

    background-color: #424a5b;
    width: 500px;
    padding-top: 70px;
    padding-bottom: 70px;
    
}

</style>



</head>
<body>
   <?php
   include "student_sidebar.php";
   ?>
   <div class="content">
   <center> 
   <h1>Update Profile</h1>
   <br>
      
     <form method="POST" action="#">
     <div class="div_deg"> 
     
     <div> 
     <label> Email </label>
     <input name="email" value="<?php echo "{$info['email']} "?>" type="email">
     </div>
      <div> 
     <label> Phone </label>
     <input name="phone" value="<?php echo "{$info['phone']} "?>" type="text">
     </div>


     <div> 
     <label> Password  </label>
     <input name="password" value="<?php echo "{$info['password']} "?>" type="text">
     </div>
    
    <div>
    <input class="btn btn-primary" name="update_submit" type="submit" value="Submit">
    </div>
   
    </div>
      </div>
     </form>

 </center>


    </div>
</body>