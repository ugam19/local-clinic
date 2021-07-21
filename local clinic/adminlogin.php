<?php
session_start();
?>
<?php
    include("include/connection.php");

    if (isset($_POST['login'])){

        $username = $_POST['uname'];
        $password = $_POST['pass'];

        $error= array();

        if(empty($username)){
            $error['admin'] ="Enter username";
        }else if(empty($password)){
            $error['admin'] ="Enter password";
        }
        if (count($error)==0){
            $query ="SELECT * FROM admin WHERE username='$username' AND password='$password'";
            $result = mysqli_query($connect,$query);
            
            if (mysqli_num_rows($result) == 1){
                echo"<script> alert('You have login as admin ')</script>";

                    $_SESSION['admin'] = $username;
                    header("Location:admin/index.php");
                    exit();
                 }else {
                     echo"<script> alert('Invalid username or password')</script>";

                 }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page</title>
</head>
<body style="background-image: url(image/back.jpg);background-repeat: no-repeat;background-size: cover;">
<?php
 include("include/header.php");
?>
 <div style="margin-top: 20px;"></div>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6  jumbotron">
                <img src="image/admin.jpg" class="col-md-12">
                <form method="post" class="my-2">
                    
                        <?php
                            if (isset($error['admin'])){

                                $sh =$error['admin'];

                                $show="<h4 class='alert alert-danger'>$sh</h4>";
                            }else{
                                $show="";
                            }
                                echo $show;

                        ?>
                                    
                    <div class="form-group">
                        <label> Username</label>
                        <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pass" class="form-control"placeholder="Enter password">
                    </div>
                    
                    <input type="submit" name="login" class="btn btn-success" value="Login">
                    

                </form>
            </div>
            </div>

           </div>   
        </div>   
</body>
</html>
    
     
