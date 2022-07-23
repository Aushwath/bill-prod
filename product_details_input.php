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

    $code = $_POST['colour_code'];
    $colour = $_POST['colour'];
    $finish = $_POST['colour_finish'];

    $select = "SELECT * FROM `product_details` WHERE `Code` = '$code'";
    $run = mysqli_query($conn, $select);
    $row = mysqli_fetch_array($run) ;

    if ($row == []) {
    	$insert = "INSERT INTO `product_details` (`Code`,`Colour_Name`,`Finish`) VALUES ('$code','$colour','$finish')";
		    if(mysqli_query($conn, $insert)){
		        header('location:index.php');
		        }
		         else{
		            echo "ERROR: Hush! Sorry $insert. " 
		                . mysqli_error($conn);
		        }
    } else { 
        header('location:index.php');
    }

                
    mysqli_close($conn);

 ?>