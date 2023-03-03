<?php 

session_start();

if(!isset($_SESSION['username'])){
    header("location:login.php");
}
elseif($_SESSION['usertype'] == "student"){
    header("location:login.php"); 
}


$host ="localhost";

$user ="root";

$password ="";

$db ="schoolproject";

$data = mysqli_connect($host,$user,$password, $db);

$sql = "SELECT * FROM admission";

$result = mysqli_query($data, $sql);






?>
<!DOCTYPE html>
<html>
<head>



<?php 

include "admin/admin_css.css";

?>

</head>
<body>
<?php
   require "admin/admin_sidebar.php";
    
   
   ?>
   <div class="content">
     <h1>Successful Admission Lists</h1>
    <br> 
   <table border="5px"> 
     <tr>
     <th style="padding:20px;">Name</th>
     <th style="padding:20px;">Email</th>
     <th style="padding:20px;">Phone</th>
     <th style="padding:20px;">Message</th>
     </tr>

<?php  
 
while($info=$result->fetch_assoc()){




?>

     <tr>
     <th style="padding:20px"> <?php 
     echo "{$info['name']}"?></th>
     <th style="padding:20px">><?php 
     echo "{$info['email']}"?></th>
     <th style="padding:20px;">><?php 
     echo "{$info['phone']}"?></th>
     <th style="padding:20px;">><?php 
     echo "{$info['message']}"?></th>
     </tr>

     <?php 
};
     ?>
     </table>
    </div>
</body>
</html>