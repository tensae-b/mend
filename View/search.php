


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

<style>
summary{
    
    font-size:1.8rem;
}

pre{
    font-size:1.2rem;

}
p{

    font-size:2.1rem;
}
    </style>

</head>
<body>
  
  <div class="sidebar">
      <div class= "sidebar-title">
       <h2><span class="mend">MEND</span>  </h2>
       </div>

   
   <div class="sidebar-menu">
   <ul>

<li ><a  href = "dashboard2.php" target= "_self" ><span class="dashboard"></span><span><i class="material-icons"> dashboard</i>  DASHBOARD</span> </a> </li>
<li>
<a href = "customer2.php" target= "_self" ><span class="database"></span><span> <i class="material-icons">filter_list</i>CUSTOMER</span>  </a> </li>
      <li>
<a href ="workerd.php" target= "_self"><span class=" database"></span><span> <i class="material-icons">filter_list</i>WORKER</span>  </a> </li>
<li>
<a href = "profilea.php" target= "_self"><span class=" setting"></span><span> <i class="material-icons">settings</i>  PROFILE</span>  </a> </li>
      


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
    
       <div class= "profile">
    
           <img src= "../resources/images/profile.jpg" alt="profile"  width= "40px" height="40px">
         <div>
         <h4> Alem Mengestu <h4>
         <small> Super admin </small>  
     
          
   
      </div>
        </div>



</header>
 <main>

                                <?php 
                                    $con = mysqli_connect("localhost","root","","menddatabase");
                                   

                                    if(isset($_GET['search']))
                                    {
                                   
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM customer_info WHERE CONCAT(first_name,last_name,custom_email) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($con, $query);
                                      

                                        

                                        echo " <div class='cards'>";
                                        //if(mysqli_num_rows($query_run) > 0)
                                       /* if($query_run) 
                                        {
                                            foreach($query_run as $items)*/
                                            if(mysqli_num_rows($query_run)>=1)
                                            {
                                            while ($row = mysqli_fetch_array($query_run)) 
                                            {
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
                                                      <form method="POST" action="remove.php">
                                                      <input type="submit" name= "remove" value= "remove account" />
                                                        
                                                      </form>
                                                    
                                                    </details>
                                                  </div>
                                                      
                                                </div>
                                                EOT;

 echo $s;

                                                                                                
                                              
         
   
 

                                                
                                            }
                                          }elseif(isset($_GET['searchw']))
                                          {
                                            $filtervalues = $_GET['search'];
                                            $query = "SELECT * FROM worker_info JOIN worker_occup ON worker_info.worker_id= worker_occup.worker_id JOIN occupation ON occupation.occupation_id=worker_occup.occupation_id WHERE CONCAT(first_name,last_name,worker_email) LIKE '%$filtervalues%'";
                                            $query_run = mysqli_query($con, $query);
                                          
    
                                            
    
                                            echo " <div class='cards'>";
                                            
                                                if(mysqli_num_rows($query_run)>=1)
                                                {
                                                while ($row = mysqli_fetch_array($query_run)) 
                                                {
                                                  $image=$row['image'];
                                            $firstname=$row['first_name'];
                                            $lastname=$row['last_name'];
                                            $phonenum=$row['phone_num'];
                                            $email=$row['worker_email'];
                                            $city=$row['subcity'];
                                            $age=$row['age'];
                                            $sex=$row['sex'];
                                            $id= $row['worker_id'];
                                            $_SESSION["id"]=$id;
                                            $occup= $row['occupation_type'];
                                                $expr= $row['exper_year'];
                                                  $s= <<< EOT
                                                    <div class="single-card" id= "b">
                                                      <div>
                                                          
                                                      <details>
                                                      <summary> <img src="../Model/image/$image"><p>$firstname $lastname</p> </summary>
                                                      <br>
                                                      <pre> About: $id </pre>
                                                      <pre> phone number: $phonenum       email: $email  </pre>
                                                      <pre>Subcity:$city                Gender:  $sex</pre>
                                                      <pre> Age:$age                      occuation: $occup </pre>
                                                      <pre> experience year:$expr                     </pre>
                                                      <form method="POST" action="remove.php">
                                                      <input type="submit" name= "remove" value= "remove account" />
                                                            
                                                      </form>
                                                        
                                                       </details>
                                                      </div>
                                                          
                                                    </div>
                                                    EOT;
    
     echo $s;

                                          }
                                        }
                                      }
                                        else
                                        {
                                           
                                          echo "<P>".' No Record Found'. "</p>";
                                                
                                            
                                        }
                                      }
                                ?>
                         

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
               

</main>
</div>
</div>
</body>
</html>