<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Patient Profile</title>
</head>
<body>
	<?php
    	include("../include/header.php");
    	include("../include/connection.php");
 	?>
 

 	<div class="container-fluid">
 		<div class="col-md-12">
 			<div class="row">
 				<div class="col-md-2" style="margin-left: -30px">
 					<?php

 					include("sidenav.php");

 						$patient=$_SESSION['patient'];
 						$query="SELECT * FROM patient WHERE username='$patient'";

 						$res=mysqli_query($connect,$query);
 						
 						$row=mysqli_fetch_array($res)

 					?>	
 				</div>
 				<div class="col-md-10">
 					<div class="col-md-12">
 						<div class="row">
 							<div class="col-md-6">
 							
 								<h5>Profile</h5>

 								<table class="table table-bordered">
 									<tr>
 										<th colspan="2" class="text-center">My Details</th>
 									</tr>

 									<tr>
 										<td>Firstname</td>
 										<td><?php echo $row['firstname'];?></td>
 									</tr>
 									<tr>
 										<td>Surname</td>
 										<td><?php echo $row['surname'];?></td>
 									</tr>
 									<tr>
 										<td>Username</td>
 										<td><?php echo $row['username'];?></td>
 									</tr>
 									<tr>
 										<td>Email</td>
 										<td><?php echo $row['email'];?></td>
 									</tr>
 									<tr>
 										<td>Phone Number</td>
 										<td><?php echo $row['phone'];?></td>
 									</tr>
 									<tr>
 										<td>Gender</td>
 										<td><?php echo $row['gender'];?></td>
 									</tr>
 									 								
 								</table>	 								


 							</div>
 							<div class="col-md-6">
 								<h5 class="text-center">Change Username</h5>
 									<?php
 									
 									if (isset($_POST['update'])) {
 										
 											$uname=$_POST['uname'];

 											if (empty($uname)) {
 												
 											}else{
 												$query="UPDATE patient SET username='$uname' WHERE username='$patient'";
 												$res=mysqli_query($connect,$query);

 												if($res){
 													
 													$_SESSION['patient']=$uname;
 												}
 											}
 									}

 									
 									?>
 								<form method="post">
 									<label>Enter Username</label>
 									<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
 									<input type="submit" name="update" class="btn btn-info my-2" value="Update Username">
 								</form>


 									<?php

 									if (isset($_POST['change'])) {
 										
 										$old=$_POST['old_pass'];
 										$new=$_POST['new_pass'];
 										$con=$_POST['con_pass'];

 										$q="SELECT * FROM patient WHERE username='$patient'";

 										$re=mysqli_query($connect,$q);

 										$row=mysqli_fetch_array($re);

 										if (empty($old)) {
 										 	echo"<script>alert('Enter old Password')</script>";
 										 }elseif (empty($new)) {
 										 	echo"<script>alert('Enter new Password')</script>";
 										 }elseif ($con != $new) {
 										 	echo "<script>alert('Both Password do not match')</script>";

 										 }elseif ($old != $row['password']) {
 										 	echo"<script>alert('Check the Password')</script>";
 										 }else{

 										 	$query="UPDATE patient SET password='$new' WHERE username='$patient'";

 										 	mysqli_query($connect,$query);
 										 }
 									}

 									?>


 								<h5 class="my-4 text-center">Change Password</h5>
 								<form method="post">
 									<label>Old Password</label>
 									<input type="password" name="old_pass" class="form-control" autocomplete="off" placeholder="Enter old Password">
 									<label>New Password</label>
 									<input type="password" name="new_pass" class="form-control" autocomplete="off" placeholder="Enter New Password">
 									<label>Confirm Password</label>
 									<input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Enter Confirm Password">
 									<input type="submit" name="change" class="btn btn-info my-2" value="Change Password">
 								</form>
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 			
 		</div>
 		
 	</div>
</body>
</html>