<?php
//  error_reporting(0);
session_start();
// include "inporto.php";

if(!isset($_SESSION['username'])){
    header("location:login.php");
}
elseif($_SESSION['usertype'] == "student"){
    header("location:login.php"); 
}


$host = "localhost";

$user = "root";

$password = "";

$db = "schoolproject";



$data = mysqli_connect($host, $user, $password, $db);



$sl =  "SELECT * FROM user WHERE usertype='student' ";

$res =mysqli_query($data, $sl);

while($stn=$res->fetch_assoc()){ 


    if (isset($_GET['student_id'])) {
        $id = filter_var($_GET['student_id'], FILTER_SANITIZE_NUMBER_INT);
    } else {
        // Redirect to some error page
        header("location:login.php");
        exit();
    }
    


}



$sql = "SELECT *  FROM user WHERE id= '$id'";

$result = mysqli_query($data,$sql);

$info = $result->fetch_assoc();





if(isset($_POST['update'])){
      
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $password = $_POST['password'];
   
   
         



    $query = "UPDATE user SET username = '$name', email = '$email', phone = '$phone' , password = '$password' WHERE id= '$id'" ;

    $result2 = mysqli_query($data, $query);
    
    if($result2){
        echo "<script type='text/javascript'> alert('You have successfuly updates!!!'); </script>";

        header("location:view_student.php");
    }


}



 

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Home</title>
    <style type="text/css">
    label{
        display: inline-block;
        text-align: right;
        width: 100px;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .div-deg{
        background-color: RGB(0, 255, 165);
        width: 500px;
        min-height: 67vh;
        padding-top: 70px;
        padding-bottom: 70px;
    }
    
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="admin.css" />
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
   <?php 
   
   require "admin/admin_sidebar.php";
   
   ?>
   <div class="content">
   <center> 
       <h1>Update Student</h1>

     

<div class="div-deg">
 
 <form action="#" method="POST">
 <div> 
 <label>Username</label>
 <input type="text" name="name" value="<?php echo "{$info['username']}"; ?>">
 </div>
  


 <div> 
 <label>Email</label>
 <input type="text" name="email" value="<?php echo "{$info['email']}"; ?>">
 </div>

 <div> 
 <label>Phone</label>
 <input type="number" name="phone" value="<?php echo "{$info['phone']}"; ?>">
 </div>

 <div> 
 <label>Password</label>
 <input type="text" name="password" value="<?php echo "{$info['password']}"; ?>">
 </div>

 <div> 
 
 

 <input type="submit" id="clic" class="btn btn-primary" name="update" value="Update">
 </div>
 </form>
 </div>
 </center>

</div>

</body>
</html>
