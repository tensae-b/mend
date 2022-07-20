<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>filtering workers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    
    <link href="../csss/bootstrap-grid.min.css" rel="stylesheet">
    
</head>
<body>
    <!-- header section starts  -->

    <header>
        <div class="icons"><a href="customer.php" class="fas fa-arrow-left"></a></div>
        
        </div>

    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Filter Workers</h4>
                    </div>
                </div>
            </div>

            <!-- Occupation List  -->
            <div class="col-md-3">
                <form action="" method="GET">
                    <div class="card shadow mt-3">
                        <div class="card-header">
                            <h5>Filter 
                                <button type="submit" class="btn btn-primary btn-sm float-end">Search</button>
                            </h5>
                        </div>
                        <div class="card-body">
                            <h6>occupation List</h6>
                            <hr>
                            <?php
                                $con = mysqli_connect("localhost","root","","menddatabase");

                                $occup_query = "SELECT * FROM occupation";
                                $occup_query_run  = mysqli_query($con, $occup_query);

                                if(mysqli_num_rows($occup_query_run) > 0)
                                {
                                    foreach($occup_query_run as $occuplist)
                                    {
                                        $checked = [];
                                        if(isset($_GET['occupation']))
                                        {
                                            $checked = $_GET['occupation'];
                                        }
                                        ?>
                                            <div>
                                                <input type="checkbox" name="occupation[]" value="<?= $occuplist['occupation_id']; ?>" 
                                                    <?php if(in_array($occuplist['occupation_id'], $checked)){ echo "checked"; } ?>
                                                 />
                                                <?= $occuplist['occupation_type']; ?>
                                            </div>
                                        <?php
                                    }
                                }
                                else
                                {
                                    echo "No Occupation Found";
                                }
                            ?>
                        </div>
                        <div class="card-body">
                            <h6>Order List</h6>
                            <hr>
                            <?php
                                $con = mysqli_connect("localhost","root","","menddatabase");

                                $request_query = "SELECT * FROM request";
                                $request_query_run  = mysqli_query($con, $request_query);

                                if(mysqli_num_rows($request_query_run) > 0)
                                {
                                 
                                      
                                        ?>
                                            <div>
                                                <input type="checkbox" name="order1" value="most  "  id="most"
                                                   
                                                />
                                                 <label for="most"> Most requested workers</label><br>
                                                 <input type="checkbox" name="order2" value=" least "   id="least"
                                                />
                                                 <label for="least"> Least requested workers</label><br>
                                                 
                                                 <input type="checkbox" name="order3" value="recent "   id="recent"
                                                />
                                                 <label for="recent">Recent orders</label><br>
                                                 
                                            </div>
                                        <?php
                                    
                                
                            }
                                else
                                {
                                    echo "No Orders Found";
                                }
                            ?>
                        </div>
                        
                    </div>
                </form>
            </div>


            <div class="col-md-9 mt-5">
                <div class="card ">
                    <div class="card-body row">
                        <?php
                            if(isset($_GET['occupation']))
                            {
                                $occuphecked = [];
                                $occuphecked = $_GET['occupation'];
                                foreach($occuphecked as $occup)
                                {
                                    
                                    $workers = "SELECT * FROM worker_info JOIN worker_occup ON worker_info.worker_id=worker_occup.worker_id JOIN occupation on 
                                    occupation.occupation_id=worker_occup.occupation_id  WHERE worker_occup.occupation_id IN ($occup)";
                                    $workers_run = mysqli_query($con, $workers);
                                    if(mysqli_num_rows($workers_run) > 0)
                                    {
                                        foreach($workers_run as $worker) :
                                            ?>
                                                <div class="col-md-4 mt-3">
                                                    <div class="border p-2">
                                                        <h6><?= $worker['worker_username']; ?></h6>
                                                    </div>
                                                </div>
                                            <?php
                                        endforeach;
                                    }
                                }
                            }
                            
                           
                            
                          
                        ?>
                    </div>

                   
                </div>
                <div class="card mt-5">
                     
                <div class="card-body row">
                       <?php
                            
                            if(isset($_GET['order1']))
                            {
                                
                               

                                    $workers = " SELECT *, COUNT(request.worker_id ) FROM worker_info JOIN request ON worker_info.worker_id=request.worker_id JOIN customer_info on customer_info.customer_id=request.customer_id 
                                    GROUP BY worker_info.worker_username ORDER BY COUNT( worker_info.worker_id ) DESC;";
                                    $workers_run = mysqli_query($con, $workers);
                                   
                                    if(mysqli_num_rows($workers_run) > 0)
                                    {
                                        foreach($workers_run as $worker) :
                                            ?>
                                                <div class="col-md-4 mt-3">
                                                    <div class="border p-2">
                                                        <h6><?= $worker['worker_username']; ?></h6>
                                                    </div>
                                                </div>
                                            <?php
                                          endforeach;
                                    }

                                   
                                }
                            

                            if(isset($_GET['order2']))
                            {
                                
                               
                                    $workers = " SELECT *, COUNT(request.worker_id ) FROM worker_info JOIN request ON worker_info.worker_id=request.worker_id JOIN customer_info on customer_info.customer_id=request.customer_id 
                                    GROUP BY worker_info.worker_username ORDER BY COUNT( request.worker_id ) ASC;";
                                    $workers_run = mysqli_query($con, $workers);
                                
                                    if(mysqli_num_rows($workers_run) > 0)
                                    {
                                        foreach($workers_run as $worker) :
                                            ?>
                                                <div class="col-md-4 mt-3">
                                                    <div class="border p-2">
                                                        <h6><?= $worker['worker_username']; ?></h6>
                                                    </div>
                                                </div>
                                            <?php
                                             endforeach;
                                    }

                                   
                                }
                            
                            
                            if(isset($_GET['order3']))
                            {
                                  $workers = " SELECT  * FROM worker_info JOIN request ON worker_info.worker_id=request.worker_id JOIN customer_info on customer_info.customer_id=request.customer_id 
                                  ORDER BY request.request_id DESC;";
                                    $workers_run = mysqli_query($con, $workers);
                                    
                                    if(mysqli_num_rows($workers_run) > 0)
                                    {
                                        foreach($workers_run as $worker) :
                                            ?>
                                                <div class="col-md-4 mt-3">
                                                    <div class="border p-2">
                                                        <h6><?= $worker['worker_email']; ?></h6>
                                                        <h6><?= $worker['request_dateTime']; ?></h6>
                                                    </div>
                                                </div>
                                            <?php
                                           endforeach;
                                    }

                                   
                                }
                            
                          
                        ?>
                    </div>
                </div>   
            </div>




           
            
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



