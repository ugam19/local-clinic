<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin profile</title>
</head>
<body>
    <?php
    include("../include/header.php");
  
    include("../include/connection.php");
  
    $ad = $_SESSION['admin'];
  
    $query= "SELECT *from admin WHERE username='$ad'";
  
    $res =mysqli_query($connect,$query);
  
    while($row = mysqli_fetch_array($res)){
  
        $username=$row['username'];


    }

    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                 <div class="col-md-2" style="margin-left:-30px;">
                 <?php
                 include("sidenav.php");
                 
                 ?>
                 </div>
                 <div class="col-md-10">
                    <div class="col-md-12">
                         <div class="row">

                             <div class="col-md-6" >
                             <form method="post">
                             <?php

                             if(isset($_POST['change'])){

                                 $uname =$_POST['uname'];

                                  if(empty($uname)){
                                      
                                  }else{
                                      $query= "UPDATE admin SET username='$uname' WHERE username='$ad'";

                                      $_res =mysqli_query($connect,$query);

                                      if($res){
                                          $_SESSION['admin']=$uname;
                                      }
                                  }
                             }
                             ?>
                             <label>Change username</label>
                             <input type="text" name="uname" class="form-control" autocomplete="off">
                             <input type="submit" name="change" class="btn btn-success" value="Change">
                             
                             </form>
                             <br><br>
                             <?php
                                if (isset($_POST['update_pass'])){
                                        $old_pass= $_POST['old_pass'];

                                        $new_pass= $_POST['new_pass'];

                                        $con_pass =$_POST['con_pass'];

                                        $error= array();
                                        $old=mysqli_query($connect,"SELECT * FROM admin WHERE username='$ad'");
                                        $row=mysqli_fetch_array($old);
                                        $pass= $row['password'];

                                        if(empty($old_pass)){
                                            $error['p']="enter old password";

                                        }else if(empty($new_pass)){
                                            $error['p']="enter new password";

                                        }else if(empty($con_pass)){
                                            $error['p']="confirm password";
                                        }else if($old_pass !=$pass){
                                            $error['p']="invalid old  password";

                                        }else if($new_pass != $con_pass){
                                            $error['p']=" both password does not match";
                                        }

                                            if (count($error)==0){
                                                $query="UPDATE admin SET password='$new_pass' WHERE username='$ad'";
                                                mysqli_query($connect,$query);

                                            }
                                             
                                        
                                            
                                    }
                                        if(isset($error['p'])){

                                            $e= $error['p'];
                                            $show="<h5 class='text-center alert alert-danger'>$e</h5>";
                                         }else{
                                             $show ="";
                                         }

                                
                             
                             ?>
                             <form method="post">
                             <h5 class="text-center my-4">Change password</h5>
                             <div>
                             <?php
                             echo $show;
                             ?>
                             </div>
                             <div class="form-group">
                             <label>old password</label><br>
                             <input type="password" name="old_pass" class="form-group">

                            
                             </div>
                             <div class="form-group">
                             <label>new password</label><br>
                             <input type="password" name="new_pass" class="form-group">

                            
                             </div>
                             <div class="form-group">
                             <label>confirm password</label><br>
                             <input type="password" name="con_pass" class="form-group">

                            
                             </div>
                             <input type="submit" name="update_pass" value="Update password" class="btn btn-info">
                             </form>
                             </div>
                         </div>
                      </div>
                  </div>
                 </div>
            </div>
        </div>
    </div>
</body>
</html>