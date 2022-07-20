<?php 

$db = mysqli_connect("localhost", "root", "", "menddatabase");
session_start();
if(!isset($_SESSION['login'])){
     header ('Location:../index.php');
     die();
}
 ?>
<!DOCTYPE html>
<html>
<head>
<title>Worker dashboard</title>
<link rel="stylesheet" href="../css/dashboard2css.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<style>
    .toggle {
	position: relative;
	display: inline;
  }
  input[type="checkbox"] {
	position: relative;
	width: 100px;
	height: 40px;
	background: #bdc3c7;
	-webkit-appearance: none;
	border-radius: 20px;
	outline: none;
	transition: .4s;
	box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.2);
	cursor: pointer;
  }
  
  input:checked[type="checkbox"] {
	background: #c99c33;
  }
  
  input[type="checkbox"]::before {
	z-index: 2;
	position: absolute;
	content: "";
	left: 0;
	width: 40px;
	height: 40px;
	background: #fff;
	border-radius: 50%;
	transform: scale(1.1);
	box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
	transition: .4s;
  }
  
  input:checked[type="checkbox"]::before {
	left: 60px;
  }

  .l{
        display: inline-block;
    }
    .btn{
            background-color: red;
            border: none;
            color: white;
            padding: 5px 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            margin: 4px 2px;
            cursor: pointer;
           
        }
        .green{
            background-color: #3d5654;
        }
        .red{
            background-color: #3d5654;
        }
        .white{
            background-color: #3d5654;
        }
    .toggle {
	position: relative;
	display: inline;
  }
  input[type="checkbox"] {
	position: relative;
	width: 100px;
	height: 40px;
	background: #bdc3c7;
	-webkit-appearance: none;
	border-radius: 20px;
	outline: none;
	transition: .4s;
	box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.2);
	cursor: pointer;
  }
  
  input:checked[type="checkbox"] {
	background: #c99c33;
  }
  
  input[type="checkbox"]::before {
	z-index: 2;
	position: absolute;
	content: "";
	left: 0;
	width: 40px;
	height: 40px;
	background: #fff;
	border-radius: 50%;
	transform: scale(1.1);
	box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
	transition: .4s;
  }
  
  input:checked[type="checkbox"]::before {
	left: 60px;
  }

    </style>
<script> 
function more()
{
  alert("you are all caught up!");

}
</script>
</head>
<body>
  
  <div class="sidebar">
      <div class= "sidebar-title">
       <h2><span class="mend">MEND</span>  </h2>
       </div>

   
   <div class="sidebar-menu">
      <ul>

	<li ><a  href = "#" target= "_self" class= "active"><span class="dashboard"></span><span><i class="material-icons"> dashboard</i>  PROFILE PAGE</span> </a> </li>
	<li>
	<a href ="request.php" target= "_self"><span class="database"></span><span> <i class="material-icons">filter_list</i>REQUEST PAGE</span>  </a> </li>
       
        
</ul>
 

   </div>
  </div>
<div class="maincontent">
 
<header>
   <h2>
     
      <span <i class="material-icons">format_list_bulleted</i></span>
      
      
     </label>
      Dashboard
   </h2>
   <div class="l">
      
      <form method="post" action="../Control/on.php">
				
				<input type="submit" name="on" class='btn red' value="active" >
				
</form>
</div>
<div class="l">
					<form method="post" action="../Control/off.php">
				
				<input type="submit" name="off" class='btn green'value="inactive">
</form>        
</div>  
    <?php
     $name =$_SESSION['worker_name'];
     $wimage= $_SESSION['wimage'];
    $x= <<< EOT
       <div class= "profile">
       
       <img src= "../Model/image/$wimage" alt="profile"  width= "40px" height="40px">
     <div>

     <h4> $name <h4>
    

         
   
      </div>
      
    EOT;
    echo $x;
      ?>
      <form action="../Control/logout.php" method="POST">
        <button type="submit" name="logout" >Logout</button>
      </form>
        



</header>
<main>
                        
<?php
    $id= $_SESSION['worker_id'];

$select= "SELECT * FROM worker_info WHERE worker_id= '$id'";
$result = mysqli_query($db, $select);

$select1= "SELECT * FROM worker_info JOIN worker_occup ON worker_info.worker_id= worker_occup.worker_id JOIN occupation ON occupation.occupation_id=worker_occup.occupation_id WHERE worker_info.worker_id= '$id'";
$result1 = mysqli_query($db, $select1);
$row1 = mysqli_fetch_array($result1);

while ($row = mysqli_fetch_array($result)) {
   
    $image=$row['image'];
    $username=$row['worker_username'];
    $firstname=$row['first_name'];
    $lastname=$row['last_name'];
    $phonenum=$row['phone_num'];
    $email=$row['worker_email'];
    $city=$row['subcity'];
    $age=$row['age'];
    $sex=$row['sex'];
	$occup= $row1['occupation_type'];
      $expr= $row1['exper_year'];
   

$s=<<<EOT
<div class="container-xl px-4 mt-4">   
    <hr class="mt-0 mb-4">
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
					<button style="background-color:#3d5654;" class="btn btn-primary type="submit" name="signw" >Upload new image</button>
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
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <div class="col-md-6">
                                <label style="color:gray;" class="small mb-1" for="inputOrgName">Occupation</label>
                                <br><input class="form-control" id="inputOrgName" type="text" name= "occup" placeholder="Enter your Occupation" value=$occup>
                            </div>
                            <!-- Form Group (Experience)-->
                            <div class="col-md-6">
                                <label style="color:gray;" class="small mb-1" for="inputExperience">Experience</label>
                                <br><input class="form-control" id="inputExperience" type="text" name="expr" placeholder="Enter your Experience year" value=$expr>
                            </div>
                        </div>
                        <!-- Save changes button-->
						<button style="background-color:#3d5654;" type="submit" name="updatedataw" class="btn btn-primary">Save changes</button>
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
</section>
						
                        </div>
                     </div>
</body>
</html>