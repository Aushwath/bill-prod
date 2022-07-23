<?php 
              // Get the user id 
              $customer = $_REQUEST['customer'];
                
              // Database connection
              $con = mysqli_connect("localhost", "root", "", "order");
                
              if ($customer !== "") {
                    
                  // Get corresponding first name and 
                  // last name for that user id    
                  $query = mysqli_query($con, "SELECT `Cust_ID` FROM `customer_details` WHERE `Cust_Name` = '$customer'");
                
                  $row = mysqli_fetch_array($query);
                
                  // Get the first name
                  $cust_id = $row["Cust_ID"];
                
              }
                
              // Store it in a array
              $result = array("$cust_id");
                
              // Send in JSON encoded form
              $myJSON = stringify($result);
              echo $myJSON;
            ?>
