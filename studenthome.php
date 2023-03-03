<?php 

session_start();

if(!isset($_SESSION['username'])){
    header("location:login.php");
}
elseif($_SESSION['usertype'] == "admin"){
    header("location:login.php"); 
}


?>
<!DOCTYPE html>
<html>
<head>

<?php

 include "student_css.php";

?>



</head>
<body>
   <?php
   include "student_sidebar.php";
   ?>
   <div class="content">
      <h1>  SideBar Accordition </h1>
      <p>In this example, we have added an accordion and a dropdown menu inside the side navigation.
       <br>
Click on both to understand how they differ from each other.<br> The accordion will push down the content, while the dropdown lays over the content.</p>
    </div>
</body>
</html>