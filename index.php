
<?php

error_reporting(0);
session_start();
session_destroy();
if($_SESSION['message']){
    $message = $_SESSION['message'];

    echo "<script type='text/javascript'>
    alert('$message');
    </script>" ;
}


   $host = "localhost";

   $user = "root";

   $password= "";

   $db = "schoolproject";

   $data = mysqli_connect($host, $user, $password, $db);

   $sql = "SELECT * FROM teacher";

   $result = mysqli_query($data, $sql);






?>



<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Student Managment System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <script src="main.js"></script>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
<body>
    <nav>
    <label class="logo">W-School</label>
    <ul>
    <li><a href="">Home</a></li>
    <li><a href="">Courses</a></li>
    <li><a href="">Admission</a></li>
    <li><a href="login.php" class="btn btn-success">Login</a></li>
    </ul>
    </nav>
    <div class="section1">
    <label class="img_text">We Teach Students with care.</label>
    <img class="main_img" src="images/school_management.jpg">
    </div>
    <div class="container">
    <div class="row">
    
    <div class="col-md-4">
    <img class="welcome_img" src="images/school2.jpg">
    
    
    </div>
    <div class="col-md-8">
        <h1 class="headings">Welcome to W-School</h1>
        <p>W-School is a modern and dynamic educational website that provides a comprehensive platform for students to access quality education and resources online. The website is designed to cater to the needs of students of all ages, from elementary to high school levels, and offers a diverse range of courses and activities to help students achieve their academic goals.

The website's user-friendly interface makes it easy for students to navigate and access the content they need. Whether it's math, science, literature, or history, W-School provides engaging and interactive resources that enable students to learn in a fun and effective way. The website also offers a variety of assessment tools and quizzes to help students test their knowledge and improve their skills.

In addition to academic courses, W-School also offers extracurricular activities such as sports, music, art, and drama, allowing students to develop their interests and talents outside the classroom. The website's online community also provides a platform for students to connect with each other and share their experiences and ideas.

With a team of highly qualified and experienced teachers and educators, W-School is committed to providing high-quality education and supporting students in their academic journey. Whether students are looking for extra help with their studies or seeking to advance their skills, W-School has everything they need to succeed.</p>
    </div>



    </div>
    
    </div>
    <center>
        <h1 class="headings">Our Teachers</h1>
    </center>
    <div class="container">
        <div class="row">


         <?php 
         while($info=$result->fetch_assoc())
         {

         
         ?>
            <!-- <h1><?php print_r($info['image']) ?> </h1> -->
            <div class="col-md-4">
          <img class="teacher" src="<?php echo "{$info['image']}"?>">
          <h2><?php echo "{$info['name']}"?></h2>
          <p><strong> <?php echo "{$info['description']}";   ?>
          </strong></p>
            </div>
            <?php
            }
            
            
            ?>
            
        </div>

    </div>
    <center>
        <h1 class="headings">Our Courses</h1>
</center>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <img class="courses" src="images/graphic.jpg">
            <h2>Graphics Designing</h2>
</div>

<div class="col-md-4">
            <img class="courses" src="images/web.jpg">
            <h2>Website Development</h2>
        </div>
        <div class="col-md-4">
            <img class="courses" src="images/marketing.png">
            <h2>Marketing</h2>
            
        </div>
    </div>
</div>
<center>
    <h1 class="adm headings" >Application Form</h1>
</center>
<div class="admission_form" align="center">
    <form action="data_check.php" method="POST">
        <div class="adm_int">
            <label class="label_text">Name</label>
            <input class="input_deg" type="text" name="name">
        </div>
        <div class="adm_int">
            <label class="label_text">Email</label>
            <input class="input_deg" type="text" name="email">
        </div>
        <div class="adm_int">
            <label class="label_text">Phone</label>
            <input class="input_deg" type="text" name="phone">
        </div>
        <div class="adm_int">
            <label class="label_msg">Message</label>
            <textarea class="text_msg" name="message">

            </textarea>
        </div>
        <div class="adm_int">
            
            <input class="btn btn-primary" id="sumit" type="submit" value="Apply" name="apply" >
        </div>
    </form>
</div>
<footer>
    <h2 class="footer_text">All @copyright reserved by BirLuz ICT Solutions  </h2>
</footer>
</body>
</html>