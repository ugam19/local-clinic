<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>My Invoice</title>
</head>
<body>
	<?php
        include("../include/header.php");
        include("../include/connection.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
        	<div class="row">
        		<div class="col-md-2" style="margin-left: -30px;">
        			<?php
        				include("sidenav.php");
        			?>        			
        		</div>
        		<div class="col-md-10">
        			<h5 class="text-center my-2">My Invoice</h5>
        			<?php
        			$pat=$_SESSION['patient'];
        			$query="SELECT * FROM patient where username='$pat'";
        			$res=mysqli_query($connect,$query);
        			$row=mysqli_fetch_array($res);
        			$fname=$row['firstname'];
        			$querys=mysqli_query($connect,"SELECT * from income where patient='$fname'");
        			$output="";
        			$output.="
        				<table class='table table-bordered'>
        				<tr>
        					<td>ID</td>
        					<td>Doctor</td>
        					<td>Patient</td>
        					<td>Date Discharge</td>
        					<td>Amount Paid</td>
        					<td>Description</td>
        				</tr>
        			";
        			if (mysqli_num_rows($querys)<1) {
        				$output.="
        					<tr>
                                <td colspan='6' class='text-center'>No invoice Yet</td>
                            </tr>
                        ";
                    }
        			while($row=mysqli_fetch_array($querys)){
                        $output.="
                        <tr>
                    			<td>".$row['id']."</td>
        						<td>".$row['doctor']."</td>
        						<td>".$row['patient']."</td>
        						<td>".$row['date_discharge']."</td>
        						<td>".$row['amount_paid']."</td>
        						<td>".$row['description']."</td>
        						<td>
        							<a href='view.php?id=".$row['id']."'>
        								<button class='btn btn-info'>View</button>
        							</a>
        						</td>
        				";
        			}
        			$output.="</tr></table>";
        			echo $output;
        			?>
                
        		</div>
        	</div>
        </div>
    </div>

</body>
</html>