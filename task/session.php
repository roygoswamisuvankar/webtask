<?php
   $dbhost = "localhost";
   $dbname = "test";
   $dbuser = "root";
   $dbpass = "";

   $db = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select id,image, fname, lname,email,phone,pass from studentdata where email = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $id = $row['id'];
   $profile_image = $row['image'];
   $first_name = $row['fname'];
   $last_name = $row['lname'];
   $email = $row['email'];
   $phone_number = $row['phone'];
   $user_password = $row['pass']; 
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>