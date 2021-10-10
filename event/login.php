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
            <title>Login</title>
            <link rel="stylesheet" type="text/css" href="style.css">
            <link rel="stylesheet" href="css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        </head>
        <body style="background: #f6f6fd; font-family: Perpetua bold;color:#093B04; ">
          <header class="site-header sticky-top" style="font-family:perpetua bold;">
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

<?php
 if(isset($_SESSION["user"] ) || isset($_SESSION["admin"])==null){
if (isset($_POST['submit'])) {
 // print_r($_SESSION);  

if((isset($_POST['email'])) && (isset($_POST['pwd'])) ){

   $usermail=$_POST['email'];
     $password=$_POST['pwd'];
     if(!empty($username) && !empty($password)){
     //echo $username;
     //echo "okay";
     $verify="SELECT * FROM `user` WHERE `email` = '$usermail' and `password` = '$password' ";
     $result = mysqli_query($conn, $verify);  
    // echo "okay1";
     //echo (mysqli_num_rows($result));
    // echo $verify;
    if(mysqli_num_rows($result) > 0)  {
              //    echo "okay2";
                  while($row = mysqli_fetch_array($result)) {
                 // echo $row["user_id"];
                   // echo "okay3";
//                  echo $row;
                  $user=array(
         'user_id'         =>    $row["user_id"],
         'user_name'         =>    $row["name"],
         'user_email'         =>    $row["email"],
         'user_bank'         =>    $row["bank_info"],
         'user_vb'         =>    $row["vb"],
         'user_plb'         =>    $row["plb"],
         'user_phb'         =>    $row["phb"],
                  );
                  $_SESSION["user"][0] = $user;  
                 // print_r($_SESSION);  
                    echo '<script>window.location="user.php"</script>';  
                }
                  }
                  else if (!empty($username) && !empty($password)) {
                   // echo "Accha";
                    $verifya = "SELECT * FROM `admin` WHERE `email` = '$usermail' and `password` = '$password' ";
     $resulta = mysqli_query($conn, $verifya);  
       echo "okay1";
     //echo (mysqli_num_rows($result));
    // echo $verify;
    if(mysqli_num_rows($resulta) > 0)  {
                 echo "okay2";
                  while($row = mysqli_fetch_array($resulta)) {
                 // echo $row["admin_id"];
                   // echo "okay3";
//                  echo $row;
                  $admin=array(
         'admin_id'         =>    $row["admin_id"],
         'admin_name'         =>    $row["a_name"],
         'admin_email'         =>    $row["email"],
                  );
                  $_SESSION["admin"][0] = $admin;  
                // print_r($_SESSION);  
                    echo '<script>window.location="admin.php"</script>';  
                }
                  }
                  else{
                    //echo "Somossa";
                  }
                }
                  else{
                    $state="InvalidInformation";
                    ?>
                    <div class="alert alert-success" role="alert">
                      Please Give Correct Information
                    </div>
                    
                  <?php }  

    
//echo"Okay";

     }
     else{
      $state="emailorPasswordisMissing";
      ?>
                    <div class="alert alert-success" role="alert">
                      You must enter a username and a password!
                    </div>
                    
                  <?php
     }
}
}
}
//adminLogin
else{
  $state=null;

   ?><div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>You must logout before logging into another account !</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
 <?php
}
?>

<div class="container my-3">
    <h1 class="page-header">Login</h1>
  
<form method="post" class="form-horizontal" role="form" action="login.php" >
    <div class="form-group">
      <label class="control-label col-sm-2" for="email"><h2>Email:</h2></label>
      <div class="col-sm-10">
        <input type="email" class="form-control" name="email" placeholder="Enter email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd"><h2>Password:</h2></label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" name="pwd" placeholder="Enter password">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox"> Remember me</label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button class="btn btn-lg  btn-success" type="submit" name="submit">Login</button>
      </div>
    </div>
</form>
</div>
<style>
h4{ margin-top:50px; }
</style>
</body>
</html>
