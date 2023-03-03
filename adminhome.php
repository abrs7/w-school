<?php 

session_start();

if(!isset($_SESSION['username'])){
    header("location:login.php");
}
elseif($_SESSION['usertype'] == "student"){
    header("location:login.php"); 
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
   
</head>
<body>
   <?php 
   
   require "admin/admin_sidebar.php";
   
   ?>
   <div class="content">
      <h1>  SideBar Accordition </h1>
      <p>In this example, we have added an accordion and a dropdown menu inside the side navigation.
       <br>
Click on both to understand how they differ from each other.<br> The accordion will push down the content, while the dropdown lays over the content.</p>
    </div>
</body>
</html>