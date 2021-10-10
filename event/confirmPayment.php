<?php
require_once("dbconnect.php");
session_start();
error_reporting(0);
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
            <title>Confirm</title>
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
            <div class="position-relative overflow-hidden text-center m-4">
            <div class="card text-center" style="margin: auto;max-width: 480px;" >
  <div class="card-header">
   <h5>Payment Confirmation</h5>
  </div>
  <div class="card-body">
    <h5 class="card-title">Please Confirm Your Payment</h5>
    <form method="post" class="" role="form" style="font-size: 2rem;text-align: center;">
    <div class="container" style="max-width: 540px; ">
            	
            		<div class="form-group m-2">
		               <label class=""><h3>Bank Account Number</h3></label>
	                   <input class="form-control " type="number" name="ban" class="textInput">
	                </div>
            	
            </div>
            
   <input class="btn btn-success " type="submit" name="subm" value="Submit">
</form>
  </div>
  <div class="card-footer text-muted">
    <br>
  </div>

<?php
//echo "gg";
if (isset($_POST['subm'])) {
	//echo "ok";
	
	if (isset($_POST['ban'])) {
		$gbank=$_POST['ban'];
		$bank= $_SESSION["user"][0]["user_bank"];
		//$id= $_SESSION["user"][0]["user_id"];
		//echo $gbank;
		//echo $bank;
		if ($gbank == $bank) {
			$id= $_SESSION["user"][0]["user_id"];
			
			$v=0;
			$pl=0;
			$ph=0;
			if(isset($_SESSION["book_cart_v"])){
            $v=1;
			}
			if(isset($_SESSION["book_cart_pl"])){
            $pl=1;
			}
			if(isset($_SESSION["book_cart_ph"])){
            $ph=1;
			}
			$pay="UPDATE `user` SET `vb`='$v',`plb`='$pl',`phb`='$ph' WHERE `user_id`='$id'";
				$result = mysqli_query($conn, $pay);
				// $_SESSION["test1"]= $resu
  	     
    	
              if(!mysqli_num_rows($result)){



                	
                	?><div class="alert alert-success" role="alert">
                   Payment Successfull.<br>
                    </div>

                	<?php
                	unset($_SESSION["book_cart_v"]);
                	unset($_SESSION["book_cart_ph"]);
                	unset($_SESSION["book_cart_pl"]);

            }
		}
		else{
			?>
               
                	<div class="alert alert-danger" role="alert">
                   Please Enter the correct Information!<br>
                    </div><?php
 
		}
	}

	else{
?>
                 <div class="alert alert-danger" role="alert">
                   Please enter a valid number!  
                    </div><?php
	}

}
?>
</div>


</div>

            
        </body>
        </html>