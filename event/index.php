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
      
              <div style="color:#093B04;font-family:Perpetua bold;">
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

   
              
<div class="position-relative  text-center m-2" id="promo">
  <div class="" id="texts">
    <div class="p-lg-5 mx-auto my-5 display-4" style=" " >
<br>
      <h1 class="font-weight-bold">Get the Best location,Photographers and Planners in One Place!</h1>
    
  </div>
</div>
</div>
  
<div class="position-relative overflow-hidden m-md-3 text-center d-flex" >
   <div class="col-4">
     <form action="venuelist.php"> 
        <button class = "btn btn-default" type="submit">
        <div class="card shadow-sm" style="background:#d0fbcc;"> 
          <img src="cover2.jpg" class="card-img-top"  id="promo1" alt="">
            <div class="card-body">
                           
                           <h3>Book Venue</h3>
            </div>
          </div>
       </button>
    </form>
  </div>

  <div class="col-4" >
     <form action="photographer.php"> 
        <button class = "btn btn-default" type="submit">
        <div class="card shadow-sm" style="background:#d0fbcc;"> 
          <img src="camera.jpg" class="card-img-top"  id="promo1" alt="">
            <div class="card-body">
                           
                         <h3> Book Photographer</h3>
            </div>
          </div>
       </button>
    </form>
  </div> 
<div class="col-4">
     <form action="planner.php"> 
        <button class = "btn btn-default" type="submit">
        <div class="card shadow-sm" style="background:#d0fbcc;"> 
          <img src="planner.jpg" class="card-img-top"  id="promo1" alt="">
            <div class="card-body">
                           
                         <h3>  Book Planner</h3>
            </div>
          </div>
       </button>
    </form>
  </div> 
</div>

            
        
        </body>
        </html>