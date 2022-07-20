<?php
session_start();
$db = mysqli_connect("localhost", "root", "", "menddatabase");


   ?>
<!DOCTYPE html>
<html>
<head>
<title> Profile </title>
<link rel="stylesheet" href="../css/dashboard2css.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<style> 
.profile img {

    width: 200px;
}
</style>

<script src="../js/setting.js" ></script>
</head>
<body>
  
  <div class="sidebar">
      <div class= "sidebar-title">
       <h2><span class="mend"></span> MEND </h2>
       </div>

   
   <div class="sidebar-menu">
      <ul>
<li ><a  href = "dashboard2.php" target= "_self" ><span class="dashboard"></span><span><i class="material-icons"> dashboard</i>  DASHBOARD</span> </a> </li>
	<li>
	<a href ="customer2.php" target= "_self" ><span class="database"></span><span> <i class="material-icons">filter_list</i>CUSTOMER</span>  </a> </li>
        <li>
	<a href ="workerd.php" target= "_self"><span class=" database"></span><span> <i class="material-icons">filter_list</i>WORKER</span>  </a> </li>
	<li>
	<a href = "#" target= "_self" class= "active"><span class=" setting"></span><span> <i class="material-icons">settings</i>  PROFILE</span>  </a> </li>
    <li>
	<a href = "Announcment.php" target= "_self"><span class=" setting"></span><span> <i class="material-icons">settings</i> Announcment</span>  </a> </li>
             

</ul>
 

   </div>
  </div>
<div class="maincontent">

<header>
   <h2>
     <lable for="nav-toggle">
      <span class= "bars"></span>
      </label>
      <i class="material-icons">format_list_bulleted</i> 
      Dashboard
   </h2>
    
    <?php
    $name =$_SESSION['admin_username'];
    $aimage= $_SESSION['aimage'];
    $x= <<< EOT
       <div class= "profile">
       <div>
       <img src= "../Model/image/$aimage" alt="../Model/image/blank.png"  width= "40px" height="40px">
       </div>
         

         <h4> $name <h4>
         <small> Super admin </small>  
     
          
   
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

$id=  $_SESSION['admin_id'];


$select="SELECT * FROM admin_info Where admin_id= '$id'";
$result = mysqli_query($db, $select);
while ($row = mysqli_fetch_array($result)) {
   
    $image=$row['image'];
    $username=$row['admin_username'];
    $firstname=$row['first_name'];
    $lastname=$row['last_name'];
    $phonenum=$row['phone_num'];
    $email=$row['admin_email'];
   
    

$s=<<<EOT
<div class="container">
				<div class="content">
					<h1 class = "heading"> Profile <span>Page</span></h1>
					
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
           <button style="background-color:#3d5654;" class="btn btn-primary type="submit" name="signa" >Upload new image</button>
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
                        
                    </div>
                    <!-- Form Group (email address)-->
                    <div class="mb-3">
                        <label style="color:gray;" class="small mb-1" for="inputEmailAddress">Email address</label>
                        <br><input class="form-control" id="inputEmailAddress" type="email" name= "email" placeholder="Enter your email address" value=$email>
                    </div>
                    <!-- Save changes button-->
              <button style="background-color:#3d5654;" type="submit" name="updatedataa" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
				</div>
			</div>
EOT;
  echo $s;
}
?>

</main>
</body>
</html>