 <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Venue Entry</title>
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
            <a class="navbar-brand px-3" href="index.html"> 
      
              <div style="color:#093B04;font-family:Pristina;">
                <b style="font-size: 2.5em;  ">Elite</b>
              Event Management</div>
             </a>
             <a class="navbar-brand pr-2" href=""> <h4>Venue </h4></a>
             <a class="navbar-brand" href=""> <h4>Event Planner</h4> </a>
             <a class="navbar-brand" href=""><h4> Photographer</h4> </a></div>
             
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

         <form class="container form-inline p-lg-5 mx-auto" style="font-family: Century;" action="action.php" method="POST" enctype="multipart/form-data">
          <div class="d-flex">
           <h5 class="m-2 col-md-6">ID: <input class="form-control col-md-7" type="number" name="vid"></h5>
           <h5 class="m-2 col-md-6">Name: <input class="form-control col-md-9" type="text" name="vname"></h5>
         </div>
         <div class="d-flex">
           <h5 class="m-2 col-md-6">Email: <input class="form-control col-md-7" type="email" name="vmail"></h5>
           <h5 class="m-2 col-md-6">Address: <input class="form-control col-md-7" type="text" name="vaddress"></h5>
         </div>
         <div class="d-flex  ">
           <h5 class="m-2 col-md-6">Phone Number: <input class="form-control col-md-4" type="number" name="vnumber"></h5>
           <h5 class="m-2 col-md-6">Bank Account Details: <input class="form-control col-md-4" type="number" name="vbank"></h5>
         </div>
         <div class="d-flex ">
           <h4 class="m-2 col-md-6">Cost: <input class="form-control " type="number" name="vcost"></h4>
           <h4 class="m-2 col-md-6">Capacity: <input class="form-control " type="number" name="vcapacity"></h4>
         </div>
         <div class="d-flex">
           <h4 class="m-2 col-md-6">Date: <input class="form-control " type="date" name="vdate"></h4>
           <h4 class="m-2 col-md-6">Time: <input class="form-control " type="Time" name="vtime"></h4>
           </div>
         <input class="col-md-6" type="file " name="file">
           <button class="btn-default class="m-3" type="submit" name="submit">
             Upload
           </button>
        
         </form>







          </body>
          </html>