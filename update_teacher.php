<?php
//  error_reporting(0);
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



$sl =  "SELECT * FROM teacher ";

$res =mysqli_query($data, $sl);

while($info=$res->fetch_assoc()){ 


    if (isset($_GET['teacher_id'])) {
        $id = filter_var($_GET['teacher_id'], FILTER_SANITIZE_NUMBER_INT);
    } else {
        // Redirect to some error page
        // header("location:login.php");
        exit();
    }
    


}



$sql = "SELECT *  FROM teacher WHERE id= '$id'";

$result = mysqli_query($data,$sql);

$info = $result->fetch_assoc();





if(isset($_POST['update_teacher'])){
      
    $name = $_POST['name'];
    $description = $_POST['description'];
    
    $file = $_FILES['image']['name'];

    $dst = "./image/".$file;
    
    $dst_db = "image/".$file;
    
    move_uploaded_file($_FILES['image']['tmp_name'], $dst);
    
    
    
    

    
   
   
         



    $query = "UPDATE teacher SET  name = '$name', description = '$description', image = '$dst_db'  WHERE id= '$id' " ;

    $result2 = mysqli_query($data, $query);
    
    if($result2){
        echo "<script type='text/javascript'> alert('You have successfuly updates!!!'); </script>";

        header("location:view_teacher.php");
    }


}



 

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Update Teacher Profile</title>
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
       <h1>Update Teacher</h1>

     

<div class="div-deg">
 
 <form action="#" method="POST" enctype="multipart/form-data">
 <div> 
 <label>Name</label>
 <input type="text" name="name" value="<?php echo "{$info['name']}"; ?>">
 </div>
  


 <div> 
 <label>Description</label>
 <textarea type="text" name="description" ><?php echo "{$info['description']}"; ?></textarea>
 </div>

 <div> 
 <label>Teacher Old Image</label>
 
 <img style="height:75px; width:75px" src="<?php echo "{$info['image']}"; ?>">
 </div>
 <div> 
 <label>Teacher New Image</label>
 <input type="file" name="image"  > 
 <
 </div>
 

 <div> 
 
 

 <input type="submit" id="clic" class="btn btn-primary" name="update_teacher" value="Update">
 </div>
 </form>
 </div>
 </center>

</div>

</body>
</html>
