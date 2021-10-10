<?php
session_start(); 
require_once("dbconnect.php");
//echo "hello";

if (isset($_POST['book'])) {
 echo "booked";
 
         $item_array = array(  
                'item_id'               =>    $_POST["hidden_uid"],  
               'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
             //   'item_quantity'          =>     $_POST["quantity"]  
           );
          //  print_r($_SESSION);  
           $_SESSION["book_cart_ph"][0] = $item_array;  
        print_r($_SESSION["book_cart_ph"]);
         header("Location:photographer.php?BookedSuccessful");

  
}
if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
          unset($_SESSION["book_cart_ph"]);
        header("Location:allcart.php");  
      }  
 }  
                        

                       
?>