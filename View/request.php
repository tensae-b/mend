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
<title>request</title>
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

	<li ><a  href = "worker2.php" target= "_self" class= "active"><span class="dashboard"></span><span><i class="material-icons"> dashboard</i>  PROFILE PAGE</span> </a> </li>
	<li>
	<a href ="#" target= "_self"><span class="database"></span><span> <i class="material-icons">filter_list</i>REQUEST PAGE</span>  </a> </li>
  <li>
	<form action="../Control/logout.php" method="POST">
        <button type="submit" name="logout" >Logout</button>
      </form></li>
        
        
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
    
    <?php
     $name =$_SESSION['worker_name'];
     $wimage= $_SESSION['wimage'];
    $x= <<< EOT
       <div class= "profile">
       
       <img src= "../Model/image/$wimage" alt="../Model/image/blank.png"  width= "40px" height="40px">
     <div>

     <h4> $name <h4>
    

         
   
      </div>
     
    EOT;
    echo $x;
      ?>
      
        



</header>
<main>
                        
<?php


$db = mysqli_connect("localhost", "root", "", "menddatabase");
$wid= $_SESSION['worker_id'];


$select= "SELECT * FROM worker_info  JOIN request ON worker_info.worker_id=request.worker_id JOIN customer_info ON customer_info.customer_id=request.customer_id Where request.worker_id = $wid";
$result = mysqli_query($db, $select);

while ($row = mysqli_fetch_array($result)) 
{
	$status=$row['request_status'];
	
  $image=$row['image'];
  $firstname=$row['first_name'];
  $lastname=$row['last_name'];
  $phonenum=$row['phone_num'];
  $email=$row['custom_email'];
  $city=$row['subcity'];
  $age=$row['age'];
  $sex=$row['sex'];
  $id= $row['worker_id'];
  $_SESSION["cid"]= $row['customer_id'];
$cid=$row['customer_id'];
  $_SESSION["id"]=$id;
      $desc=$row['request_descrip'];
 
      $s=<<< EOT
                    <div class="card">
                                  <div class="card__header">
                                  <div class="card__picture">
                                  <img class="technician-image" src="../Model/image/$image" />
                                  </div>
                              
                      </div>
                      <div class="card__details">
                      <h3 class="card__sub-heading">Name:  $firstname $lastname </h3>
                      <h3 class="card__sub-heading">Address:  $city </h3>
                      <h3 class="card__sub-heading">phone number:  $phonenum </h3>
                      <h3 class="card__sub-heading">problem:  $desc </h3>
              
                      <div class="card__footer">
                      <a href="../Control/accept.php?action_type=accept&id=$cid" class="btn btn-warning btn-style">Accept</a>
                      <a href="../Control/decline.php?action_type=decline&id=$cid" class="btn btn-warning btn-style">Decline</a>
                      </div>
                   
                      
                  
                      </div>
            
          
        
        
        EOT;
       
        
        echo $s;

        }



?>

						
                      
</body>
</html>