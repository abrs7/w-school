
<?php 

session_start();

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

if(isset($_POST['add_student'])){

$add_name = $_POST['add_name'];
$add_phone = $_POST['add_phone'];
$add_email = $_POST['add_email'];
$add_password = $_POST['add_password'];
$add_usertype = "student";

$check = "SELECT * FROM user WHERE username = '$add_name'";

$check_user = mysqli_query($data, $check);

$row_count = mysqli_num_rows($check_user);

if($row_count==1){

    echo "<script type='text/javascript'>alert('Username already exist. Try Another one!!!') </script>";
}


else{   



$sql = "INSERT INTO user(username,phone,email,usertype,password) VALUES ('$add_name', '$add_phone', '$add_email', '$add_usertype', '$add_password')";

$result = mysqli_query($data, $sql);



if($result){
  echo "
  <script type='text/javascript'>
   alert('You have successfully upload it!!') 
   </script>
   
  ";
  header("location:adminhome.php");
}else{
  echo "Something Wrong";
  header("location:adminhome.php");
    echo " <script type='text/javascript'>
   alert('Something goes wrong!!') 
   </script>";
}

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
        background-color: RGB(255, 165, 0);
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
   
</head>
<body>
   <?php 
   
   require "admin/admin_sidebar.php";
   
   ?>
   <div class="content">
   <center> 
       <h1>Add Student</h1>

     

<div class="div-deg">
 
 <form action="#" method="POST">
 <div> 
 <label>Username</label>
 <input type="text" name="add_name">
 </div>

 <div> 
 <label>Email</label>
 <input type="text" name="add_email">
 </div>

 <div> 
 <label>Phone</label>
 <input type="number" name="add_phone">
 </div>

 <div> 
 <label>Password</label>
 <input type="text" name="add_password">
 </div>

 <div> 
 
 <input type="submit" id="clic" class="btn btn-primary" name="add_student" value="Register">
 </div>
 </form>
 </div>
 </center>

</div>

</body>
</html>