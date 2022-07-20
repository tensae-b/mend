<?php 
// include ('search.php')
session_start();
if(!isset($_SESSION['login'])){
     header ('Location:../index.php');
     die();
}
 ?>
<!DOCTYPE html>
<html>
<head>
<title> Admin dashboard</title>
<link rel="stylesheet" href="../css/dashboard2css.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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

	<li ><a  href = "#" target= "_self" class= "active"><span class="dashboard"></span><span><i class="material-icons"> dashboard</i>  DASHBOARD</span> </a> </li>
	<li>
	<a href ="customer2.php" target= "_self"><span class="database"></span><span> <i class="material-icons">filter_list</i>CUSTOMER</span>  </a> </li>
        <li>
	<a href ="workerd.php" target= "_self"><span class=" database"></span><span> <i class="material-icons">filter_list</i>WORKER</span>  </a> </li>
	<li>
	<a href = "profilea.php" target= "_self"><span class=" setting"></span><span> <i class="material-icons">settings</i>  PROFILE</span>  </a> </li>
  <li>
	<a href = "Announcment.php" target= "_self"><span class=" setting"></span><span> <i class="material-icons">settings</i>  ANNOUNCEMENT</span>  </a> </li>
             
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
    <div class= "search">
     <span class= "searcher"></span>
     <form method="GET" action="">
      <i class="material-icons">search</i> 
   
     <input type="search"value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data" name="search"/>
     <input type="submit" value="search"/>
     </form>
    </div>
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
  <div class="cards">
    <div class="single-card">
         <div>
          
           <h2> 54 </h2>
          <span > customers</span>
         </div>

        <div>
           
          <span <i class="material-icons">people</i></span>
         </div>
          
      </div>
           
<div class="single-card">
         <div>
          
           <h2> 20 </h2>
          <span > workers</span>
         </div>

        <div>
           
          <span <i class="material-icons">people_outline</i></span>
         </div>
          
      </div>

     <div class="single-card">
         <div>
          
           <h2> 124</h2>
          <span >services</span>
         </div>

        <div>
           
          <span  <i class="material-icons">room_service</i></span>
         </div>
          
      </div>
      <div class="single-card">
         <div>
           
           <h2> 6k</h2>
          <span >Income</span>
         </div>

        <div>
           
          <span <i class="material-icons">attach_money</i></span>
         </div>
          
      </div>
          
</div>
    <div class="recent-grid">
      <div class="service-call">
      	<div class="card">

         	<div class="card-header">
                  <h3> Recent Service calls </h3>
                  
                    
                  <button class="card-header" onClick= "more()"> See all</button>
      		</div>
       		
		<div class="card-body">
                 
		<div class="resp-table">
                    
 		<table width= 100%>

		 <thead>
 		<tr>
                 <td> worker name </td>
                 <td> occupation </td>
                 <td> customer name </td>
                 <td> Date and time </td>
                 <td> status </td>
                 
		</tr>
		</thead>
    <?php

$db = mysqli_connect("localhost", "root", "", "menddatabase");
$select= "SELECT * FROM request JOIN worker_info ON worker_info.worker_id=request.worker_id JOIN customer_info ON customer_info.customer_id=request.customer_id JOIN worker_occup ON worker_occup.worker_id=worker_info.worker_id JOIN occupation ON occupation.occupation_id=worker_occup.occupation_id"; 
$result = mysqli_query($db, $select);
while ($row = mysqli_fetch_array($result)) {
 
  $workername=$row['worker_username'];
  $customname=$row['custom_username'];
  $status=$row['request_status'];
  $date=$row['request_dateTime'];
  $occup= $row['occupation_type'];
  if($status== "pending")
  {
    $color="status yellow";
  }else  if($status== "accepted"){
  $color="status green";
}else  if($status== "declined")
{
  $color="status red";
}
 
  $s=<<< EOT
       <div class="box" >
    
        <tbody>
          <tr>
          <td> $workername</td>
          <td> $occup</td>
          <td> $customname</td>
          <td> $date</td>
          <td> <span class= "$color"></span> $status </td>
          
          
          </tr>
        </tbody>
       
       </div>           
   
    EOT;

    echo $s;
}

    ?>
   <form method="post" action="../Control/export.php" align="center">  
                       <input type="submit" name="exports" value="Export order database" class="btn btn-success" />  
                  </form> 
         
	
		</table>
                </div>
                  
      		</div>
      	</div>
      </div>
      <div class="customers">
     	<div class="card">
         	<div class="card-header">
                  <h3> New customers </h3>
                    
                  <button onClick= "more()"> See all</button>
      		</div>
       		
		<div class="card-body">

 
    <?php

$db = mysqli_connect("localhost", "root", "", "menddatabase");
$select= "SELECT * FROM customer_info"; 
$result1 = mysqli_query($db, $select);
while ($row1 = mysqli_fetch_array($result1)) {
 
  $first=$row1['first_name'];
  $last=$row1['last_name'];
  $image=$row1['image'];

  $t=<<< EOT
          <div class="box" >
    <div class="customer">
      <div class="info">
      <img src= "../Model/image/$image" alt="../Model/image/blank.png" width= "60px" height= "60px" alt= "">
      <div>
      <h4> $first $last </h4>
      </div>
                          
      </div>
    

          </div> 
    EOT;
    echo $t;
}
       ?>




     

</main>
</div>
</div>
</body>
</html>




