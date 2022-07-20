<!DOCTYPE html>
<html>
<head>
<title> customer database</title>
<link rel="stylesheet" href="css/customer2css.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
summary{
    
    font-size:2.1rem;
}

pre{
    font-size:1.8rem;

}
p{

    font-size:2.1rem;
}
    </style>

<script src="js/database.js"> </script>
</head>
<body>      
<div class='cards'>
                                <?php 
                                    $db = mysqli_connect("localhost", "root", "", "menddatabase");
                                    $select= "SELECT * FROM customer_info order by first_name"; 
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
                                
                                    </body>
                                    </html>