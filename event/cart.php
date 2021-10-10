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
        <body style="background: #f6f6fd; font-family: Pristina;color:#093B04; ">
          <header class="site-header sticky-top" style="font-family: Pristina;">
          <div class="navbar-light align-items-center shadow-sm " style="background:#d0fbcc;">
           <div class="navbar-brand d-flex justify-content-between">
           <div >
            <a class="navbar-brand px-3" href="index.php"> 
      
              <div style="color:#093B04;font-family:Pristina;">
                <b style="font-size: 2.5em;  ">Elite</b>
              Event Management</div>
             </a>
             <a class="navbar-brand pr-2" href="venuelist.php"> <h4>Venue </h4></a>
             <a class="navbar-brand" href="planner.php"> <h4>Event Planner</h4> </a>
             <a class="navbar-brand" href="photographer.php"><h4> Photographer</h4> </a></div>
             
               <div class="dropdown btn-group btn-default dropleft" style="font-size:1.3rem;">
              <form class="form-inline mt-2 pr-2">
        <input class=" mr-2" type="text" placeholder="" aria-label="Search">
        <button class="btn   btn-outline-success" type="submit" >Search</button>
      </form>
              
           <button class="btn btn-default" type="button" data-toggle="dropdown" data-target="options" aria-controls="navbarHeader" aria-expanded="true" aria-label="Toggle navigation" aria-haspopup="true">
            <img src="user.png">
          
        </button>
        <div class="dropdown-menu" style="" aria-labelledby="">
          
                <a class="border-bottom dropdown-item" href="index.html">Main Page</a>
                <a class="border-bottom dropdown-item" href="prediction.html">Get Prediction</a>
                <a class="border-bottom dropdown-item" href="analyzer.html">Traffic Analyzer</a>
                <a class="dropdown-item " href="optimal.html">Get Optimal Time</a>
            
        </div>
    </div>
  </div>
</div>

            </header>

<div class="container my-4">
<h2>Here's your Order Detail:</h2>
<table>  
                          <tr>  
                               <th width="40%">Item Name</th>  
                              
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>
                               <th width="5%">Action</th>   
                                
                          </tr> 
                           
</div>
          </body>
          </html>