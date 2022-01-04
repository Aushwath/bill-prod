<?php 
	
	
	$servername = "localhost";  
    $username = "root";  
    $password = "";  
       
    $conn = new mysqli($servername , $username , $password, "order"); 

    
    // Check connection
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    else{
        //echo("Connection established");
    }

    $customer_id = $_POST['customer_id'];
    $customer = $_POST['customer'];

    $select = "SELECT * FROM `customer_details` WHERE `Cust_Name` = '$customer'";
    $run = mysqli_query($conn, $select);
    $row = mysqli_fetch_array($run) ;

    if ($row == []) {
    	$insert = "INSERT INTO `customer_details` (`Cust_ID`,`Cust_Name`) VALUES ('$customer_id','$customer')";
		    if(mysqli_query($conn, $insert)){
		        header('location:index.php');
		        }
		         else{
		            echo "ERROR: Hush! Sorry $insert. " 
		                . mysqli_error($conn);
		        }
    } else { 
        header('location:index.php');
        ?>
        <script type="text/javascript">
            var element1 = document.getElementById("Cust_Details");
            element1.class = "container tab-pane active";
        </script>
        <?php
    }

                
    mysqli_close($conn);

 ?>