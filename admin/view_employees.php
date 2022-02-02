<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Hospital</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Font Awesome JS -->
    
    
    <link rel="stylesheet" href="../assets/css/font-awesome.css">
    <link rel="stylesheet" href="../../css/jquery-ui.css">
    
    
</head>

<body>

<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar" class="sticky-top h-100">
        <div class="sidebar-header">
            <h3>Hospital Name</h3>
        </div>

        <ul class="list-unstyled components">
            <p>Sub Title</p>
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="#">Home 1</a>
                    </li>
                    <li>
                        <a href="#">Home 2</a>
                    </li>
                    <li>
                        <a href="#">Home 3</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">About</a>
            </li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="#">Page 1</a>
                    </li>
                    <li>
                        <a href="#">Page 2</a>
                    </li>
                    <li>
                        <a href="#">Page 3</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Portfolio</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
        </ul>
    </nav>
    
    <div class="container">
    
    
        <!--       navigation is here-->
        <nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#"><h3>Admin</h3></a>
      </li>
      
      
      </ul>
      
      
      <ul class="navbar-nav ml-auto">
         
         
      
      <li class="nav-item">
        <a class="nav-link" href="#"><h5>Username</h5></a>
      </li>
      
      <li class="nav-item">
        <a href="" class="btn btn-outline-success">Logout</a>
      </li>
      
      </ul>
    
  </div>
</nav>
<!--      navigation ends here-->
    
    
    <div class="paraoverview">
        <p style="font-size: 1.3em;">All Employee</p>
    </div>
    
    <div class="card" style="padding: 16px;">
      <p>Employee Infomation</p>
       <div class="row">
           <div class="col-md-8">
               <input type="text" class="form-control" placeholder="Search Patient">
           </div>
           
           <div class="col-md-4">
               <button class="btn btn-outline-success btn-block">Search</button>
           </div>
       </div>
        
          
           
    
           <table class="table">
               <thread>
                   <th>#</th>
                   <th>First Name</th>
                   <th>Middle Name</th>
                   <th>Last Name</th>
                   <th>Gender</th>
                   <th>Registered Date</th>
                   <th>Specialities</th>
                   <th>Action</th>
                   <th>Action</th>
               </thread>
           </table>
           
    </div>
    
    </div>
    
    

</div> 



</body>

</html>