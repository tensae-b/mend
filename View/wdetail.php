<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location:../index.php');
    die();
}
$local = "localhost";
$user = "root";
$data = "menddatabase";
$con = mysqli_connect($local, $user);
mysqli_select_db($con, $data);

$url = $_SERVER["REQUEST_URI"];
$components = parse_url($url);
parse_str($components['query'], $results);
$id = $results['worker_id'];
$occup = $results['occup'];
$exp = $results['experience'];
$select = "SELECT * FROM worker_info  WHERE worker_id= $id";
$result = mysqli_query($con, $select);

while ($row = mysqli_fetch_array($result)) {
    $image = $row['image'];
    $firstname = $row['first_name'];
    $lastname = $row['last_name'];
    $phonenum = $row['phone_num'];
    $email = $row['worker_email'];
    $city = $row['subcity'];
    $age = $row['age'];
    $sex = $row['sex'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>user about me section - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/customer.css">
    <!-- customer js file link -->
    <script src="../js/customer1.js"></script>

</head>

<body>
    <!-- header section starts  -->

    <header>
        <div class="icons"><a href="customer.php" class="fas fa-arrow-left"></a></div>
        <a href="#" class="logo"> Mend <span>.</span></a>

        <div class="icons">
            <a href="../index.php" class="fas fa-home"></a>
        </div>

    </header>

    <!-- <section class="bg-light"> -->
    <div class="container">
        <div class="row">
            <!-- <div class="col-lg-12 mb-4 mb-sm-5"> -->
            <div class="card card-style1 border-0">
                <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                    <div class="row align-items-center">
                        <div class="col-lg-6 mb-4 mb-lg-0">
                            <img src="../Model/image/<?php echo $image ?>" alt="https://bootdey.com/img/Content/avatar/avatar7.png">
                        </div>
                        <div style="text-align: left;"  class="col-lg-6 px-xl-10">
                            <div class="head" >
                                <h3 class="h2 text-white mb-0"><?php echo 'Name:  ' . ucfirst($firstname) . '  ' .
                                 ucfirst($lastname) ?></h3>
                                <span class="text-primary"><?php echo $occup ?></span>
                            </div>
                            
                            <ul style="text-align: left;" class="list-unstyled mb-1-9"><big>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Position:</span> <?php echo $occup ?></li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Experience:</span> <?php echo $exp ?></li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Sex:</span> <?php echo ucfirst($sex) ?></li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Email:</span><?php echo $email ?></li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Address:</span> <?php echo ucfirst($city) ?></li>
                                    <li class="display-28"><span class="display-26 text-secondary me-2 font-weight-600">Phone:</span><?php echo $phonenum ?></li>
                                </big>
                            </ul>                                                            
                        </div>
                    </div>
                    
                    <a href="../Control/order.php?action_type=order&id=<?=$id?>&occupation=<?=$occup?>&text=<?=$occup?>" 
                    class="btn btn-warning btn-style">order</a>

                </div>
            </div>
        </div>
    </div>
    </div>
</section>


    <style type="text/css">
        body {
            margin-top: 20px;
        }

        .card-style1 {
            box-shadow: 0px 0px 10px 0px rgb(89 75 128 / 9%);
        }

        .border-0 {
            border: 0 !important;
        }
        
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: 0.25rem;
        }

        section {
            padding: 120px 0;
            overflow: hidden;
            background: #fff;
        }
         .head{
            border-radius: 15px;
        background: #3d5654;
        padding: 20px;
        width: 300px;
        height: 100px;
        }
         
        .mb-2-3,
        .my-2-3 {
            margin-bottom: 2.3rem;
        }

        .section-title {
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 10px;
            position: relative;
            display: inline-block;
        }

        .text-primary {
            color: #ceaa4d !important;
        }

        .text-secondary {
            color: #184d47;
        }

        .font-weight-600 {
            font-weight: 600;
        }

        .display-26 {
            font-size: 20px;
        }
        .display-28 {
            font-size: 20px;
        }

        @media screen and (min-width: 992px) {
            .p-lg-7 {
                padding: 4rem;
            }
        }

        @media screen and (min-width: 768px) {
            .p-md-6 {
                padding: 3.5rem;
            }
        }

        @media screen and (min-width: 576px) {
            .p-sm-2-3 {
                padding: 2.3rem;
            }
        }

        .p-1-9 {
            padding: 1.9rem;
        }

        .bg-secondary {
            background: #15395A !important;
        }

        @media screen and (min-width: 576px) {

            .pe-sm-6,
            .px-sm-6 {
                padding-right: 3.5rem;
            }
        }

        @media screen and (min-width: 576px) {

            .ps-sm-6,
            .px-sm-6 {
                padding-left: 3.5rem;
            }
        }

        .pe-1-9,
        .px-1-9 {
            padding-right: 1.9rem;
        }

        .ps-1-9,
        .px-1-9 {
            padding-left: 1.9rem;
        }

        .pb-1-9,
        .py-1-9 {
            padding-bottom: 1.9rem;
        }

        .pt-1-9,
        .py-1-9 {
            padding-top: 1.9rem;
        }

        .mb-1-9,
        .my-1-9 {
            margin-bottom: 1.9rem;
        }

        @media (min-width: 992px) {
            .d-lg-inline-block {
                display: inline-block !important;
            }
        }

        .rounded {
            border-radius: 0.25rem !important;
        }
    </style>

    <script type="text/javascript">

    </script>
</body>

</html>