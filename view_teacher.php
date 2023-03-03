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

$sql = "SELECT * FROM teacher  ";

$result = mysqli_query($data, $sql);

if(isset($_GET['teacher_id'])){
    $t_id = $_GET['teacher_id'];


    $sql2 = "DELETE FROM teacher WHERE id = '$t_id'";

    $result2 = mysqli_query($data, $sql2);

    if($result2){
    
     echo "<script type='text/javascript'>alert('You have successfully Deleted Selected Teacher')</script>" ;
     header("location:view_student.php");

    }
    else {
        echo "Error deleting record: " . mysqli_error($data);
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
   table{
       padding: 20px;
       font-size: 17px;
       width: 700px;
   }
   .table_th{
       padding: 20px;
       font-size: 18px;
   }

   #table_th{
    padding: 20px;
       font-size: 15px;
       text-align: center;
   }
   
   </style>
</head>
<body>
   <?php 
   
   require "admin/admin_sidebar.php";
   
   ?>
   <div class="content">
     <center>
     <h1>Teachers List</h1>
     
     <table border="3px">
     <tr>
     <th class="table_th">Name</th>
     <th class="table_th">Description</th>
     <th class="table_th">Image</th>
     <th class="table_th">Delete</th>
     <th class="table_th">Update</th>


     </tr>
     <?php  
     while($info=$result->fetch_assoc()){ 
     ?>
    <tr>
     <th class="table_th"> <?php echo"{$info['name']}"?> </th>
     <th class="table_th"><?php echo"{$info['description']}"?> </th>
     <th class="table_th"><img style="height:75px; wight: 75px" src="<?php echo"{$info['image']}"?>"> </th>
     <th class="table_th">
     <?php echo " <a class='btn btn-danger'
     onClick=\"javascript:return confirm('Are You Sure To delete this teacher')\";
     href='view_teacher.php?teacher_id={$info['id']}'>Delete</a>"; ?>
     </th>
     <th class="table_th">
     <?php echo " <a class='btn btn-primary'
     onClick=\"javascript:return confirm('Are You Sure To Update this teacher')\";
     href='update_teacher.php?teacher_id={$info['id']}'>Update</a>"; ?>
     </th>
   
     </tr>
    <?php  } ?>


     </table>





     </center>
    
    
    </div>
</body>
</html>