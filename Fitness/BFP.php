<?php

 session_start();
 
 
 if (!isset($_SESSION['user_id'])) {
   // Redirect to login page
   header('Location: ./login.php');
   exit(); // Important: stop executing the rest of the script
 }

// Connect to your database. Replace the following with your actual database connection details
$db = new PDO('mysql:host=localhost;dbname=gymdata;charset=utf8', 'root', '');

// Assuming that the user id is stored in the session
$userId = $_SESSION['user_id'];
$query = $db->prepare('SELECT * FROM user WHERE UserID = ?');
$query->execute([$userId]);
$userData = $query->fetch(PDO::FETCH_ASSOC);

$birthDate = new DateTime($userData['Age']);
$currentDate = new DateTime();
$ageInterval = $currentDate->diff($birthDate);
$age = $ageInterval->y;

$gender = $userData['Gender'] == 0 ? 'male' : 'female';



?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Dashboard Template · Bootstrap v5.3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <link href="./dashboard.css?v=<?php echo time(); ?>" rel="stylesheet">

  </head>
  <body class="bg-dark
  text-light">
    
  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class=" text-center logo navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#"><span>Astraeus</span></a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation " >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="position-relative w-100">
      <form action="">
      <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search" type="text" id="searchInput" oninput="updateSuggestions()" placeholder="Search exercises..." autocomplete="off">
      <button class="btn btn-outline-success" type="submit" style="display: none;">Search</button>
    </form>
      <div id="suggestions" class="suggestions position-absolute w-100">
      </div>
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
            <a class="nav-link" href="./PersonalSpace.php">
              <span data-feather="file" class="align-text-bottom"></span>
              Personal Wellbeing
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="./BFP.php">
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

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
          <span class="text-light">Saved reports</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle" class="align-text-bottom"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Year-end sale
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Body Fat Calculator</h1>
      </div>
 
      <body>
        <div class="container-fluid d-flex flex-column p-0 min-vh-100 p-3 body">
            <div class="row mx-0 mb-3 bg-dark flex-grow-1 rounded-5 h-100" id="calc-container">
                <div class="container-fluid mx-0 my-auto py-3">
                    <div class="container-lg px-0">
                        <div class="row d-flex justify-content-center mx-0">
                            <div class="d-xl-none col-12"></div>
                            <div class="col-auto d-flex align-items-stretch">
                                <div class="d-flex flex-column">
                                    <div class="position-relative d-flex flex-grow-1">
                                        <div id="img-toggler" class="w-100 border-top border-3 position-absolute bg-dark align-self-end"></div>
                                        <img src="./img/male.png" alt="male" id="body" class="mb-2">
                                    </div>
                                    <div class="mt-2 d-flex justify-content-between px-2">
                                        <button class="bg-transparent border-0 text-muted active" data-gender="<?php echo $gender; ?>" id="btn-male">
                                            <i class="fa-solid fa-mars"></i>
                                        </button>
                                        <button class="bg-transparent border-0 text-muted" data-gender="<?php echo $gender; ?>" id="btn-female">
                                            <i class="fa-solid fa-venus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 d-flex flex-column offset-xl-1 mt-4 mt-xl-0 px-0">
                                <div class="row flex-grow-1 mx-0 d-flex">
                                    <div class="text-center d-none d-xl-block calc-title">
                                        <h1 class="m-0">BFP Calculator</h1>
                                        <hr class="w-100 my-1"/>
                                        <p class="text-muted">Body Fat Percentage</p>
                                    </div>
                                    <form class="w-100 mx-0 px-0">
                                        <div class="row d-flex justify-content-center w-100 mx-0">
                                            <div class="text-center mb-3 col-12 col-sm-6 col-md-4">
                                                <div class="w-75 mx-auto">
                                                    <label class="form-label" for="neck-input">Neck</label>
                                                    <div class="input-group flex-nowrap shadow-sm">
                                                        <input class="form-control text-center" type="number"   id="neck-input" aria-describedby="neck-cm" min="20" max="80" value="<?php echo $userData['neck']; ?>"disabled>
                                                        <span class="input-group-text" id="neck-cm">cm</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center mb-3 col-12 col-sm-6 col-md-4">
                                                <div class="w-75 mx-auto">
                                                    <label class="form-label" for="waist-input">Waist</label>
                                                    <div class="input-group flex-nowrap shadow-sm">
                                                        <input class="form-control text-center" type="number" id="waist-input" aria-describedby="waist-cm" min="40" max="130"value="<?php echo $userData['waist']; ?>"disabled>
                                                        <span class="input-group-text" id="waist-cm">cm</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center mb-3 col-12 col-sm-6 col-md-4">
                                                <div class="w-75 mx-auto">
                                                    <label class="form-label" for="hip-input">Hip</label>
                                                    <div class="input-group flex-nowrap shadow-sm">
                                                        <input class="form-control text-center" type="number" id="hip-input" aria-describedby="hip-cm" min="40" max="130"value="<?php echo $userData['hip']; ?>"disabled>
                                                        <span class="input-group-text" id="hip-cm">cm</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center mb-3 col-12 col-sm-6 col-md-4">
                                                <div class="w-75 mx-auto">
                                                    <label class="form-label" for="age-input">Age</label>
                                                    <div class="input-group flex-nowrap shadow-sm">
                                                        <input class="form-control text-center" type="number" id="age-input" aria-describedby="age-years" min="1" max="80"value="<?php echo $age; ?>"disabled>
                                                        <span class="input-group-text" id="age-years">years</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center mb-3 col-12 col-sm-6 col-md-4">
                                                <div class="w-75 mx-auto">
                                                    <label class="form-label" for="height-input">Height</label>
                                                    <div class="input-group flex-nowrap shadow-sm">
                                                        <input class="form-control text-center" type="number" id="height-input" aria-describedby="height-cm" min="130" max="230"value="<?php echo $userData['Height']; ?>" disabled>
                                                        <span class="input-group-text" id="height-cm">cm</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center mb-3 col-12 col-sm-6 col-md-4 d-block d-md-none mb-5">
                                                <div class="w-75 mx-auto">
                                                    <label class="form-label" for="weight-input">Weight</label>
                                                    <div class="input-group flex-nowrap shadow-sm">
                                                        <input class="form-control text-center" type="number" id="weight-input" aria-describedby="weight-cm" min="40" max="160"value="<?php echo $userData['Weight']; ?>" disabled>
                                                        <span class="input-group-text" id="weight-kg">kg</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-column justify-content-center mb-5 d-none d-md-block">
                                                <div class="text-center position-relative w-100">
                                                    <label class="form-label" for="weight-range-input">Weight</label><br/>
                                                    <input class="form-range" type="range" id="weight-range-input" min="40" max="160" value="<?php echo $userData['Weight']; ?>"disabled>
                                                    <span id="weight-indicator" class="position-absolute text-white rounded-pill"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <button id="btn-calc" class="btn w-50 py-2 rounded-5 text-dark mt-auto mx-auto shadow">
                                        Calculate
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="modal fade" tabindex="-1" id="results-modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-dark">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
    
                    </div>
                </div>
            </div>
        </div>
      
    </main>
  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

       <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>


       <script src="./dashboard.js"></script>
       <script src="./BFP.js"></script>
        

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>
</html>
