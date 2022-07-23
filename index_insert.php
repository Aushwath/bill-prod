<?php 

	$servername = "localhost";  
    $username = "root";  
    $password = "";  
       
    $conn = new mysqli($servername , $username , $password, "order"); 
    $query = "SELECT `Order_ID`,`colour_number` FROM `order_details` ORDER BY `colour_number` DESC LIMIT 1";
    $run = mysqli_query($conn, $query);
                
    $row = mysqli_fetch_array($run) ;
    //$order_ID = $order_ID_fetch['Order_ID'] + 1;
    if ($row != NULL) {
        $order_ID = $row['Order_ID'] + 1;
        $col_num = $row['colour_number'] + 1;
        echo $order_ID." ";
        echo $col_num." ";
    } else{
        $order_ID = 1;
        $col_num = 1;
        //echo $order_ID;
    }
    
    
    // Check connection
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    else{
        //echo("Connection established");
    }

    $customer = $_POST['customer'];
    $colour1 = $_POST['colour_1']; $finish1 = $_POST['finish_1']; $req_date1 = $_POST['req_1']; $qty1 = $_POST['qty_1'];
    $colour2 = $_POST['colour_2']; $finish2 = $_POST['finish_2']; $req_date2 = $_POST['req_2']; $qty2 = $_POST['qty_2'];
    $colour3 = $_POST['colour_3']; $finish3 = $_POST['finish_3']; $req_date3 = $_POST['req_3']; $qty3 = $_POST['qty_3'];
    $colour4 = $_POST['colour_4']; $finish4 = $_POST['finish_4']; $req_date4 = $_POST['req_4']; $qty4 = $_POST['qty_4'];
    $colour5 = $_POST['colour_5']; $finish5 = $_POST['finish_5']; $req_date5 = $_POST['req_5']; $qty5 = $_POST['qty_5'];
    $PO = $_POST['PO'];
    $colour = [$colour1, $colour2, $colour3, $colour4, $colour5];
    $finish = [$finish1, $finish2, $finish3, $finish4, $finish5];
    $req_date = [$req_date1, $req_date2, $req_date3, $req_date4, $req_date5];
    $qty = [$qty1, $qty2, $qty3, $qty4, $qty5];
    $i = 0;
    while ($i <= 4) {

        if(($colour[$i] != NULL) && ($finish[$i] != NULL)){
            echo $i;
            echo $colour[$i];
            echo $finish[$i];
            echo $req_date[$i];
        //fetch colour code
        $con = new mysqli("localhost","root","","order");
        $code = "SELECT `Code` FROM `product_details` WHERE `Colour_Name` = '$colour[$i]' AND `Finish` = '$finish[$i]'";
        $run = mysqli_query($con,$code);
        $data_code = mysqli_fetch_array($run);
        $code = $data_code['Code'];
            echo $code;
        //Insert Data
        $conn = new mysqli("localhost" , "root" , "", "order");
        $insert = "INSERT INTO `order_details` (`Customer`,`Order_ID`,`Order_date_time`,`PO`,`Code`,`Colour`,`Finish`,`Quantity`,`Req_Date`,`colour_number`)     
                                          VALUES ('$customer','$order_ID',CURRENT_TIMESTAMP(),'$PO','$code','$colour[$i]','$finish[$i]','$qty[$i]','$req_date[$i]','$col_num')";
        $run = mysqli_query($conn,$insert);
        
        $i++;
        $col_num++;
        } else {
            echo $i;
            $i++;
        }
    }

    header('location:index.php');

    /*if(isset($colour1) && isset($finish1)){

        //fetch colour code
        $conn = new mysqli("localhost" , "root" , "", "order");
        $code = "SELECT `Code` FROM `product_details` WHERE `Colour_Name` = '$colour1' AND `Finish` = '$finish1'";
        $run = mysqli_query($conn,$code);
        $data_code = mysqli_fetch_array($run);
        $code = $data_code['Code'];

        //Insert Data
        $conn = new mysqli("localhost" , "root" , "", "order");
        $insert = "INSERT INTO `product_details` (`Customer`,`Order_ID`,`Order_date_time`,`PO`,`Code`,`Colour`,`Finish`,`Req_Date`)     
                                          VALUES ('$customer','$order_ID',CURRENT_TIMESTAMP(),'$PO','$code','$colour1','$finish1','$req_date1')";


    }*/
?>
