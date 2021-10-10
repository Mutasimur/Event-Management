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
          <header class="site-header sticky-top" style="font-family: Perpetua bold;">
          <div class="navbar-light align-items-center shadow-sm " style="background:#d0fbcc;">
           <div class="navbar-brand d-flex justify-content-between">
           <div>
            <a class="navbar-brand px-3" href="index.php"> 
      
              <div style="color:#093B04;font-family:Pristina;">
                <b style="font-family:Pristina;font-size: 2.5em;  ">Elite</b>
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
          
                <a class="border-bottom dropdown-item" href="admin.php">Admin</a>
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

<div class="position-relative overflow-hidden text-center m-4">
             <div class="card mb-3" style="max-width: 600px; margin: auto;font-family:perpetua bold;font-size: 1.2em;">
  <div class="row no-gutters">
    <div class="col-md-6 border-right">
      <img src="muser.png" class="card-img " alt="...">
    </div>
    <div class="col-md-6">
      <div class="card-body">
        <h5 class="card-title">Admin Information</h5>
            	<?php
           //print_r($_SESSION);
            $adminq ="SELECT * FROM `admin` WHERE `admin_id` = '$a_id' ";
  	$result = mysqli_query($conn, $adminq);
  	//echo $result;
    	if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result)) 
                    
                     {  ?>
                      <form method="post" action="admin_up.php" 
                        class=" position-relative overflow-hidden" style="text-align: center;">
                      <h2><?php echo $row["a_name"]; 
                       ?></h2>
                        
                       <b>Contact :</b><?php echo $row["phone_no"];
                       ?><br>
                       <b>Email :</b> <?php echo $row["email"];
                        ?><br>
                        <b>Bank Info :</b> <?php echo $row["bank_info"];
                        ?><br>
                      
                       <?php
                      //echo $row["uid"];
                       
                       ?><br>
                       <input type="hidden" name="hidden_aid" value="<?php echo $row["admin_id"]; ?>" />
                       
                       <input type="submit"  class="btn btn-lg btn-outline-success mt-2" name="edit" value="Edit Info">
                   
                   </form><?php

                     }
                 }?>
             
      </div>
    </div>
  </div>
<div class="card">
<div class="card-title m-2 border-bottom">
<h3>Control</h3>	
</div>
<div class="card-body navbar d-flex border-bottom" style="text-align: center;">
	<a class="navbar-brand btn btn-default mb-3" href="v_up.php"><div class=""><h4>Venue</h4></div></a>
	<a class="navbar-brand btn btn-default mb-3" href="pl_up.php"><div class=""><h4>Event Planner</h4></div></a>
	<a class="navbar-brand btn btn-default mb-3" href="ph_up.php"><div class=""><h4>Photographer</h4></div></a>
	
</div>
</div>
</div>
</div>

            </body>
            </html>