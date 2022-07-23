<?php //DB connection for select box to show list of customers 
               
            $conn = new mysqli("localhost" , "root" , "", "order"); 

            $select_col = "SELECT DISTINCT `Colour_Name` FROM `product_details`";
            $run = mysqli_query($conn, $select_col);

            $i = 1;

?>