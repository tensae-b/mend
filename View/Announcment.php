<?php
// include ('search.php')
session_start();
if (!isset($_SESSION['login'])) {
  header('Location:../index.php');
  die();
}
?>
<!DOCTYPE html>
<html>

<head>
  <title> Announcement</title>
  <link rel="stylesheet" href="../css/dashboard2css.css">
  
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  
  <style> 
textarea {
  width: 100%;
  height: 150px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  background-color: #f8f8f8;
  font-size: 16px;
  resize: none;
}
.post {
  background-color: #057370;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 15px;
  border-radius: 8px;
  
}
.logout {
  background-color: #057370;
  border: none;
  color: white;
  padding: 10px 17px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 10px;
  border-radius: 8px;
  
}
select{
  width: 200px;
  height: 30px;
  font-size: 15px;
  border-radius: 5px
}
.heading {
    text-align: center;
    margin-bottom: 3rem;
    font-size: 4rem;
    text-transform: capitalize;
    color: #334;
}
.heading span {
    color: #057370;
}

</style>
</head>

<body>

  <div class="sidebar">
    <div class="sidebar-title">
      <h2><span class="mend">MEND</span> </h2>
    </div>


    <div class="sidebar-menu">
      <ul>

        <li><a href="dashboard2.php" target="_self" class="active"><span class="dashboard"></span><span><i class="material-icons"> dashboard</i> DASHBOARD</span> </a> </li>
        <li>
          <a href="customer2.php" target="_self"><span class="database"></span><span> <i class="material-icons">filter_list</i>CUSTOMER</span> </a>
        </li>
        <li>
          <a href="workerd.php" target="_self"><span class=" database"></span><span> <i class="material-icons">filter_list</i>WORKER</span> </a>
        </li>
        <li>
          <a href="profilea.php" target="_self"><span class=" setting"></span><span> <i class="material-icons">settings</i> PROFILE</span> </a>
        </li>
        <a href="#" target="_self"><span class=" setting"></span><span> <i class="material-icons">settings</i> ANNOUNCEMENT</span> </a> </li>
      </ul>


    </div>
  </div>
  <div class="maincontent">

    <header>
      <h2>

        <span <i class="material-icons">format_list_bulleted</i></span>


        </label>
        Announcement
      </h2>
      
      <?php
      $name = $_SESSION['admin_username'];
      $aimage = $_SESSION['aimage'];
      $x = <<< EOT
       <div class= "profile">
    
           <img src= "../Model/image/$aimage" alt="profile"  width= "40px" height="40px">
         <div>

         <h4> $name <h4>
         <small> Super admin </small>  
     
          
   
      </div>
    EOT;
      echo $x;
      ?>
      <form action="../Control/logout.php" method="POST">
        <button type="submit" name="logout" class = "logout">Logout</button>
      </form>




    </header>
    <main>
    <h1 class = "heading"> Announcment <span>Page</span></h1>
      <form action="../Control/annonce.php" method="post">
        <select name="option"  style="max-width:90%;">
          <option value="Urgent"> Urgent </option>
          <option value="Event"> Event </option>
          <option value="Workers Only">Workers Only</option>
          <option value="Clients Only">Clients Only </option>
        </select>
        <br><br>
        <textarea name="message" rows="10" cols="30"></textarea><br>
        <input type="submit" name="post" value="POST" class="post"/>

      </form>

    </main>
  </div>
  
</body>
</html>