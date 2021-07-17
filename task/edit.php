<?php 
    include('session.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>update</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <style>
            *{
                margin: 0;
                padding: 0;
            }
        </style>
    </head>
    <body>
        <div class="container">
        <?php 
           $dbhost = "localhost";
           $dbname = "test";
           $dbuser = "root";
           $password = "";

           $mysqli = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        ?>
        <div class="jumbotron text-center">
           <h1>Updates your details</h1>
           <p></p>
        </div>
            <div class="">
            <form action="" method="POST" name="form1" enctype="multipart/form-data">
               <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($profile_image).'" height="200px"><br>';?><br>
               <input type="file" name="image" id="image" onchange="validateImage()" required><br/>
               <input type="text" name="fname" id="fname" value="<?php echo $first_name; ?>" required><br>
               <input type="text" name="lname" id="lname" value="<?php echo $last_name; ?>" required><br>
               <input type="text" name="email" id="email" value="<?php echo $email; ?>" required><br>
               <input type="text" name="phone" id="phone" value="<?php echo $phone_number; ?>" require>
               <input type="submit" name="update" value="Update">
            </form>
            <a href="welcome.php">Cancel</a>
            </div>
            <?php
                if(isset($_POST['update'])){
                    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
                    $fname = $_POST["fname"];
                    $lname = $_POST["lname"];
                    $email = $_POST["email"];
                    $phone = $_POST["phone"];

                    $update = mysqli_query($mysqli,"update studentdata set image = '$file', fname = '$fname', lname = '$lname', email = '$email', phone = '$phone' where id = '$id'");
                    if($update){
                        echo '<script>swal("Good job!", "You have update your data successfully!", "success");</script>';
                        echo "<script>window.open('welcome.php','_self')</script>";
                    }else{
                        echo '<script>swal("Oh!no", "Can not update your details", "error");</script>';
                    }
                }
            ?>
            <div>
                
            </div>
        </div>
    </body>
</html>