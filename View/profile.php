<?php
session_start();
$db = mysqli_connect("localhost", "root", "", "menddatabase");






?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Profile page</title>

	<!-- custom css file link  -->
	<link rel="stylesheet" href="../css/profile.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
	<style>
		
	</style>
</head>

<body>

	<!-- header section starts  -->

	<header>
		<div class="icons"><a href="customer.php" class="fas fa-arrow-left"></a></div>
		<a href="#" class="logo"> Mend <span>.</span></a>

		<div class="icons">
			<a href="../index.php" class="fas fa-home"></a>
		</div>

	</header>
	<!-- header section ends -->
    <div class="content">
	
	<h1 class = "heading" style="text-align: center;"> Profile <span>Page</span></h1>
</div>
		

	<?php
	$id =  $_SESSION['customer_id'];


	$select = "SELECT * FROM customer_info WHERE customer_id= '$id'";
	$result = mysqli_query($db, $select);
	while ($row = mysqli_fetch_array($result)) {

		$image = $row['image'];
		$username = $row['custom_username'];
		$firstname = $row['first_name'];
		$lastname = $row['last_name'];
		$phonenum = $row['phone_num'];
		$email = $row['custom_email'];
		$city = $row['subcity'];
		$age = $row['age'];
		$sex = $row['sex'];


		$s = <<<EOT
<div class="container-xl px-4 mt-4">   
    
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="../Model/image/$image" alt="../Model/image/blank.png">
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                    <!-- Profile picture upload button-->
					<form  action="../Control/image.php" id="register" class="input-group" method="POST"  enctype="multipart/form-data" >

					<input type="hidden" name="size" value="1000000" id= "images">
					<div>
					<input type="file" name="image">
					</div>
					<button  type="submit" name="signw" >Upload </button>
					</form>
                    
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
				    <form action="../Control/code.php" method="POST">
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label style="color:gray;" class="small mb-1" for="inputUsername">Username</label>
                            <br><input class="form-control" id="inputUsername" type="text" name= "uname" placeholder="Enter your username" value=$username>
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label style="color:gray;" class="small mb-1" for="inputFirstName">First name</label>
                                <br><input class="form-control" id="inputFirstName" type="text" name="fname" placeholder="Enter your first name" value=$firstname>
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label style="color:gray;" class="small mb-1" for="inputLastName">Last name</label>
                                <br><input class="form-control" id="inputLastName" type="text" name= "lname" placeholder="Enter your last name" value=$lastname>
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
						<!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label style="color:gray;" class="small mb-1" for="inputPhone">Phone number</label>
                                <br><input class="form-control" id="inputPhone" type="tel" name= "phone" placeholder="Enter your phone number" value=$phonenum>
                            </div>
                            
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                                <label style="color:gray;" class="small mb-1" for="inputLocation">Sub city</label>
                                <br><input class="form-control" id="inputLocation" type="text" name= "city" placeholder="Enter your location" value=$city>
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label style="color:gray;" class="small mb-1" for="inputEmailAddress">Email address</label>
                            <br><input class="form-control" id="inputEmailAddress" type="email" name= "email" placeholder="Enter your email address" value=$email>
                        </div>
						
                        <!-- Save changes button-->
						<button  type="submit" name="updatedataw" >Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

EOT;
		echo "$s";
	}
	?>

	<style type="text/css">
		body {
			margin-top: 20px;
			background-color: #f2f6fc;
			color: #69707a;
			font-size: 20px;
		}
        
		.img-account-profile {
			height: 10rem;
		}

		.rounded-circle {
			border-radius: 50% !important;
		}

		.card {
			box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
		}

		.card .card-header {
			font-weight: 500;
		}

		.card-header:first-child {
			border-radius: 0.35rem 0.35rem 0 0;
		}

		.card-header {
			padding: 1rem 1.35rem;
			margin-bottom: 0;
			background-color: rgba(33, 40, 50, 0.03);
			border-bottom: 1px solid rgba(33, 40, 50, 0.125);
		}

		.form-control,
		.dataTable-input {
			display: block;
			width: 100%;
			padding: 0.875rem 1.125rem;
			font-size: 15px;
			font-weight: 400;
			line-height: 1;
			color: #69707a;
			background-color: #fff;
			background-clip: padding-box;
			border: 1px solid #c5ccd6;
			-webkit-appearance: none;
			-moz-appearance: none;
			appearance: none;
			border-radius: 0.35rem;
			transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
		}

		.nav-borders .nav-link.active {
			color: #0061f2;
			border-bottom-color: #0061f2;
		}

		.nav-borders .nav-link {
			color: #69707a;
			border-bottom-width: 0.125rem;
			border-bottom-style: solid;
			border-bottom-color: transparent;
			padding-top: 0.5rem;
			padding-bottom: 0.5rem;
			padding-left: 0;
			padding-right: 0;
			margin-left: 1rem;
			margin-right: 1rem;
		}
	</style>

	<script type="text/javascript"></script>
</body>

</html>