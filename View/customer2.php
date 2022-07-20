<?php
session_start();
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "menddatabase");
  $result = mysqli_query($db, "SELECT * FROM customer_info");
  ?>


<!DOCTYPE html>
<html>
<head>
<title> customer database</title>
<link rel="stylesheet" href="../css/customer2css.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<style>
summary{
    
    font-size:1.8rem;
}

pre{
    font-size:1.2rem;

}
.cards {
     display: grid;
     grid-template-columns: repeat(3,6fr);
     grid-gap: 1rem;
     margin-top:1rem;
}

.single-card{
      display: flex;
      justify-content: space-between;
      background: #fff;
       padding: 1rem;
       border-radius:2px;
    

}

.single-card:hover
{
  background:var(--maincolor);
   color:#fff;
}
    </style>
<script src="../js/database.js"> </script>
</head>
<body>
  <input type= "checkbox" id= "nav-toggle">
  <div class="sidebar">
      <div class= "sidebar-title">
       <h2><span class="mend"></span> MEND </h2>
       </div>

   
   <div class="sidebar-menu">
      <ul>

	<li ><a  href = "dashboard2.php" target= "_self" ><span class="dashboard"></span><span><i class="material-icons"> dashboard</i>  DASHBOARD</span> </a> </li>
	<li>
	<a href = "#" target= "_self" class= "active"><span class="database"></span><span> <i class="material-icons">filter_list</i>CUSTOMER</span>  </a> </li>
        <li>
	<a href ="workerd.php" target= "_self"><span class=" database"></span><span> <i class="material-icons">filter_list</i>WORKER</span>  </a> </li>
	<li>
	<a href = "profilea.php" target= "_self"><span class=" setting"></span><span> <i class="material-icons">settings</i>  PROFILE</span>  </a> </li>
  <li>
	<a href = "Announcment.php" target= "_self"><span class=" setting"></span><span> <i class="material-icons">settings</i> ANNOUNCEMENT</span>  </a> </li>
                


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
   <div class= "search">
     <span class= "searcher"></span>
     <form method="GET" action="search.php">
      <i class="material-icons">search</i> 
   
     <input type="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data" name="search"/>
     <input type="submit" value="search" name= "search"/>
     </form>
    </div>
    
    <?php
   
    $name =$_SESSION['admin_username'];
    $aimage= $_SESSION['aimage'];
    $x= <<< EOT
       <div class= "profile">
    
           <img src= "../Model/image/$aimage" alt="../Model/image/blank.png"  width= "40px" height="40px">
         <div>

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
    /*while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img src='image/".$row['image']."' >";
      	echo "<p>".$row['username']."</p>";
      echo "</div>";
    }*/

    echo " <div class='cards'>";
    while ($row = mysqli_fetch_array($result)) {
      $image=$row['image'];
      $firstname=$row['first_name'];
      $lastname=$row['last_name'];
      $phonenum=$row['phone_num'];
      $email=$row['custom_email'];
      $city=$row['subcity'];
      $age=$row['age'];
      $sex=$row['sex'];
      $id= $row['customer_id'];
      $_SESSION["id"]=$id;

      


 $s= <<< EOT
<div class="single-card" id= "b">
  <div>
      
   <details>
      <summary> <img src="../Model/image/$image"><p>$firstname $lastname</p> </summary>
      <br>
      <pre> About: $id </pre>
      <pre> phone number: $phonenum       email: $email  </pre>
      <pre>Subcity:$city                Gender:  $sex</pre>
      <pre> Age:$age                       </pre>
      
      </details>
      </div>
      <div class="icon">
        <a href="../Control/remove.php?action_type=removec&id=$id" class="btn btn-warning btn-style">remove</a>
        </div>
           
     </div>
   
EOT;




 
 echo $s;
 
 
 
    }
    ?>
    
   
  </main>
  <form method="post" action="../Control/export.php" align="center">  
                     <input type="submit" name="exportc" value="Export customer database" class="btn btn-success" />  
                </form> 
  </body>
  </html>