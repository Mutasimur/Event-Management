<?php
require_once("dbconnect.php");
session_start();
error_reporting(0);
ini_set('display_errors', 0);
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
            <title>Event Planner</title>
            <link rel="stylesheet" type="text/css" href="style.css">
            <link rel="stylesheet" href="css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        </head>
        <body style="background: #f6f6fd; font-family: perpetua Bold;color:#093B04; ">
          <header class="site-header sticky-top" style="font-family:Perpetua Bold;">
          <div class="navbar-light align-items-center shadow-sm " style="background:#d0fbcc;">
           <div class="navbar-brand d-flex justify-content-between">
           <form  method="post" action="searchpl.php">
            <a class="navbar-brand px-3" href="index.php"> 
      
              <div style="color:#093B04;font-family:Pristina;">
                <b style="font-size: 2.5em;  ">Elite</b>
              Event Management</div>
             </a>
             <a class="navbar-brand pr-2" role="button" href="venuelist.php"> <h4>Venue </h4></a>
             <a class="navbar-brand" href="planner.php"> <h4>Event Planner</h4> </a>
             <a class="navbar-brand" href="photographer.php"><h4> Photographer</h4> </a>
             <input class=" mr-2" type="text" placeholder="Search" name="khoj">
        <button class="btn btn-outline-success" type="submit" name="skhoj" >Search</button></form>
               <div class=" btn-group btn-default dropleft " style="font-size:1.3rem;">
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

            <div class=" container my-3">
            <?php
            
            $sql2="SELECT * FROM `planner`";
           
             $result = $conn->query($sql2);  
                if(mysqli_num_rows($result) > 0)  
                {  
                 
                  ?><div class="" style="display: flex; flex-wrap: wrap;"><?php
                     while($row = mysqli_fetch_array($result)) 
                    
                     {
                      $_SESSION["detail_id"]=$row["uid"];
                      $_SESSION["book"]=$row["booked"];

                      ?>
                      <form method="post" action="showdetail.php" 
                        class=" position-relative overflow-hidden border shadow-sm m-3 " style=" padding: 2%;
                   
                   flex-basis: 30%;
                   padding: 2%;
                  text-align: center;
                  margin: auto;
                   background: white;
                  ">

                    
                  
                      <h4><?php echo $row["pl_name"];?></h4>
                       <br>
                       <input type="hidden" name="hidden_uid" value="<?php echo $row["uid"]; ?>" />
                       <input type="hidden" name="hidden_name" value="<?php echo $row["pl_name"]; ?>" />   
                       <input type="hidden" name="hidden_price" value="<?php echo $row["cost"]; ?>" />
                       <div class=" justify-content-between align-items-center " style="align-items: center;">
                       
                      <input type="button"  class="btn btn-outline-success" data-toggle="modal" name="detail" value="Detail" data-target="#detailModal">
                      <!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="position-relative text-center m-2">

<?php
//echo "hello2";
//echo $_POST["hidden_uid"];
$did=$_SESSION["detail_id"];
$sqld="SELECT * FROM `planner` WHERE `uid` = '$did' ";
    $resultd=$conn->query($sqld);
    if(mysqli_num_rows($resultd) > 0)  
                {  
                 
                  ?><div class="container my-3" style="align-items: center;"><?php
                     while($row = mysqli_fetch_array($resultd)) 
                    
                     {  ?>
                      <form method="post" action="showdetail.php" 
                        class=" position-relative overflow-hidden border shadow" style="
                   
                   
                   padding: 2%;
                  text-align: center;
                  margin: auto;
                  width: 40%;

                   background: white;
                  ">

                    
                  
                      <h2><?php echo $row["pl_name"]; 
                       ?></h2>
                        <b>Address :</b><?php echo $row["address"];
                        ?><br>
                       <b>Contact :</b><?php echo $row["phone_no"];
                       ?><br>
                       <b>Email :</b> <?php echo $row["email"];
                        ?><br>
                       <b>Cost:</b><?php echo $row["cost"];
                       ?><br>
                       <b>Package :</b><?php echo $row["package"];
                        ?><br>
                        <b>Package :</b><?php echo $row["date"];
                        ?><br>
                        <b>Package :</b><?php echo $row["time"];
                        ?><br>
                       
                       <input type="hidden" name="hidden_uid" value="<?php echo $row["uid"]; ?>" />
    
                   </form><?php
                     }?>
                 </div><?php
                 }


?>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" name="book" value="book">Done</button>
      </div>
    </div>
  </div>
</div>
                       <?php
                       if((isset($_SESSION["user"]) || isset($_SESSION["admin"]) )== null){
                        ?>
                       <input type="button"  class="btn btn-outline-success" data-toggle="modal" name="notlin" value="Book" data-target="#cautionModal">

                       <div class="modal fade" id="cautionModal" tabindex="-1" role="dialog" aria-labelledby="cautionModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cautionModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4>You are not Logged in!</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
                       <?php

                       }
                        else if(isset($_SESSION["book_cart_pl"])){
                        ?>
                       <input type="button"  class="btn  btn-outline-success" data-toggle="modal" name="alb" value="Book" data-target="#exModal">
 <div class="modal fade" id="exModal" tabindex="-1" role="dialog" aria-labelledby="exModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exModalLabel">Confirm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4>You have already booked a Planner</h4>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-success" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
                       <?php
                       //echo "hjghg";
                       }
                       else if($_SESSION["book"]  || ($_SESSION["user"][0]["user_plb"])){
                        //echo $_SESSION["book"];
                        ?>
                       <input type="submit"  class="btn  btn-outline-success" name="book" value="Book" disabled>
                       <?php
                       }
                       else if(isset($_SESSION["admin"])){
                        //echo $_SESSION["book"];
                        ?>
                       <input type="submit"  class="btn  btn-outline-success" name="book" value="Book">
                       <?php
                       }
                       else{
                        ?>
                       <input type="button"  class="btn  btn-outline-success" data-toggle="modal" name="confirm" value="Book" data-target="#exampleModal">
                       

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4>Do You Want to Confirm Your Booking?</h4><br>
        <h6>You can only book 1 Event Planner</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-success" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" name="book" value="book">Confirm</button>
      </div>
    </div>
  </div>
</div>


                       <?php
                       
                       }

                       ?><!--
                       <input type="submit"  class="btn btn-sm btn-outline-secondary" name="cancel" value="cancel">
                      -->
                </div>
             
                        </form>
                      
                      <?php
                     }
                     ?></div><?php

                }?>
             </div>   
          </body>
          </html>


