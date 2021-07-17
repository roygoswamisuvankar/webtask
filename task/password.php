<?php
    include('session.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>ABC School</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body>
        <?php
            $dbhost = "localhost";
            $dbname = "test";
            $dbuser = "root";
            $dbpass = "";
            
            $mysqli = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        ?>
        <div class="jumbotron text-center">
           <h1>Welcome to ABC High School</h1>
           <p></p>
           <div>
               
           </div>
        </div>
        <div class="container">
            <form name="change_password" accept="" method="POST">
                <label>Emaill Address</label>
                <input type="text" value="<?php echo $email ?>" name="email" readonly><br>
                <label>Old Password</label><br>
                <input type="password" value="" name="pass" required><br>
                <label>New Password</label><br>
                <input type="password" value="" name="pass2" required><br>
                <input type="submit" value="Change" name="change" >
            </form> 
            <?php
                if(isset($_POST['change'])){
                    $email = $_POST["email"];
                    $pass = $_POST["pass"];
                    $pass2 = $_POST["pass2"];
                    
                    if($pass == $user_password){
                        $update = mysqli_query($mysqli,"update studentdata set pass = '$pass2' where email = '$email'");
                        if($update){
                            echo '<script>swal("Good job!", "You have successfully updated your password", "success");</script>';
                            echo "<script>window.open('welcome.php','_self')</script>";
                        }else{
                            echo '<script>swal("Oh!no,", "Can not update your password", "error");</script>';
                        }
                    }else{
                        echo '<script>swal("Wrong!", "Old password not matched!", "warning");</script>';
                    }
                   
                }
               
            ?>
        </div>
        <a href="welcome.php">Cancel</a>
    </body>
</html>