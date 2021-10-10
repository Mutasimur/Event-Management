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
<div class=" my-4" style="margin: auto;">
            	<table style=" border:2px solid green; border-color:#093B04;  text-align: center;">
		<tr class="border-bottom m-2 p-2" style="font-size: 1.1rem; border:1.5px solid green; border-color:#093B04;">
			<th>Id</th>
			<th>Name</th>
			<th>Email</th>
			<th>Address</th>
			<th>Phone_no</th>
			<th>Bank_info</th>
			<th>Cost</th>
			<th>Package</th>
			<th>Date</th>
			<th>Time</th>
			<th>Booked</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>

	<?php 
 // to get values passe from form in login.php file

 $result = mysqli_query($conn,"Select * from photographer");
 
if(mysqli_num_rows($result)>0){
  
		 // echo "hbhcbajk";
			while ( $row = mysqli_fetch_array($result)) {
				
			//echo "wegd";
				$id=$row[0];
				$name=$row[1];
				$em=$row[2];
				$ad=$row[3];
				$pn=$row[4];
				$bi=$row[5];
				$co=$row[6];
				$cpc=$row[7];
				$dt=$row[8];
				$tm=$row[9];
				$bk=$row[10];
				?><tr class="border-bottom" style="font-size: 1rem;">
                	<td><?php echo $id;$_SESSION["id"]=$id; ?></td>
                	<td><?php echo $name; ?></td>
                	<td><?php echo $em; ?></td>
                	<td><?php echo $ad; ?></td>
                	<td><?php echo $pn; ?></td>
                	<td><?php echo $bi; ?></td>
                	<td><?php echo $co ;?></td>
                	<td><?php echo $cpc; ?></td>
                	<td><?php echo $dt; ?></td>
                	<td><?php echo $tm; ?></td>
                	<td><?php echo $bk; ?></td>
                	<td><input type="button"  class="btn btn-sm btn-default" data-toggle="modal" name="update" value="Update" data-target="#updateModal"> </td>
                	<td><input type="button"  class="btn btn-sm btn-default" data-toggle="modal" name="delete" value="Delete" data-target="#deleteModal"> </td>
                	</tr>
                	<?php

				

		
}
}

else{
	echo "not found";
}
?><tr><td style="font-size: 2rem;" colspan="13"><input type="button"  class="btn btn-sm btn-default" data-toggle="modal" name="insert" value="Insert Value" data-target="#insertModal"> </td></tr>
</table>
</div>

<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateModalLabel">Update Photographer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<div class="card text-center my-4" style=" max-width: 720px; margin: auto;">
  <div class="card-header">
  <h3> Photographer Information Update</h3>
  </div>
  <div class="container">
   

<form  method="post" class="form-inline" role="form" style="font-size: 2rem;text-align: center;" >
	<div class="form-group m-2">
		<label class="control-label mr-2" for="name"><h3>Id </h3></label>
	    <input class="form-control" type="text" name="id" class="textInput">
	</div>
	<div class="form-group m-2">
		<label class="control-label mr-2" for="name"><h3>Name  </h3></label>
	    <input class="form-control" type="text" name="name" class="textInput" >
	</div>
    <div class="form-group m-2">
    	<label class="control-label mr-2" for="em"><h3>Email Address </h3></label>
	    <input class="form-control" type="email" name="em" class="textInput">
	</div>
	<div class="form-group m-2">
		<label class="control-label mr-2" for="ad"><h3>Address </h3></label>
	    <input class="form-control" type="text" name="ad" class="textInput" >
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
		<label class="control-label mr-2" for="ps"><h3>Cost</h3></label>
	    <input class="form-control " type="number" name="co" class="textInput">
	</div>
	<div class="form-group m-2">
		<label class="control-label mr-2" for="ps"><h3>Package</h3></label>
	    <input class="form-control " type="text" name="cpc" class="textInput">
	</div>
	<div class="form-group m-2">
		<label class="control-label mr-2" for="ps"><h3>Date</h3></label>
	    <input class="form-control " type="date" name="dt" class="textInput">
	</div>
	<div class="form-group m-2">
		<label class="control-label mr-2" for="ps"><h3>Time</h3></label>
	    <input class="form-control " type="time" name="tm" class="textInput">
	</div>
	<div class="form-group m-2">
		<label class="control-label mr-2" for="ps"><h3>Booked</h3></label>
	    <input class="form-control " type="boolean" name="bk" class="textInput">
	</div>
    

  </div>
  <div class="card-footer text-muted">
    <div class="form-group m-2">
	<button class="btn btn-success btn-lg form-control col-3" type="submit" name="submit" value=submit>Update</button>
	</div class="form-group">
  </div>
</div>
</form>
    <?php
    //print_r($_SESSION);
	if(isset($_POST["submit"]))
	{
		$pid=$_SESSION["id"];
		$sql="UPDATE photographer Set `p_id`='$_POST[id]',`p_name`='$_POST[name]',`email`='$_POST[em]',`address`='$_POST[ad]',`phone_no`='$_POST[pn]',`bank_info`='$_POST[bi]',`cost`='$_POST[co]',`package`='$_POST[cpc]',`date`='$_POST[dt]',`time`='$_POST[tm]',`booked`='$_POST[dt]' Where `p_id`='$pid'";
		$data=mysqli_query($conn,$sql);

		if($data)
		{
           // $_SESSION["user"][0]["user_name"]=$_POST["name"];
			echo "Updated";
			echo '<script>window.location="ph_up.php"</script>';  
		}

	} 
	else{
		//echo "error";
	}
	?>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    

    <div style="" class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
	
	Delete Item?
    <?php
//echo $_SESSION["id"];
    ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form method="post">
        <input type="submit" class="btn btn-primary" name="sub" value="Delete">
    </form>
        <?php
       if( isset($_POST["sub"])){
        	echo "hh";
  $dpid=$_SESSION["id"];
$query = "DELETE FROM `photographer` WHERE `p_id`='$dpid'"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error());

			//echo "Deleted";
			echo '<script>location="ph_up.php"</script>';
			//header('Location:v_up.php'); 
}

?>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="insertModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="insertModalLabel">Insert Information about a new Photographer </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<div class="card text-center my-4" style=" max-width: 720px; margin: auto;">
  <div class="card-header">
  <h3> Photographer Information Entry</h3>
  </div>
  <div class="container">
   

<form  method="post" class="form-inline" role="form" style="font-size: 2rem;text-align: center;" >
	<div class="form-group m-2">
		<label class="control-label mr-2" for="name"><h3>Id </h3></label>
	    <input class="form-control" type="text" name="iid" class="textInput">
	</div>
	<div class="form-group m-2">
		<label class="control-label mr-2" for="name"><h3>Name  </h3></label>
	    <input class="form-control" type="text" name="name" class="textInput" >
	</div>
    <div class="form-group m-2">
    	<label class="control-label mr-2" for="em"><h3>Email Address </h3></label>
	    <input class="form-control" type="email" name="em" class="textInput">
	</div>
	<div class="form-group m-2">
		<label class="control-label mr-2" for="ad"><h3>Address </h3></label>
	    <input class="form-control" type="text" name="ad" class="textInput" >
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
		<label class="control-label mr-2" for="ps"><h3>Cost</h3></label>
	    <input class="form-control " type="number" name="co" class="textInput">
	</div>
	<div class="form-group m-2">
		<label class="control-label mr-2" for="ps"><h3>Package</h3></label>
	    <input class="form-control " type="text" name="cpc" class="textInput">
	</div>
	<div class="form-group m-2">
		<label class="control-label mr-2" for="ps"><h3>Date</h3></label>
	    <input class="form-control " type="date" name="dt" class="textInput">
	</div>
	<div class="form-group m-2">
		<label class="control-label mr-2" for="ps"><h3>Time</h3></label>
	    <input class="form-control " type="time" name="tm" class="textInput">
	</div>
	<div class="form-group m-2">
		<label class="control-label mr-2" for="ps"><h3>Booked</h3></label>
	    <input class="form-control " type="boolean" name="bk" class="textInput">
	</div>
    

  </div>
  <div class="card-footer text-muted">
    <div class="form-group m-2">
	<button class="btn btn-success btn-lg form-control col-3" type="submit" name="submit" value=submit>Insert</button>
	</div class="form-group">
  </div>
</div>
</form>
    <?php
    //print_r($_SESSION);
	if(isset($_POST["submit"]))
	{
		$vid=$_SESSION["id"];
		$sql="INSERT INTO `photographer` Set `p_id`='$_POST[iid]',`p_name`='$_POST[name]',`email`='$_POST[em]',`address`='$_POST[ad]',`phone_no`='$_POST[pn]',`bank_info`='$_POST[bi]',`cost`='$_POST[co]',`package`='$_POST[cpc]',`date`='$_POST[dt]',`time`='$_POST[tm]',`booked`='$_POST[dt]'";
		$data=mysqli_query($conn,$sql);

		if($data)
		{
           // $_SESSION["user"][0]["user_name"]=$_POST["name"];
			echo "Updated";
			echo '<script>window.location="ph_up.php"</script>';  
		}

	} 
	else{
		//echo "error";
	}
	?>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    
</body>
</html>

