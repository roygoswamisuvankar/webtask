<?php
    include('session.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body>
        <div class="jumbotron text-center">
           <h1>Welcome to ABC High School</h1>
           <p></p>
           <div>
               <?php echo "<input type='button' value='Logout' onclick='window.location.href=\"logout.php?id=$id\"'>";?>
           </div>
        </div>
        <div class="container">
        <?php 
            echo '<img src="data:image/jpeg;base64,'.base64_encode($profile_image).'" height="200px" style="border-radius: 50%"><br>';
            echo $first_name."&nbsp;".$last_name."<br>";
            echo $email."<br>";
            echo "<input type='button' value='update your data' onclick='window.location.href=\"edit.php?id=$id\"'>&nbsp;&nbsp;";
            echo "<input type='button' value='Change Password' onclick='window.location.href=\"password.php?id=$id\"'>";
        ?>
        </div>
        
    </body>
</html>