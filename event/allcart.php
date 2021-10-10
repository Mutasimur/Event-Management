<?php
require_once("dbconnect.php");
session_start();
if(isset($_SESSION["admin"])!=null){ 
$a_id=$_SESSION["admin"][0]["admin_id"];
$aname=$_SESSION["admin"][0]["admin_name"];
}
if(isset($_SESSION["user"])!=null){ 
$u_id=$_SESSION["user"][0]["user_id"];
$name=$_SESSION["user"][0]["user_name"];
}
//echo $u_id;
?>
 <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Welcome</title>
            <link rel="stylesheet" type="text/css" href="style.css">
            <link rel="stylesheet" href="css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        </head>
        <body style="background: #f6f6fd; font-family: perpetua bold;color:#093B04; ">
          <header class="site-header sticky-top" style="font-family: perpetua bold;">
          <div class="navbar-light align-items-center shadow-sm " style="background:#d0fbcc;">
           <div class="navbar-brand d-flex justify-content-between">
           <div>
            <a class="navbar-brand px-3" href="index.php"> 
      
              <div style="color:#093B04;font-family:Pristina;">
                <b style="font-size: 2.5em;  ">Elite</b>
              Event Management</div>
             </a>
             <a class="navbar-brand pr-2" role="button" href="venuelist.php"> <h4>Venue </h4></a>
             <a class="navbar-brand" href="planner.php"> <h4>Event Planner</h4> </a>
             <a class="navbar-brand" href="photographer.php"><h4> Photographer</h4> </a>
          </div>
               <div class=" btn-group btn-default dropleft" style="font-size:1.3rem;">
              <!-- user Login Check-->
                <?php if((isset($_SESSION["user"]) || isset($_SESSION["admin"]) )== null){ ?>
           
        <div class="navbar" style="" aria-labelledby="">
          
                <a class="navbar-brand" href="register.php">Register</a>
                <a class="navbar-brand" href="login.php">Login</a>           
            
        </div>

            <?php }
            else if(isset($_SESSION["admin"])){ ?>
              <button class="btn btn-default" type="button" data-toggle="dropdown" data-target="options" aria-controls="navbarHeader" aria-expanded="true" aria-label="Toggle navigation" aria-haspopup="true">

           <h4><?php echo $_SESSION["admin"][0]["admin_name"];?></h4>
        </button>
        <div class="dropdown-menu" style="" aria-labelledby="">
          
                <a class="border-bottom dropdown-item" href="admin.php">User</a>
                <a class="border-bottom dropdown-item" href="allcart.php">Cart</a>
                <a class="dropdown-item " href="logout.php">Logout</a>
                
            
        </div>
        <?php
           } 
           else if(isset($_SESSION["user"])){ ?>
              <button class="btn btn-default" type="button" data-toggle="dropdown" data-target="options" aria-controls="navbarHeader" aria-expanded="true" aria-label="Toggle navigation" aria-haspopup="true">

           <h4><?php echo $_SESSION["user"][0]["user_name"];?></h4>
        </button>
        <div class="dropdown-menu" style="" aria-labelledby="">
          
                <a class="border-bottom dropdown-item" href="user.php">User</a>
                <a class="border-bottom dropdown-item" href="allcart.php">Cart</a>
                <a class="dropdown-item " href="logout.php">Logout</a>
                
            
        </div>
        <?php
           } ?>
    </div>
  </div>
</div>

            </header>

<div class="m-4 p-4" style="align-items: center;">
<h2>Here's your Order Detail:</h2>

<table class="" style=" border:2px solid green; border-color:#093B04;  text-align: center; background: #d0fbcc; ">  
                          <tr class="border-bottom m-3 p-4" style="font-size: 2rem; border:2px solid green; border-color:#093B04; ">  
                               <th class="p-2" style="border:2px solid green; border-color:#093B04; " width="40%"> Item Name </th>  
                               <th class="p-2" style="border:2px solid green; border-color:#093B04;"  width="25%"> Item Type </th> 
                               <th class="p-2" style="border:2px solid green; border-color:#093B04;"  width="25%"> Price </th>  
                               
                               <th class="p-2" style="border:2px solid green; border-color:#093B04; " width="15%"> Action </th>   
                                
                          </tr>
                          <?php
                             $totalE = 0;
                           //print_r($_SESSION);  
                           if(!empty($_SESSION["book_cart_v"]))  
                          {  
                               
                               //print_r($_SESSION);  
                               //$size=count($_SESSION["shopping_cart"]);
                               //echo $size;  
                               foreach($_SESSION["book_cart_v"] as $keys => $values)  
                               {  
                          ?>  
                          <tr class="border-bottom" style="font-size: 1.5rem;">  
                               <td style="border:2px solid green; border-color:#093B04; " class="p-2"><?php echo $values["item_name"]; ?></td>  
                               <td style="border:2px solid green; border-color:#093B04; " class="p-2"><?php echo "Venue"; ?></td> 
                               <td style="border:2px solid green; border-color:#093B04; " class="p-2"><?php echo number_format($values["item_price"], 2);?> Taka</td>  
                                
                               <td style="border:2px solid green; border-color:#093B04; " class="p-2">
                               	<a style=" text-decoration: none; color: currentColor;" href="showdetailv.php?action=delete&Product_ID=<?php echo $values["item_id"]; ?>"><span>Remove from Cart</span></a></td>  
                          </tr>  
                          <?php  
                                   $totalE = $totalE + $values["item_price"];  
                               }
                               }
                               //Planner Table
                               if(!empty($_SESSION["book_cart_pl"]))  
                          {  
                               
                               //print_r($_SESSION);  
                               //$size=count($_SESSION["shopping_cart"]);
                               //echo $size;  
                               foreach($_SESSION["book_cart_pl"] as $keys => $values)  
                               {  
                          ?>  
                          <tr class="border-bottom" style="font-size: 1.5rem;">  
                               <td style="border:2px solid green; border-color:#093B04; " class="p-2"><?php echo $values["item_name"]; ?></td>  
                               <td style="border:2px solid green; border-color:#093B04; " class="p-2"><?php echo "Planner"; ?></td> 
                               <td style="border:2px solid green; border-color:#093B04; " class="p-2"><?php echo number_format($values["item_price"], 2);?> Taka</td>  
                                
                               <td style="border:2px solid green; border-color:#093B04; " class="p-2">
                               	<a style=" text-decoration: none; color: currentColor;" href="allcart.php?action=delete&Product_ID=<?php echo $values["item_id"]; ?>"><span>Remove from Cart</span></a></td>  
                          </tr>  
                          <?php  
                                   $totalE = $totalE + $values["item_price"];  
                               }
                               }
                               if(!empty($_SESSION["book_cart_ph"]))  
                          {  
                               
                               //print_r($_SESSION);  
                               //$size=count($_SESSION["shopping_cart"]);
                               //echo $size;  
                               foreach($_SESSION["book_cart_ph"] as $keys => $values)  
                               {  
                          ?>  
                          <tr class="border-bottom" style="font-size: 1.5rem;">  
                               <td style="border:2px solid green; border-color:#093B04; " class="p-2"><?php echo $values["item_name"]; ?></td>  
                               <td style="border:2px solid green; border-color:#093B04; " class="p-2"><?php echo "Photographer"; ?></td> 
                               <td style="border:2px solid green; border-color:#093B04; " class="p-2"><?php echo number_format($values["item_price"], 2);?> Taka</td>  
                                
                               <td style="border:2px solid green; border-color:#093B04; " class="p-2">
                               	<a style=" text-decoration: none; color: currentColor;" href="allcart.php?action=delete&Product_ID=<?php echo $values["item_id"]; ?>"><span>Remove from Cart</span></a></td>  
                          </tr>  
                          <?php  
                                   $totalE = $totalE + $values["item_price"];  
                                  
                               }
                               }  
                               ?>

                          <tr class="border-bottom" style="font-size: 1.5rem; ">  
                               <td style="border:2px solid green; border-color:#093B04; " class="p-2" colspan="2" align="right">Total Value</td>  
                               <td style="border:2px solid green; border-color:#093B04; " class="p-2" colspan="2" align="right"> <?php echo number_format($totalE, 2); ?> Taka</td>  
                               
                          </tr>  
                          <tr>
                          	 <td style="border:2px solid green; border-color:#093B04; " class="p-1" colspan="4" align="right">
                          		<form action="confirmPayment.php"> 
                          			<input style="font-size: 2rem; color: #093B04; " type="submit"  class="btn btn-default mt-2" name="confirm" value="Confirm"></td>
                          </tr>
           </table>
           <?php  
                                //   $totalE = $totalE + $values["item_price"];  
                                   //print_r($_SESSION);
                                  // session_destroy();
                                 //  unset($_SESSION["book_cart_v"]);
                               ?>  
                               
</div>
          </body>
          </html>