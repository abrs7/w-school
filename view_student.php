<?php 
error_reporting(0);
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

$data = mysqli_connect($host, $user, $password, $db );

$sql =  "SELECT * FROM user WHERE usertype='student' ";

$result =mysqli_query($data, $sql);














?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Home</title>

    <style>
    
    .table_th{
        padding: 10px;
        font-size: 14px;
    }

    .table_td{
       padding: 10px;
       font-size: 14px;
       background-color: skyblue;

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
      <h1>Student List</h1>
<?php

if($_SESSION['message']){

echo $_SESSION['message'];


}
unset($_SESSION['message']);

?>


      <table border="2px">
      
       <tr>
       
      <th class="table_th">Username</th> 
      <th class="table_th">email</th> 
      <th class="table_th">Phone</th> 
      <th class="table_th">Password</th> 
      <th class="table_th">Delete</th>
      <th class="table_th">Update</th>



       
       </tr>
    <?php 
    while($stn=$result->fetch_assoc()){ 

    
    ?>
   
     <tr>
     
     <td class="table_td"> <?php echo $stn['username']; ?></td>
     <td class="table_td"><?php echo $stn['email']; ?></td>
     <td class="table_td"><?php echo $stn['phone']; ?></td>
     <td class="table_td"><?php echo $stn['password']; ?></td>
     
     
     <td class="table_td">  
       <?php  echo "<a class='btn btn-danger' onClick=\" javascript:return confirm('Are You Sure to Delete This Student'); \"
      href='delete.php?student_id={$stn['id']}'>Delete </a>"  ?>
      </td>



     <td class="table_td">
     <?php
     include "inporto.php";
     ?>
      </td>


     </tr>
     <?php
     
    }
     ?>


      </table>
      </center>

       </div>
</body>
</html>