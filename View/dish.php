<
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

        

           



       

        <div class="icons">
            <a href="../index.php" class="fas fa-home"></a>


            <a href="#fav" class="fas fa-heart"></a>

            <div id="menu-bar" class="fas fa-bars"></div>
        </div>

    </header>



    <!-- header section ends -->

    <!-- navbar section  -->
    <?php
    session_start();
    $image =  $_SESSION['cimage'];
    $name = $_SESSION['customer_name'];
 

    $s = <<< EOT
        <nav class="navbar">
       
       

        <div class="user">
        <img src="../Model/image/$image" alt="../Model/image/blank.png">
            
            
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

        
        
        <a href="profile.php">profile<a>


    </div>

        <div id="close" class="fas fa-times"></div>

    </nav>
    <div> </div>

    <!-- home section starts  -->
    
    <!-- technician section starts  -->

    <section class="product" id="product">
      
    
        <h2 class="heading"> <span> Dish Technicians</span></h2>

        <div class="box-container">
    <?php

$local="localhost";
$user="root";
$data="menddatabase";
$con=mysqli_connect($local,$user);
mysqli_select_db($con,$data);


$sel= "SELECT * FROM worker_info JOIN worker_occup ON worker_info.worker_id= 
worker_occup.worker_id JOIN occupation ON occupation.occupation_id=worker_occup.occupation_id 
WHERE occupation.occupation_id=3"; 
$res = mysqli_query($con, $sel);



while ($r = mysqli_fetch_array($res)) {
    $image=$r['image'];
    $firstname=$r['first_name'];
    $lastname=$r['last_name'];
    $phonenum=$r['phone_num'];
    $email=$r['worker_email'];
    $city=$r['subcity'];
    $age=$r['age'];
    $sex=$r['sex'];
    $id= $r['worker_id'];
    $occup = $r['occupation_type'];
    $expr= $r['exper_year'];
    $_SESSION["id"]=$id;
    
    if($r['statusw']==1)
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
        <a href="favorite.php?action_type=favorite&id=$id&worker_name=$firstname&occupation=$occup" class="btn btn-warning btn-style">favorites</a><br>
        
        <a href="./wdetail.php?worker_id=$id&occup=$occup&experience=$expr " class="btn btn--green btn--small">Details</a>
        </div>
     
        </div>
          
           
         
        
        
        EOT;
                echo "$s1";
            }
            ?>

        </div>

    </section>

         <!--   <div class="box" id="technician2">

                <div class="icons">
                    <button class="fas fa-heart" onclick="addtofavourites(technician2)"></button>

                </div>
                <img src="../resources/images/dishtechnician2.jpg" alt="">
                <h3>Electrician</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>

                <div class="info">
                    <p>Name: Selam </p>
                    <p>adress: Alembank</p>
                    <p>experience: 3 years </p>
                </div>
                <a href="#" class="btn  " id="button" onclick="pending()">Book</a>
            </div>
            <div class="box" id="technician3">

                <div class="icons">
                    <button class="fas fa-heart" onclick="addtofavourites(technician3)"></button>

                </div>
                <img src="../resources/images/dishtechnician3.jpg" alt="">
                <h3>Plumber</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>

                <div class="info">
                    <p>Name: Abebe </p>
                    <p>adress: Alembank</p>
                    <p>experience: 3 years </p>
                </div>
                <a href="#" class="btn  " id="button" onclick="pending()">Book</a>
            </div>
            <div class="box" id="technician4">

                <div class="icons">
                    <button class="fas fa-heart" onclick="addtofavourites(technician4)"></button>

                </div>
                <img src="../resources/images/dishtechnician4.jpg" alt="">
                <h3>Dish Technician</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>

                <div class="info">
                    <p>Name: Soliyana </p>
                    <p>adress: Alembank</p>
                    <p>experience: 3 years </p>
                </div>
                <a href="#" class="btn  " id="button" onclick="pending()">Book</a>
            </div>
            <div class="box" id="technician5">

                <div class="icons">
                    <button class="fas fa-heart" onclick="addtofavourites(technician5)"></button>

                </div>
                <img src="../resources/images/dishtechnician5.jpg" alt="">
                <h3>Plumber</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>

                <div class="info">
                    <p>Name: Yirga </p>
                    <p>adress: Alembank</p>
                    <p>experience: 3 years </p>
                </div>
                <a href="#" class="btn  " id="button" onclick="pending()">Book</a>
            </div>

            <div class="box" id="technician6">

                <div class="icons">
                    <button class="fas fa-heart" onclick="addtofavourites(technician6)"></button>

                </div>
                <img src="../resources/images/dishtechnician5.jpg" alt="">
                <h3>Electrician</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>

                <div class="info">
                    <p>Name: Abebe </p>
                    <p>adress: Alembank</p>
                    <p>experience: 3 years </p>
                </div>
                <a href="#" class="btn">Book</a>
            </div>
            <div class="box" id="technician7">

                <div class="icons">
                    <button class="fas fa-heart" onclick="addtofavourites(technician7)"></button>

                </div>
                <img src="../resources/images/dishtechnician6.jpg" alt="">
                <h3>Plumber</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>

                <div class="info">
                    <p>Name: Abebe </p>
                    <p>adress: Alembank</p>
                    <p>experience: 3 years </p>
                </div>
                <a href="#" class="btn  " id="button" onclick="pending()">Book</a>
            </div>

            <div class="box" id="technician8">

                <div class="icons">
                    <button class="fas fa-heart" onclick="addtofavourites(technician8)"></button>

                </div>
                <img src="../resources/images/dishtechnician2.jpg" alt="">
                <h3>Dish Technician</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>

                <div class="info">
                    <p>Name: Abebe </p>
                    <p>adress: Alembank</p>
                    <p>experience: 3 years </p>
                </div>
                <a href="#" class="btn  " id="button" onclick="pending()">Book</a>
            </div>
        </div>

    </section>

    technican section ends 
   favourite  section begins-->

    
   

    <!--favourite section ends -->

   






    <!-- customer js file link -->
    <script src="../js/customer1.js"></script>
</body>


</html>