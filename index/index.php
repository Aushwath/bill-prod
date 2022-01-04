<!DOCTYPE html>
<html lang="en">

</style>
<head>
  <title>Billing-Prod v1.3.1</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"> </script>
  

  <?php //DB connection for select box to show list of customers 
               
            $conn = new mysqli("localhost" , "root" , "", "order"); 

            $select = "SELECT * FROM `customer_details`";
            $run = mysqli_query($conn, $select);

            $i = 1;

          ?>

</head>

<body>

<!-- Navigation Bar -->  
<nav class="navbar navbar-expand-lg navbar-light bg-light">
   <div class="container-fluid">
      <form class="d-flex">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        <a class="nav-link active" aria-current="page" href="orders.php">Order Status</a>
      </form>
   </div>
</nav>


<br>
<!-- Options Pane -->
<ul class="nav nav-tabs" role="tablist" id="myTab">
    <li class="nav-item">
      <a class="nav-link active" data-bs-toggle="tab" href="#home">Order Details</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="tab" href="#Cust_Details">Customer Details Upload</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="tab" href="#Prod_Details">Product Details Upload</a>
    </li>
</ul>


<!-- Tab Window-->
<div class="tab-content" id="tab">


    <!-- Order Details Tab Window -->
    <div id="home" class="container tab-pane active">


      <br>
      <h2 align="center">Order Details</h2>
      <hr>
      <br>


      <!-- Order Details Form -->
      <div class="container mt-3">
        <form action="index_insert.php" method="POST">

          <div class="row">
            <div class="col-sm-6">
              <div class="mb-3">
                <label for="customer">Customer Name:</label>
                <select class="form-select" name="customer" required>
                  <option selected> </option>


                  <?php  //Options in the select box for customer
                    while($data = mysqli_fetch_array($run)){
                  ?>
                  <option value = "<?php echo $data['Cust_Name']; ?>"><?php echo $data['Cust_Name']; ?></option>
                  <?php 
                   }
                  ?>


                </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="mb-3">
                <label for="customer">PO (if available):</label>
                <input type="text" class="form-control" id="PO" placeholder="PO Number" name="PO">
              </div>
            </div>
          </div>
          <br>


          <!-- Table -->
          <div class="overflow-auto" style="border-style: solid; border-width:1px; border-radius: 10px; min-height: 125px; padding: 10px;">
            <table class="table" id="orderTable" >
               <thead>
                 <tr>
                    <th width=5%></th>
                    
                    <th >Colour</th>
                    <th >Finish</th>
                    <th >Quantity</th>
                    <th >Requirement date</th>
                 </tr>


                 <tr>
                   <td width=5% style="vertical-align: middle;">#1</td>
                   
                   <td><select class="form-select" id="colour_1" name="colour_1" >
                          <option selected> </option>


                            <?php include 'table_colour_db_connect.php';  //Options in the select box
                              while($data_col = mysqli_fetch_array($run)){
                            ?>
                            <option value = "<?php echo $data_col['Colour_Name']; ?>"><?php echo $data_col['Colour_Name']; ?></option>
                            <?php 
                             }
                             $i = 1;
                            ?>

                       </select></td>
                   <td><select class="form-select"  name="finish_1" >
                          <option selected> </option>
                          <option value="Glossy">Glossy</option>
                          <option value="Semi Glossy">Semi Glossy</option>
                          <option value="Structure">Structure</option>
                          <option value="Matt">Matt</option>
                        </select></td>
                   <td><input type="number" class="form-control" id="quantity1" placeholder="Quantity (in kg)" name="qty_1"></td>
                   <td><input type="date" class="form-control" id="req_date1" placeholder="Requirement Date" name="req_1"></td>
                   
                 </tr>

                 <tr>
                   <td width=5% style="vertical-align: middle;">#2</td>
                   
                   <td><select class="form-select" name="colour_2" >
                          <option selected> </option>


                            <?php include 'table_colour_db_connect.php';  //Options in the select box
                              while($data_col = mysqli_fetch_array($run)){
                            ?>
                            <option value = "<?php echo $data_col['Colour_Name']; ?>"><?php echo $data_col['Colour_Name']; ?></option>
                            <?php 
                             }
                             $i = 1;
                            ?>

                       </select></td>
                   <td><select class="form-select"  name="finish_2" >
                          <option selected> </option>
                          <option value="Glossy">Glossy</option>
                          <option value="Semi Glossy">Semi Glossy</option>
                          <option value="Structure">Structure</option>
                          <option value="Matt">Matt</option>
                        </select></td>
                   <td><input type="number" class="form-control" id="quantity2" placeholder="Quantity (in kg)" name="qty_2"></td>
                   <td><input type="date" class="form-control" id="req_date2" placeholder="Requirement Date" name="req_2"></td>
                 </tr>

                 <tr>
                   <td width=5% style="vertical-align: middle;">#3</td>
                  
                   <td><select class="form-select" name="colour_3" >
                          <option selected> </option>


                            <?php include 'table_colour_db_connect.php';  //Options in the select box
                              while($data_col = mysqli_fetch_array($run)){
                            ?>
                            <option value = "<?php echo $data_col['Colour_Name']; ?>"><?php echo $data_col['Colour_Name']; ?></option>
                            <?php 
                             }
                             $i = 1;
                            ?>

                       </select></td></td>
                   <td><select class="form-select" name="finish_3" >
                          <option selected> </option>
                          <option value="Glossy">Glossy</option>
                          <option value="Semi Glossy">Semi Glossy</option>
                          <option value="Structure">Structure</option>
                          <option value="Matt">Matt</option>
                        </select></td></td>
                   <td><input type="number" class="form-control" id="quantity3" placeholder="Quantity (in kg)" name="qty_3"></td>
                   <td><input type="date" class="form-control" id="req_date3" placeholder="Requirement Date" name="req_3"></td>
                 </tr>

                 <tr>
                   <td width=5% style="vertical-align: middle;">#4</td>
                   
                   <td><select class="form-select" name="colour_4" >
                          <option selected> </option>


                            <?php include 'table_colour_db_connect.php';  //Options in the select box
                              while($data_col = mysqli_fetch_array($run)){
                            ?>
                            <option value = "<?php echo $data_col['Colour_Name']; ?>"><?php echo $data_col['Colour_Name']; ?></option>
                            <?php 
                             }
                             $i = 1;
                            ?>

                       </select></td></td></td>
                   <td><select class="form-select" name="finish_4" >
                          <option selected> </option>
                          <option value="Glossy">Glossy</option>
                          <option value="Semi Glossy">Semi Glossy</option>
                          <option value="Structure">Structure</option>
                          <option value="Matt">Matt</option>
                        </select></td></td>
                   <td><input type="number" class="form-control" id="quantity4" placeholder="Quantity (in kg)" name="qty_4"></td>
                   <td><input type="date" class="form-control" id="req_date4" placeholder="Requirement Date" name="req_4"></td>
                 </tr>

                 <tr>
                   <td width=5% style="vertical-align: middle;">#5</td>
                   
                   <td><select class="form-select" name="colour_5" >
                          <option selected> </option>


                            <?php include 'table_colour_db_connect.php';  //Options in the select box
                              while($data_col = mysqli_fetch_array($run)){
                            ?>
                            <option value = "<?php echo $data_col['Colour_Name']; ?>"><?php echo $data_col['Colour_Name']; ?></option>
                            <?php 
                             }
                             $i = 1;
                            ?>

                       </select></td></td></td>
                   <td><select class="form-select" name="finish_5" >
                          <option selected> </option>
                          <option value="Glossy">Glossy</option>
                          <option value="Semi Glossy">Semi Glossy</option>
                          <option value="Structure">Structure</option>
                          <option value="Matt">Matt</option>
                        </select></td></td>
                   <td><input type="number" class="form-control" id="quantity5" placeholder="Quantity (in kg)" name="qty_5"></td>
                   <td><input type="date" class="form-control" id="req_date5" placeholder="Requirement Date" name="req_5"></td>
                 </tr>
               </thead>
            </table>
          </div>
          <br>


          <button type="submit" name="submit" class="btn btn-primary btn-lg" >Submit</button>
        </form>
      </div>
    </div>


    <!-- Customer Details Tab Window -->    
    <div id="Cust_Details" class="container tab-pane fade">


      <br>
      <h2 align="center">Customer Details</h2>
      <hr><br>


      <!-- Customer Details Form -->
      <div class="container mt-3">
        <form action="customer_details_input.php" method="POST">
        
            <div class="col-sm-9">
              <div class="mb-3">
                <label for="customer">Customer Name:</label>
                <input type="text" class="form-control" id="customer" placeholder="New Customer name" name="customer">
              </div>
            </div>
        
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>  
        </form>
      </div>
    </div>


    <!-- Product Details Tab Window -->    
    <div id="Prod_Details" class="container tab-pane fade">

      <br>
      <h2 align="center">Product Details</h2>
      <hr><br>


      <!-- Product Details Form -->
      <div class="container mt-3">
        <form action="product_details_input.php" method="POST">
          <div class="row">
            <div class="col-sm-2">
              <div class="mb-3">
                <label for="code">Code:</label>
                <input type="text" class="form-control" id="colour_code" placeholder="Colour Code" name="colour_code" required>
              </div>
            </div>
            <div class="col-sm-5">
              <div class="mb-3">
                <label for="Colour">Colour:</label>
                <input type="text" class="form-control" id="colour" placeholder="Colour Name" name="colour" required>
              </div>
            </div>
            <div class="col-sm-5">
              <div class="mb-3">
                <label for="Finish">Finsih:</label>
                <select class="form-select" name="colour_finish" required>
                  <option selected> </option>
                  <option value="Glossy">Glossy</option>
                  <option value="Semi Glossy">Semi Glossy</option>
                  <option value="Structure">Structure</option>
                  <option value="Matt">Matt</option>
                </select>
              </div>
            </div>
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>  
        </form>
    </div>
      
    </div>

</div>
<br><br>

</body>
</html>