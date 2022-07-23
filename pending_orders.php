<!DOCTYPE html>
<head>
    <title>Pending Orders</title>
    <meta charset="utf-8">
    <!--<meta http-equiv="refresh" content="10">-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js">
    </script>
  </head>
  <body>

  <!-- Navigation Bar -->  
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
     <div class="container-fluid">
        <form class="d-flex">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          <a class="nav-link active" aria-current="page" href="pending_orders.php">Pending Orders</a>
        </form>
     </div>
  </nav>

  <br>
  <h2 align="center">Pending Orders</h2>
  <hr>
  <br>

    <?php
           $servername = "localhost";  
           $username = "root";  
           $password = "";  

           
           $conn = new mysqli($servername , $username , $password, "order");

           $distinct_order_ID = "SELECT DISTINCT `Order_ID`,`Customer` from `order_details` WHERE `pending_flag` = 0 ORDER BY `Order_ID` DESC"; // fetch data from database where limit not approved
           $run = mysqli_query($conn, $distinct_order_ID);
           $unique_order_ID = [];
           $customer_details = [];
           
           while($data = mysqli_fetch_array($run)){
              array_push($unique_order_ID, $data['Order_ID']);
              array_push($customer_details, $data['Customer']);
           }

           $number_of_orders = count($unique_order_ID);
           $i=0;
           ?>
            
          <div class="container mt-3" id="accordion"> 
           <?php
           while ($i<$number_of_orders) {
           ?> 
              
              <div class="card">
                <div class="card-header">
                  <a class="btn" data-bs-toggle="collapse" href="#collapse<?php echo $i; ?>">
                    <h3>#<?php echo $unique_order_ID[$i]." ".$customer_details[$i];?></h3>
                  </a>
                </div>
                <div id="collapse<?php echo $i; ?>" class="collapse" data-bs-parent="#accordion">
                  <div class="card-body">
                    <table class="table" >
                              <thead>
                                <tr>
                                  <th>Code</th>
                                  <th>Colour</th>
                                  <th>Finish</th>
                                  <th>Quantity</th>
                                  <th>Required Date</th>
                                </tr>
                              </thead>
                        <?php 
                           $servername = "localhost";  
                           $username = "root";  
                           $password = "";  

                           $conn = new mysqli($servername , $username , $password, "order");
                           $select = "SELECT * FROM `order_details` WHERE `Order_ID` = '$unique_order_ID[$i]' AND `pending_flag` = 0 ";
                           $run = mysqli_query($conn,$select);

                           while($data = mysqli_fetch_array($run)){
                        ?>
                            <tr>
                              <td><?php echo $data['Code']; ?></td>
                              <td><?php echo $data['Colour']; ?></td>
                              <td><?php echo $data['Finish']; ?></td>
                              <td><?php echo $data['Quantity']; ?></td>
                              <td><?php echo $data['Req_Date']; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                    <a href="pending_orders_update.php?order_id=<?php echo $unique_order_ID[$i]; ?>">
                      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary me-md-2" type="submit">Update Order</button>
                      </div>
                    </a>

                  </div>
                </div>
                </div><br>

                

            <?php
              $i++;

           }
           ?>

         </div>
           <?php 
           
      ?>

  </body>
</html>