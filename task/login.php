<!DOCTYPE html>
<html>
    
    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" crossorigin="anonymous"></script>
        <style>
            *{
                padding: 0;
                margin: 0;
                overflow-x: hidden;
            }
            input[type=password],[type=text]{
                padding: 3px 5px;
            }
            input[type=submit]{
                padding: 10px 15px;
                background-color: green;
                color: white;
                border: none;
                border-radius: 5px;
            }
            input[type=submit]:hover{
                cursor: pointer;
                background-color: greenyellow;
                color: while;
            }
            .container{
               text-align: center;
               width: 100vw;
            }
        </style>
    </head>
    <body>
    <div class="jumbotron text-center">
           <h1>Login to ABC High School</h1>
           <p>Login in your account</p>
          
        </div>
        <div class="container">
        <div>
            <form method="POST" name="mylogin">
                
                <input type="text" name="email" id="email" placeholder="Enter your email" required><br><br>
                
                <input type="password" name="pass" id="pass" placeholder="Enter your password" required><br><br>
                <input type="submit" name="login" value="Login" id="login">
            </form>
        </div>
            <br>
            <b>Don't want to login?<a href="index.html">Cancel</a>&nbsp;&nbsp;Not had an account?<a href="regis.php">Sign up</a></b>
        </div>
        <?php
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "test";

        $db = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
        session_start();
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $username = mysqli_real_escape_string($db,$_POST['email']);
            $password = mysqli_real_escape_string($db,$_POST['pass']); 

            $sql = "select *from studentdata where email = '$username' and pass = '$password'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            $active = $row['email'];
            $count = mysqli_num_rows($result);

            if($count == 1){
                $_SESSION['login_user'] = $username;
                header("location: welcome.php");
            }else{
                echo '<script>swal("Wrong!", "username or password wrong", "error")</script>';
            }
        }
    ?>
        <script type="text/javascript">
            $(document).ready(function(){
                var email_pattern = /^[a-z]+[a-z0-9._]+@[a-z]+\.[a-z]{2,5}$/;
                $("#login").click(function(){
                   var email =  $("#email").val();
                    if(!email.match(email_pattern)){
                        swal({
                                title: "Oh,No!",
                                text: "Please enter valid email",
                                icon: "warning",
                            })
                        return false;
                    }
                })
            })
        </script>
    </body>
</html>