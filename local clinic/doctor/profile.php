<?php 
    session_start();

    error_reporting(0);
?>

<html>
<head>
    <title>Doctor's Profile Page</title>
</head>
<body>
    <?php 
        include("../include/header.php");
    ?> 

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php 
                        include("sidenav.php");
                        include("../include/connection.php");
                    ?>
                </div>
                <div class="col-md-10">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <?php 
                                    $doc= $_SESSION['doctor'];
                                    $query="SELECT * FROM doctors WHERE username='$doc'";

                                    $res= mysqli_query($connect,$query);
                                    $row= mysqli_fetch_array($res);

                                    
                                ?>
                                
                                <div class="my-3">
                                    <table class="table table-bordered">
                                        
                                            <tr>
                                                <th colspan="2" class="text-center">Details</th>
                                            </tr>

                                            <tr>
                                                <th>Firstname</th>
                                                <td><?php echo $row['firstname']; ?></td>
                                            </tr>

                                            <tr>
                                                <th>Surname</th>
                                                <td><?php echo $row['surname']; ?></td>
                                            </tr>

                                            <tr>
                                                <th>Username</th>
                                                <td><?php echo $row['username']; ?></td>
                                            </tr>

                                            <tr>
                                                <th>Email</th>
                                                <td><?php echo $row['email']; ?></td>
                                            </tr>

                                            <tr>
                                                <th>Mobile no.</th>
                                                <td><?php echo $row['phone']; ?></td>
                                            </tr>

                                            <tr>
                                                <th>Gender</th>
                                                <td><?php echo $row['gender']; ?></td>
                                            </tr>

                                            <tr>
                                                <th>Salary</th>
                                                <td><?php echo $row['salary'].""; ?></td>
                                            </tr>

                                            
                                        
                                    </table>
                                </div>


                            </div>
                        </div>
                        <div class="col-md-6">
                            <form method="post">
                            <h5 class="text-center my-2">Change Username</h5>
                            <?php 
                                if(isset($_POST['change'])){
                                   $uname=$_POST['uname'];
                                   if(empty($uname)){

                                   }else{
                                       $query="UPDATE doctors SET username='$uname' WHERE username='$doc'";
                                       $res= mysqli_query($connect,$query);

                                       if($res){
                                           $_SESSION['doctor']= $uname;
                                       }
                                   } 
                                }
                            ?>
                            
                                
                                <input type="text" name="uname" class="form-control" autocomplete="off" 
                                placeholder="Enter Username">
                                <br>
                                <input type="submit" name="change" class="btn btn-success"  
                                value="Change Username">
                                
                            </form>
                            <br><br>
                            <h5 class="text-center my-2">Change Password</h5>
                            <?php 
                                if($_POST['change_pass']){

                                    $old= $_POST['old_pass'];
                                    $new=$_POST['new_pass'];
                                    $con=$_POST['con_pass'];

                                    $ol="SELECT * FROM doctors WHERE username='$doc'";
                                    $ols= mysqli_query($connect,$ol);
                                    $row=mysqli_fetch_array($ols);

                                    if($old!= $row['password']){

                                    }else if(empty($new)){

                                    }else if($con != $new){

                                    }else{
                                        $query= "UPDATE doctors SET password='$new' WHERE username='$doc'";
                                        mysqli_query($connect,$query);
                                    }
                                }
                            ?>
                            <form method="POST">
                                <div class="form-group">
                                    <label>Old Password</label>
                                    <input type="password" name="old_pass" class="
                                    form-control" autocomplete="off"   
                                placeholder="Enter Old Password">
                                </div>
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" name="new_pass" class="
                                    form-control" autocomplete="off"   
                                placeholder="Enter New Password">
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" name="con_pass" class="
                                    form-control" autocomplete="off"   
                                placeholder="Confirm Password">
                                </div>
                                <input type="submit" name="change_pass" class="
                                btn btn-info" value="Change Password">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>