<!doctype html>
<html lang="en">
  <head>
    <title>jobFind</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

  <body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="#">NeedJob</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

     
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
         
         <?php if(isset($_SESSION['user_email'])) { ?>   
            <li class="nav-item">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false">
                      <?php echo $_SESSION['user_email'];?></a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="?page=myapplication&id=<?php echo $_SESSION['id']; ?>">My Applications</a>
                      <a class="dropdown-item" href="?page=EditResume">Create Resume</a>
                      <a class="dropdown-item" href="?page=showReports&id=<?php echo $_SESSION['id']; ?>">Show All Reports</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="?function=logout">Logout</a>
                    </div>
                  </li>
                 

            </li>
            
            
            <li class="nav-item">
              <a class="nav-link" href="?page=viewResume&id=<?php echo $_SESSION['id']; ?>">View Resume</a>
            </li>
         <?php }?>
            

          <?php if(!isset($_SESSION['id'])) {?>
            <li class="nav-item">
              <a class="nav-link" data-toggle="modal" data-target="#loginModel" href="#">Login</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#createAccount" href="#">Create Account</a>
            </li>
          <?php }?>
            
           <li>

          </ul>
        </div>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
            <?php if(!isset($_SESSION['user_email'])) { ?>   
              <li class="nav-item active">
                <li class="nav-item">
                    <a class="nav-link" id="companyBtn" data-toggle="modal" data-target="#loginModel1" >Company dashboard</a>
                </li>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?function=logout">log out</a>
              </li>
            </ul>   
            <?php }?>
            
        </div>
      
      </nav>

