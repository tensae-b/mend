<?php


session_start();
if (!isset($_SESSION['login'])) {
    header('Location:../index.php');
    die();
}
$_SESSION['fav']="fav";
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
            max-height: 1500px;
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

        <form action="search1.php" method="GET">
            <!-- <input type="search" id="search-bar" />

            <label for="search-bar" class="fas fa-search"></label> -->
            <input type="text" value="<?php if (isset($_GET['search'])) {
                                            echo $_GET['search'];
                                        } ?>" name="search" placeholder="search worker">
            <input type="submit" value=">>" />

        </form>

        <?php
            //   if (isset($_GET['search'])) {
            //     header('Location:search1.php');
            //  }
        ?>






        <div class="icons">
            <a href="../index.php" class="fas fa-home"></a>


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
        <img src="../Model/image/$image" alt="">
            
            
        <h3>$name</h3>
        
        
        

        </h3>

        </div>
      EOT;

    echo "$s";

    ?>
    <div class="links">
        <form action="../Control/logout.php" method="POST">
            <button type="submit" name="logout">Logout</button>
        </form>

        <a href="#fav">Favourites</a>
        <a href="#cata">Catagories</a>
        <a href="#ord">Order List</a>
        <a href="filter2.php">Filter</a>
        <a href="profile.php">profile<a>


    </div>

    <div id="close" class="fas fa-times"></div>

    </nav>
    <div> </div>

    <!-- home section starts  -->
    <!-- catagory section begins -->
    <h2 class="heading" id="cata" align="center"> our <span> Catagories</span></h2>
    <div class="container">
        <a href="dish.php">
            <div class="categories">
                <img src="../Model/image/dish.jpg" alt="Satelite dish" class="item-image" />
                <div class="image-title"> Dish Technician</div>
            </div>

        </a>
        <a href="electrician.php">
            <div class="categories">
                <img src="../Model/image/electric.jpg" alt="electronics" class="item-image" />
                <div class="image-title"> Electrician </div>
            </div>

        </a>

        <a href="plum.php">
            <div class="categories">
                <img src="../Model/image/pipes.jpg" alt="pipes" class="item-image" />
                <div class="image-title"> Plumber </div>
            </div>

        </a>



    </div>


    <!-- category section ends -->



    <!-- technician section starts  -->

    <section class="product" id="product">


        <h2 class="heading">New <span> technicians</span></h2>

        <div class="box-container">
            <?php

            $db = mysqli_connect("localhost", "root", "", "menddatabase");
            $select = "SELECT * FROM worker_info JOIN worker_occup ON worker_info.worker_id= 
            worker_occup.worker_id JOIN occupation ON occupation.occupation_id=worker_occup.occupation_id";
            $result = mysqli_query($db, $select);

            

          

            while ($row = mysqli_fetch_array($result)) {
                $image = $row['image'];
                $firstname = $row['first_name'];
                $lastname = $row['last_name'];
                $phonenum = $row['phone_num'];
                $email = $row['worker_email'];
                $city = $row['subcity'];
                $age = $row['age'];
                $sex = $row['sex'];

                $occup = $row['occupation_type'];
                $expr = $row['exper_year'];

                $id = $row['worker_id'];

                $_SESSION["id"] = $row['worker_id'];
                $fav="fav";
                if($row['statusw']==1)
                $stat="active";
             else
                $stat="inactive";
                $s1 = <<<EOT
                    <div class="card">
                    <div class="card__header">
                    <div class="card__picture">
                    <img class="technician-image" src="../Model/image/$image" style="width:100%"/>
                     </div>
                <h2 class="heading-tertirary">
                <span>$occup</span>
                </h2>
        </div>
        <div class="card__details">
        <h3 class="card__sub-heading">Name:  $firstname $lastname </h3>
        <h3 class="card__sub-heading">Address:  $city </h3>
        <h3 class="card__sub-heading">Experience:  $expr </h3>
        <h3 class="card__sub-heading">Status:  $stat </h3>



        </div>
        <div class="card__footer">
        <a href="favorite.php?action_type=$fav & id=$id&worker_name=$firstname&occupation=$occup" class="btn btn-warning btn-style">favorites</a><br>
        <a href="./wdetail.php?worker_id=$id&occup=$occup&experience=$expr " class="btn btn--green btn--small">Details</a>
        </div>
     
        </div>
          
           
         
        
        
        EOT;
                echo "$s1";
            }
            ?>

        </div>

    </section>

   

   <section  class="product" id="fav">
        <div  class="heading title" id="fav"><span>Favourites</span></div>
        

            <div >
                <?php
                include("favorite.php");
                ?>
            </div>
        
   </section>
    <section class="product" id="ord">
        <div class="heading title" id="ord"><span>Order List</span></div>
        

            <div>
                <?php
                include("orderl.php");
                ?>
            </div>
    </section>
    

    <!--favourite section ends -->

    






    <!-- customer js file link -->
    <script src="../js/customer1.js"></script>
</body>


</html>