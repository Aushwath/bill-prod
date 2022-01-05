<?php //DB connection for select box to show list of customers 
               
            $conn = new mysqli("localhost" , "root" , "", "order"); 

            $colour1 = $_POST['colour_1']; $finish1 = $_POST['finish_1'];

            if(isset($_REQUEST["colour1"]) && isset($_REQUEST["finish1"])){
                $select_code = "SELECT `Code` FROM `product_details` WHERE `Colour_Name` = '$colour1' AND `Finish` = '$finish1'";
                $run = mysqli_query($conn, $select_code);
                $data_cod = mysqli_fetch_array($run);
                $code1 =   $data_cod['Code'];
            $colour2 = $_POST['colour_2']; $finish2 = $_POST['finish_2'];
            }

            if(isset($_REQUEST["colour2"]) && isset($_REQUEST["finish2"])){
                $select_code = "SELECT `Code` FROM `product_details` WHERE `Colour_Name` = '$colour2' AND `Finish` = '$finish2'";
                $run = mysqli_query($conn, $select_code);
                $data_cod = mysqli_fetch_array($run);
                $code2 =   $data_cod['Code'];

            }

            $colour3 = $_POST['colour_3']; $finish3 = $_POST['finish_3'];

            if(isset($_REQUEST["colour3"]) && isset($_REQUEST["finish3"])){
                $select_code = "SELECT `Code` FROM `product_details` WHERE `Colour_Name` = '$colour3' AND `Finish` = '$finish3'";
                $run = mysqli_query($conn, $select_code);
                $data_cod = mysqli_fetch_array($run);
                $code3 = $data_cod['Code'];

            }

            $colour4 = $_POST['colour_4']; $finish4 = $_POST['finish_4'];

            if(isset($_REQUEST["colour4"]) && isset($_REQUEST["finish4"])){
                $select_code = "SELECT `Code` FROM `product_details` WHERE `Colour_Name` = '$colour4' AND `Finish` = '$finish4'";
                $run = mysqli_query($conn, $select_code);
                $data_cod = mysqli_fetch_array($run);
                $code4 = $data_cod['Code'];

            }

            $colour5 = $_POST['colour_5']; $finish5 = $_POST['finish_5'];

            if(isset($_REQUEST["colour5"]) && isset($_REQUEST["finish5"])){
                $select_code = "SELECT `Code` FROM `product_details` WHERE `Colour_Name` = '$colour5' AND `Finish` = '$finish5'";
                $run = mysqli_query($conn, $select_code);
                $data_cod = mysqli_fetch_array($run);
                $code5 = $data_cod['Code'];

            }


?>