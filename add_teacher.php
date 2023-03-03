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

if(isset($_POST['add_teacher'])){

 $name = $_POST['name'];
 $description = $_POST['description'];
 $file = $_FILES['image']['name'];

$dst = "./image/".$file;

$dst_db = "image/".$file;

move_uploaded_file($_FILES['image']['tmp_name'], $dst);

$sql = "INSERT INTO teacher(name,description,image) VALUES ('$name', '$description', '$dst_db')";

$result = mysqli_query($data, $sql);

if($result){

    header("location:add_teacher.php");
}





}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="og:title" content="Admin Page">
    <meta property="og:type" content="Website">
    <meta property="og:image" content="images/about">
    <meta property="og:url" content="http://localhost/student_managment/adminhome.php">

    <title>Admin Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="admin.css" />
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   <style>
   label{
       width: 100px;
       font-size: 14px;
       padding-top: 10px;
       padding-bottom: 10px;
   }
   .deg_form{
        background-color: RGB(255,165,0);
        padding-top: 70px;
        padding-bottom: 70px;
        width: 500px;
       
   }
   
   
   </style>
</head>
<body>
   <?php 
   
   require "admin/admin_sidebar.php";
   
   ?>
   <div class="content">
   <center> 
      <h1>Add Teacher</h1>

      <div class="deg_form">
      <!-- <form method="POST" action="#" enctype="mutipart/form-data" > 
       -->
       <form method="POST" action="#" enctype="multipart/form-data" > 

      <div>
      <label>Name</label>
      <input type="text" name="name" > 
      </div>
      
      <div> 
     <label>Description</label>
      <textarea name="description"> </textarea>
      </div>
      
      <div>  
      <label>Image</label>
      <input type="file" name="image" > 
      </div>
      <br>
      <div>
      <input type="submit" class="btn btn-primary" name="add_teacher" value="Add Teacher" > 
      </div>
      </form>



      </div>
      </center>
    </div>
</body>
</html>