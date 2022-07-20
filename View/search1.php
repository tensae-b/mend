<?php

// include ('search.php')
session_start();

?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>customer</title>



    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/customer.css">

    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            min-width: 350px;
            max-width: 300px;
            min-height: 300px;
            max-height: 500px;
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
    <!-- header section starts  -->

    <header>

        <a href="#" class="logo"> Mend <span>.</span></a>

        <form action="" method="GET">
            <!-- <input type="search" id="search-bar" />

            <label for="search-bar" class="fas fa-search"></label> -->
            <input type="text" value="<?php if (isset($_GET['search'])) {
                                            echo $_GET['search'];
                                        } ?>" name="search" placeholder="search worker">
            <input type="submit" value=">>" />
        </form>







        <div class="icons">
            <a href="index.php" class="fas fa-home"></a>


            <a href="#fav" class="fas fa-heart"></a>

            <div id="menu-bar" class="fas fa-bars"></div>
        </div>

    </header>



    <!-- header section ends -->

    <!-- navbar section  -->
    <?php
    $image =  $_SESSION['cimage'];
    $name = $_SESSION['customer_name'];
 

    $s = <<< EOT
        <nav class="navbar">
       
       

        <div class="user">
        <img src="image/$image" alt="">
            
            
        <h3>$name</h3>
      
        
        

        </h3>

        </div>
      EOT;

    echo "$s";

    ?>
    <div class="links">
        <form action="logout.php" method="POST">
            <button type="submit" name="logout">Logout</button>
        </form>

        <a href="#fav">Favourites</a>
        <a href="#cata">Catagories</a>
        <a href="#Rate">rate us</a>
        <a href="profile.php">profile<a>


    </div>

    <div id="close" class="fas fa-times"></div>

    </nav>
    <div> </div>

    <!-- home section starts  -->
    <!-- catagory section begins -->
    <h2 class="heading" id="cata" align="center"> our <span> Catagories</span></h2>
    <div class="container">
        <a href="dish.html">
            <div class="categories">
                <img src="resources/images/dish.jpg" alt="Satelite dish" class="item-image" />
                <div class="image-title"> Dish Technician</div>
            </div>

        </a>
        <a href="Electricians.html">
            <div class="categories">
                <img src="resources/images/electric.jpg" alt="electronics" class="item-image" />
                <div class="image-title"> Electrician </div>
            </div>

        </a>

        <a href="plumber.html">
            <div class="categories">
                <img src="resources/images/pipes.jpg" alt="pipes" class="item-image" />
                <div class="image-title"> Plumber </div>
            </div>

        </a>



    </div>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","menddatabase");
                                   

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM worker_info JOIN worker_occup ON worker_info.worker_id= worker_occup.worker_id JOIN occupation ON occupation.occupation_id=worker_occup.occupation_id WHERE CONCAT(first_name,last_name,worker_email) LIKE '%$filtervalues%'";
                                        $query_run = mysqli_query($con, $query);
                                      
                                        echo " <div class='cards'>";
                                        if(mysqli_num_rows($query_run)>=1)
                                        {
                                            
                                        
                                            while ($items = mysqli_fetch_array($query_run)) 
                                            {
                                                $image=$items['image'];
                                                $firstname=$items['first_name'];
                                                $lastname=$items['last_name'];
                                                $phonenum=$items['phone_num'];
                                                $email=$items['worker_email'];
                                                $city=$items['subcity'];
                                                $age=$items['age'];
                                                $expr= $items['exper_year'];
                                                $sex=$items['sex'];
                                                $occup=$items['occupation_type'];
                                                
                                                
                                                $s=<<< EOT
                                                <div class="box" id="technician1">
                                    
                                                    <div class="icons">
                                                        <button class="fas fa-heart" onclick="addtofavourites(technician1)"></button>
                                    
                                    
                                                    </div>
                                                    <img class="technician-image" src="image/$image" alt="">
                                                    <h3 class="title">$occup</h3>
                                                    <div class="stars">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star-half-alt"></i>
                                                    </div>
                                    
                                                    <div class="info">
                                                        <p>Name: $firstname $lastname </p>
                                                        <p>adress: $city</p>
                                                        <p>experience: $expr </p>
                                                    </div>
                                                    <form method="POST" action="order.php">
                                                  <input type="submit" class="btn" name= "order"  value= "order" />
                                                 
                                              
                                                </div>
                                              
                                            
                                            
                                            EOT;
                                                 
                                                 echo $s;
                                            }
                                               
                                                
                                            }
                                        
                                        else
                                        {
                                           
                                                echo "<P>".' No Record Found'. "</p>";
                                                
                                            
                                        }
                                    }
                                ?>
                                </footer>






<!-- customer js file link -->
<script src="js/customer1.js"></script>
</body>


</html>