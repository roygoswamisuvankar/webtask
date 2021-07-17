<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" href="css/style.css">
        <script type="text/javascript" src="script/script.js"></script>
        <style>
           
        </style>
    </head>
    <body>
        <?php
            $connect = mysqli_connect("localhost","root","","test");
            if(isset($_POST["submit"])){
                $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
                $fname = $_POST["fname"];
                $lname = $_POST["lname"];
                $email = $_POST["email"];
                $phone = $_POST["phone"];
                $pass = $_POST["pass"];

                $query = "insert into studentdata(image,fname,lname,email,phone,pass) values('$file','$fname','$lname','$email','$phone','$pass')";

                if(mysqli_query($connect,$query)){
                    echo'<script>swal("Good job!", "Now you have success fully registered!", "success");</script>';
                }else{
                    echo '<script>swal("Wrong!", "You already use this email!", "error");</script>';
                }
            }
        ?>
        <div class="jumbotron text-center">
           <h1>Registration to ABC High School</h1>
           <p>Create your account</p>
           <div>
               
           </div>
        </div>
       <div class="container">
           <form name="myform" method="POST" enctype="multipart/form-data" onsubmit="return validation()">
                <table>
                    <thead></thead>
                    <tbody>
                        <tr>
                            <td><label>Upload your image</label></td>
                        </tr>
                        <tr>
                            <td><input type="file" name="image" id="image" onchange="validateImage()" required></td>
                        </tr>
                        <tr>
                            <td><label>First Name</label></td>
                            <td><label>Last Name</label></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="fname" id="fname" required></td>
                            <td><input type="text" name="lname" id="lname" required><br></td>
                        </tr>
                        <tr>
                            <td><label>Email Address</label></td>
                            <td><label>Phone Number<label></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="email" id="email" required><br></td>
                            <td><input type="text" name="phone" id="phone" maxlength="10" required><br></td>
                        </tr>
                        <tr>
                            <td><label>Choose Passeord<label></td>
                        </tr>
                        <tr>
                            <td><input type="password" name="pass" id="pass" required><br></td>
                            <td></td>
                        </tr>
                        <tr style="text-align: center;">
                            <td colspan="2"><input type="submit" name="submit" value="Sign up" id="submit"><br></td>
                        </tr>
                    </tbody>
                </table>  
           </form>
           <label style="float: right;">Already a user?<a href="login.php">Login</a> or <a href="index.html" style="color: red;"> Cancel</a></label>  
       </div>
    </body>
</html>