<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
	<?php
	include("include/header.php")
	?>
    <div style=" margin-top:50px;"></div>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4 mx-1 shadow">
                    <img src="image/patient.jpg" style="width: 100%;">
                    <h5  class="text-center">Patient Account</h5>
                    <a href="account.php">
                    <button  class="btn btn-success my-3" style="margin-left:15px">Sign Up</button>
                	</a>
				</div>
                <div class="col-md-4 mx-1 shadow">
                    <img src="image/doctor1.jpg" style="width: 100%;">
                    <h5  class="text-center">Doctor Account</h5>
                    <a href="apply.php">
                    <button  class="btn btn-success my-3" style="margin-left:15px">Sign Up</button>
                    </a>
				</div>
			</div>
        </div>
    <div>

</body>
</html>