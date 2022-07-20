<!DOCTYPE html>
<html>
<head>
<style>
        .cards {
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

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="../css/customer.css">
<script> 
function more()
{
  alert("you are all caught up!");

}
</script>
</head>
<body>
<div class="box-container">
<?php
//session_start();
$local="localhost";
$user="root";
$data="menddatabase";
$con=mysqli_connect($local,$user);
mysqli_select_db($con,$data);
$cid=  $_SESSION['customer_id'];
$sel= "SELECT * FROM worker_info Join request ON worker_info.worker_id= request.worker_id WHERE request.customer_id= '$cid'  ";
$result = mysqli_query($con, $sel);
while ($row = mysqli_fetch_array($result)) {
    $image=$row['image'];
    $firstname= $row['first_name'];
    $lastname= $row['last_name'];
    $phone= $row['phone_num'];
    $date=$row['request_dateTime'];
    $status=$row['request_status'];
    $id=$row['request_id'];
    $city=$row['subcity'];
    
    if($row['statusw']==1)
    $stat="active";
 else
    $stat="inactive";

    $s=<<< EOT

    <div class="cards">
                    <div class="card__header">
                    <div class="card__picture">
                    <img class="technician-image" src="../Model/image/$image" style="width:100%"/>
                     </div>
                
        </div>
        <div class="card__details">
        <h3 class="card__sub-heading">Name:  $firstname $lastname </h3>
        <h3 class="card__sub-heading">Address:  $city </h3>
        <h3 class="card__sub-heading">Date: $date  </h3>
        <h3 class="card__sub-heading">Status:$status </h3>
        <h3 class="card__sub-heading">Availability:  $stat </h3>

        </div>
        <div class="card__footer">
        <a href="../Control/remove.php?action_type=remove&id=$id" class="btn btn-warning btn-style">remove</a>
        </div>
     
        </div>


EOT;
echo "$s";

}
?>
</div>

</body>
</html>