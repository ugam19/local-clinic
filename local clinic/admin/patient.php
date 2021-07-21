<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Total Patient</title>
</head>
<body>

	<?php

	include("../include/header.php");
	include("../include/connection.php");

	?>
	<div class="container-fluid">
		<div class="col-mod-12">
			<div class="row">
				<div class="col-md-2" style="margin-left: -30px;">
					<?php
					include("sidenav.php");
					?>
				</div>
				<div class="col-mod-10">
					<h5 class="text-center my-3">Total Patient</h5>
					
					<?php

						$query="SELECT * FROM patient";

						$res=mysqli_query($connect,$query);
						$output="";
						$output.="

						<table class='table table-bordered'>
							<tr>
								<td>ID</td>
								<td>Firstname</td>
								<td>Surname</td>
								<td>Username</td>
								<td>Email</td>
								<td>Phone</td>
								<td>Gender</td>
								<td>Date Reg.</td>
								</tr>
								";
						if (mysqli_num_rows($res)<1) {
						$output.="

						<tr>
						<td class='text-center' colspan='10'>No Patient Yet</td>
						</tr>

						";
						}

						while ($row=mysqli_fetch_array($res)) {
						$output.="

						<tr>
						<td>".$row['id']."</td>
						<td>".$row['firstname']."</td>
						<td>".$row['surname']."</td>
						<td>".$row['username']."</td>
						<td>".$row['email']."</td>
						<td>".$row['phone']."</td>
						<td>".$row['gender']."</td>
						<td>".$row['date_reg']."</td>
						<td>
							<a href='view.php?id=".$row['id']."'>
								<button class='btn btn-info'>View</button>
							</a>
						</td>

						";
						}

						$output.="
						</tr>
						</table>";
						echo $output;
					?>
				</div>	
			</div>
		</div>
	</div>

</body>
</html>