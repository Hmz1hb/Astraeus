 <?php
session_start();


if (!isset($_SESSION['user_id'])) {
  // Redirect to login page
  header('Location: ./login.php');
  exit(); // Important: stop executing the rest of the script
}

$userId = $_SESSION['user_id']; 


?>




<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Dashboard Template · Bootstrap v5.3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    
    

    <link href="./dashboard.css?v=<?php echo time(); ?>" rel="stylesheet">

    <style>

.error-msg  {
    color: red;
    font-size: 12px;
  }
        
      </style>
  </head>
  <body class="bg-dark
  text-light">
    
  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class=" text-center logo navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#"><span>Astraeus</span></a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation " >
      <span class="navbar-toggler-icon"></span>
    </button>
      <!-- <div class="position-relative w-100">
        <form action="">
        <input class="form-control form-control-dark w-100 rounded-0 border-0  " type="text" placeholder="Search" aria-label="Search" type="text" id="searchInput" oninput="updateSuggestions()" placeholder="Search exercises..." autocomplete="off" >
        <button class="btn btn-outline-success" type="submit" style="display: none;">Search</button>
      </form>
        <div id="suggestions" class="suggestions position-absolute w-100">
        </div> -->
    </div>
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="./signout.php">Sign out</a>
      </div>
    </div>
  </header>
  
<div class="container-fluid ">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block  sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="./UserInt.php">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="./PersonalSpace.php">
              <span data-feather="file" class="align-text-bottom"></span>
              Personal Wellbeing
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="./BFP.php">
              <span data-feather="file" class="align-text-bottom"></span>
              Body Fat Percentage
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fa-solid fa-calculator"></i>
              Macro Calculation
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fa-solid fa-calculator"></i>
              Calories Calculator
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./food.php">
              <i class="fa-solid fa-drumstick-bite"></i>
              Mass Meals Recipes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="./Exercises.php">
              <i class="fas fa-light fa-dumbbell align-text-bottom"></i>
              Exercise Tutorials
            </a>
          </li>
        </ul>

  
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 ">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Your Profile</h1>
      </div>
      <section>
        <div class="container-fluid py-5">
          <div class="row">
            <div class="col-lg-4 ">
              <div class="card mb-4 bg-dark text-light">
                <div class="card-body text-center ">
                  <img src="./img/author-c.png" alt="avatar"
                    class="rounded-circle img-fluid" style="aspect-ratio: 1; width: 15rem;">
                  <!-- <h5 class="my-3" id="fullName">First name + last name</h5> -->
                  <p class=" mb-1">is he a premuim user</p>
                  <!-- <p class=" mb-4">Gender</p> -->
                  <div class="d-flex justify-content-center mb-2">
                    <button type="button" class="btn btn-custom" id="editButton">Edit</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="card mb-4 bg-dark text-light ">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0" >Full Name</p>
                    </div>
                    <div class="col-sm-9">
                      <p class=" mb-0" id="fullName"></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                      <p class=" mb-0"id="email"></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Phone</p>
                    </div>
                    <div class="col-sm-9">
                      <p class=" mb-0" id="phone"></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Gender</p>
                    </div>
                    <div class="col-sm-9">
                      <p class=" mb-0" id="gender"></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Weight</p>
                    </div>
                    <div class="col-sm-9">
                      <p class=" mb-0" id="weight"></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Height</p>
                    </div>
                    <div class="col-sm-9">
                      <p class=" mb-0" id="height"></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Age</p>
                    </div>
                    <div class="col-sm-9">
                      <p class=" mb-0" id="age"></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Waist Measurements</p>
                    </div>
                    <div class="col-sm-9">
                      <p class=" mb-0" id="Waist"></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Neck Measurements</p>
                    </div>
                    <div class="col-sm-9">
                      <p class=" mb-0" id="Neck"></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Hip Measurements</p>
                    </div>
                    <div class="col-sm-9">
                      <p class=" mb-0" id="Hip"></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <!-- <div class="col-md-6">
                  <div class="card mb-4 mb-md-0">
                    <div class="card-body">
                      <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                      </p>
                      <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                      <div class="progress rounded" style="height: 5px;">
                        <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                      <div class="progress rounded" style="height: 5px;">
                        <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                      <div class="progress rounded" style="height: 5px;">
                        <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                      <div class="progress rounded" style="height: 5px;">
                        <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                      <div class="progress rounded mb-2" style="height: 5px;">
                        <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </section>

      <div class="modal" tabindex="-1" id="resultModal">
        <div class="modal-dialog">
          <div class="modal-content bg-dark">
            <div class="modal-header">
              <h5 class="modal-title">Result</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Your Exercises</h1>
      </div>
            <div class="col-12">

            <div id="exerciseCardsContainer" class="row">
      
            </div>  
            </div>    
            <nav aria-label="Page navigation example ">
        <ul class="pagination justify-content-center ">
        </ul>
      </nav>
            <!-- Modal -->
      <div class="modal fade" id="exerciseModal" tabindex="-1" aria-labelledby="exerciseModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-xl">
          <div class="modal-content bg-dark ">
            <div class="modal-header">
              
            </div>
            <div class="modal-body">
              <!-- API data will be dynamically inserted here -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-custom text" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

             <!-- Modal -->
             <div class="modal fade" id="Deletenotice" tabindex="-1" aria-labelledby="exerciseModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-xl">
          <div class="modal-content bg-dark ">
            <div class="modal-header">
              
            </div>
            <div class="modal-body">
              <!-- API data will be dynamically inserted here -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-custom text" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
            </div>
            </main>
  </div>
</div>
<body>
        <script>
        </script>

<script src="./PersonalS.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

       <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
        

  </body>
</html>
