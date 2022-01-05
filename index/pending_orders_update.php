<?php          
    $servername = "localhost";  
    $username = "root";  
    $password = "";  
   
    $conn = new mysqli($servername , $username , $password, "order"); 


    if(isset($_REQUEST["order_id"])){
        $order_id = $_REQUEST["order_id"];
        $query = "SELECT * FROM `order_details` WHERE `Order_ID` = '$order_id'";
        $run = mysqli_query($conn, $query);
        
        $data = mysqli_fetch_array($run);
        $unique_order_ID = $data['Order_ID'];
        $customer_details = $data['Customer'];
           

        

        //echo $row["Prod_Details"];
        }
?>

<!DOCTYPE html>
<html lang="en">

</style>
<head>
  <title>Billing-Prod v1.3.1</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"> </script>
</head>

<body>

<!-- Navigation Bar -->  
<nav class="navbar navbar-expand-lg navbar-light bg-light">
   <div class="container-fluid">
      <form class="d-flex">
        <a class="nav-link active" aria-current="page" href="pending_orders.php">Pending Orders</a>
      </form>
   </div>
</nav>

<br>
<h2 align="center">#<?php echo $unique_order_ID." ".$customer_details;?></h2>
<hr>
<br>

<!-- Collapsible Panels -->

<div class="container mt-3" id="cost"> 
    <div class="card">
        <div class="card-header">
            <a class="btn" data-bs-toggle="collapse" href="#collapse_cost">
                <h3>Cost</h3>
            </a>
        </div>
        <div id="collapse_cost" class="collapse" data-bs-parent="#cost">
                <div class="card-body">
                    <table class="table" >
                                  <thead>
                                    <tr>
                                      <th>Code</th>
                                      <th>Colour</th>
                                      <th>Finish</th>
                                      <th>Quantity</th>
                                      <th>Cost</th>
                                    </tr>
                                  </thead>
                            <?php 
                               $servername = "localhost";  
                               $username = "root";  
                               $password = "";  

                               $conn = new mysqli($servername , $username , $password, "order");
                               $select = "SELECT * FROM `order_details` WHERE `Order_ID` = '$order_id'";
                               $run = mysqli_query($conn,$select);

                               while($data = mysqli_fetch_array($run)){
                            ?>
                                <tr>
                                  <td><?php echo $data['Code']; ?></td>
                                  <td><?php echo $data['Colour']; ?></td>
                                  <td><?php echo $data['Finish']; ?></td>
                                  <td><?php echo $data['Quantity']; ?></td>
                                  <td><input type="number" name="cost_per_<?php echo $data['colour_number']; ?>" placeholder="Cost per kg"></td>
                                  <!--<td><button type="confirm" name="submit_<?php echo $data['colour_number']; ?>" class="btn btn-outline-primary">Confirm</button></td> -->
                                </tr>
                            <?php
                            }
                            ?>
                        </table>

                </div>
        </div>
    </div>
</div>

<div class="container mt-3" id="Limit"> 
    <div class="card">
        <div class="card-header">
            <a class="btn" data-bs-toggle="collapse" href="#collapse_limit">
                <h3>Limit</h3>
            </a>
        </div>
        <div id="collapse_limit" class="collapse" data-bs-parent="#limit">
            <div class="card-body">
                
                <label for="customer">Limit Status:</label>
                <div class="col-sm-4">
                    <div class="mb-3">
                        <select class="form-select" name="limit_status" required>
                            <option selected></option>
                            <option value="1">Approved</option>
                            <option value="0">Not Approved</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                  <div class="col-sm-4">
                    <div class="mb-3">
                      <label for="credit">Credit:</label>
                      <input type="number" class="form-control" id="credit" placeholder="Current credit" name="credit">
                    </div> 
                  </div>
                  <div class="col-sm-4">
                    <div class="mb-3">
                      <label for="commitment">Commitment date:</label>
                      <input type="date" class="form-control" id="commitment_date" placeholder="dd-mm-yyyy" name="commitment_date">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="mb-3">
                      <label for="credit">Commitment Amount:</label>
                      <input type="number" class="form-control" id="commitment_amount" placeholder="Amount commited" name="commitment_amount">
                    </div> 
                  </div>
                </div>       

            </div>
        </div>
    </div>
</div>

<div class="container mt-3" id="stock"> 
    <div class="card">
        <div class="card-header">
            <a class="btn" data-bs-toggle="collapse" href="#collapse_stock">
                <h3>Stock</h3>
            </a>
        </div>
        <div id="collapse_stock" class="collapse" data-bs-parent="#stock">
                <div class="card-body">
                    <table class="table" >
                                  <thead>
                                    <tr>
                                      <th>Code</th>
                                      <th>Colour</th>
                                      <th>Finish</th>
                                      <th>Quantity</th>
                                      <th>Stock</th>
                                    </tr>
                                  </thead>
                            <?php 
                               $servername = "localhost";  
                               $username = "root";  
                               $password = "";  

                               $conn = new mysqli($servername , $username , $password, "order");
                               $select = "SELECT * FROM `order_details` WHERE `Order_ID` = '$order_id'";
                               $run = mysqli_query($conn,$select);

                               while($data = mysqli_fetch_array($run)){
                            ?>
                                <tr>
                                  <td><?php echo $data['Code']; ?></td>
                                  <td><?php echo $data['Colour']; ?></td>
                                  <td><?php echo $data['Finish']; ?></td>
                                  <td><?php echo $data['Quantity']; ?></td>
                                  <td><select name="stock_status_<?php echo $data['colour_number']; ?>" >
                                        <option selected></option>
                                        <option value="1">In Stock</option>
                                        <option value="0">Out of Stock</option>
                                        </select>
                                    </td>
                                  <!--<td><button type="confirm" name="submit_<?php echo $data['colour_number']; ?>" class="btn btn-outline-primary">Confirm</button></td> -->
                                </tr>
                            <?php
                            }
                            ?>
                        </table>

                </div>
        </div>
    </div>
</div>

<br>
<div class="d-grid gap-2 col-4 mx-auto">
  <button class="btn btn-primary btn-lg" type="button">Submit Approvals</button>
</div>
<br>
<br>

</body>
</html>