<!DOCTYPE html>
<html>
<head>
<style>
        .cardf {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            min-width: 300px;
            max-width: 300px;
            min-height: 200px;
            max-height: 700px;
            margin: auto;
            text-align: center;
            font-family: arial;
        }
        .card__sub-heading{
            font-size: 15px;
        }
        .heading-tertirary{
            font-size: 30px;
        }

    </style>

    </head>
    <body>
    <div class="box-container">
<?php

$local="localhost";
$user="root";
$data="menddatabase";
$con=mysqli_connect($local,$user);
mysqli_select_db($con,$data);

$action_type = $_GET['action_type'];
if(isset($action_type))
{
    session_start();
    $wid= $_GET['id'];
    
    $cid=  $_SESSION['customer_id'];
    $insert="INSERT INTO favourite (customer_id,worker_id) VALUES('$cid','$wid')";

/* if(mysqli_num_rows($insert)>=1){
    header('location:customer.php');
}else {*/

if($con->query($insert)  === true) {

    echo "<br>New record created<br>";
    header('location:customer.php');
}
else{
    echo "Error, check values".$insert."<br>".$con->error;
}


}
$wid=  $_SESSION["id"];
$cid=  $_SESSION['customer_id'];

$pe= "pending";

$db = mysqli_connect("localhost", "root", "", "menddatabase");
$select= "SELECT * FROM worker_info INNER JOIN favourite ON worker_info.worker_id= favourite.worker_id WHERE customer_id= $cid"; 
$result = mysqli_query($db, $select);

while ($row = mysqli_fetch_array($result)) {
    $image=$row['image'];
    $firstname=$row['first_name'];
    $lastname=$row['last_name'];
    $phonenum=$row['phone_num'];
    $email=$row['worker_email'];
    $city=$row['subcity'];
    $age=$row['age'];
    $sex=$row['sex'];
    $id= $row['worker_id'];
    
    if($row['statusw']==1)
    $stat="active";
 else
    $stat="inactive";
    
    

    $s=<<< EOT
           
            <div  class="cardf" >
            <div class="card__header">
            <div class="card__picture">
            <img class="technician-image" src="../Model/image/$image" style="width:100%"/>
            </div>
        </div>
        <div class="card__details">
        <h3 class="card__sub-heading">Name:  $firstname $lastname </h3>
        <h3 class="card__sub-heading">Address:  $city </h3>
        <h3 class="card__sub-heading">Availability:  $stat</h3>
        </div>
       
        <div class="card__footer">
        <a href="./wdetail.php?worker_id=$id&occup=$occup&experience=$expr " class="btn btn--green btn--small">Details</a>

        <a href="../Control/remove.php?action_type=removef&id=$id" class="btn btn-warning btn-style">remove</a>
        </div>

        </div>      
      EOT;
      
      echo "$s";
}

      
          
    
?>

</div>

</body>
</html>