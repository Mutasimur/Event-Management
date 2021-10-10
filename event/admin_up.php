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
            <title>Update Info</title>
            <link rel="stylesheet" type="text/css" href="style.css">
            <link rel="stylesheet" href="css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        </head>
        <body style="background: #f6f6fd; font-family: perpetua bold;color:#093B04; ">
          <header class="site-header sticky-top" style="font-family: perpetua bold">
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

<div class="card text-center my-4" style=" max-width: 720px; margin: auto;">
  <div class="card-header">
  <h3> Edit Your Information</h3>
  </div>
  <div class="container">
   

<form  method="post" class="form-inline" role="form" style="font-size: 2rem;text-align: center;" >
	<div class="form-group m-2">
		<label class="control-label mr-2" for="name"><h3>Name  </h3></label>
	    <input class="form-control" type="text" name="name" class="textInput" >
	</div>
    <div class="form-group m-2">
    	<label class="control-label mr-2" for="em"><h3>Email Address </h3></label>
	    <input class="form-control" type="email" name="em" class="textInput">
	</div>
	<div class="form-group m-2">
		<label class="control-label mr-2" for="pn"><h3>Phone Number </h3></label>
	    <input class="form-control" type="text" name="pn" class="textInput" >
	</div>
	<div class="form-group m-2">
		<label class="control-label mr-2" for="bi"><h3>Bank Info </h3></label>
	    <input class="form-control" type="number" name="bi" class="textInput" >
	</div>
	<div class="form-group m-2">
		<label class="control-label mr-2" for="ps"><h3>Password</h3></label>
	    <input class="form-control " type="password" name="ps" class="textInput" >
	</div>
    

  </div>
  <div class="card-footer text-muted">
    <div class="form-group m-2">
	<button class="btn btn-success btn-lg form-control col-3" type="submit" name="submit" value=submit> Confirm Edit</button>
	</div class="form-group">
  </div>
</div>
</form>
   <?php
    //print_r($_SESSION);
	if(isset($_POST["submit"]))
	{
		$sql="UPDATE `admin` Set `a_name`='$_POST[name]',`email`='$_POST[em]',`phone_no`='$_POST[pn]',`bank_info`='$_POST[bi]',`password`='$_POST[ps]' Where `admin_id`='$a_id'";
		$data=mysqli_query($conn,$sql);

		if($data)
		{
            $verifya = "SELECT * FROM `admin` WHERE `email` = '$_POST[em]' and `password` = '$_POST[ps]' ";
     $resulta = mysqli_query($conn, $verifya);  
       //echo "okay1";
     //echo (mysqli_num_rows($result));
    // echo $verify;
    if(mysqli_num_rows($resulta) > 0)  {
                // echo "okay2";
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
			//echo "Updated";
			echo '<script>window.location="user_up.php"</script>';  
		}

	} 
	else{
		//echo "error";
	}
	?>

    
    
</body>
</html>

