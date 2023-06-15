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
    <title>Astraeus - Exercies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    

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
        <a class="nav-link px-3" href="#">Sign out</a>
      </div>
    </div>
  </header>
  
<div class="container-fluid ">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="./UserInt.php">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="./PersonalSpace.php">
              <i class="fa fa-user" aria-hidden="true"></i>
              Personal Wellbeing
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="./BFP.php">
              <i class="fa fa-calculator" aria-hidden="true"></i>
              Body Fat Percentage
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="./Exercises.php">
              <i class="fas fa-light fa-dumbbell align-text-bottom"></i>
              Exercise Tutorials
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="./radio.php">
              <i class="fa fa-music" aria-hidden="true"></i>
              Live Music
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Exercises</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                Categories
              </button>
              <ul class="dropdown-menu ">
                <li><a class="dropdown-item" href="#" onclick="filterByCategory('Barbell')">Barbell</a></li>
                <li><a class="dropdown-item" href="#" onclick="filterByCategory('Dumbbells')">Dumbbells</a></li>
                <li><a class="dropdown-item" href="#" onclick="filterByCategory('Kettlebells')">Kettlebells</a></li>
                <li><a class="dropdown-item" href="#" onclick="filterByCategory('Stretches')">Stretches</a></li>
                <li><a class="dropdown-item" href="#" onclick="filterByCategory('Cables')">Cables</a></li>
                <li><a class="dropdown-item" href="#" onclick="filterByCategory('Band')">Band</a></li>
                <li><a class="dropdown-item" href="#" onclick="filterByCategory('Plate')">Plate</a></li>
                <li><a class="dropdown-item" href="#" onclick="filterByCategory('TRX')">TRX</a></li>
                <li><a class="dropdown-item" href="#" onclick="filterByCategory('Bodyweight')">Bodyweight</a></li>
                <li><a class="dropdown-item" href="#" onclick="filterByCategory('Yoga')">Yoga</a></li>
                <li><a class="dropdown-item" href="#" onclick="filterByCategory('Machine')">Machine</a></li>
              </ul>
            </div>
            <div class="btn-group me-2">
              <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                Difficulties
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#" onclick="filterByDifficulty('Beginner')">Beginner</a></li>
                <li><a class="dropdown-item" href="#" onclick="filterByDifficulty('Intermediate')">Intermediate</a></li>
                <li><a class="dropdown-item" href="#" onclick="filterByDifficulty('Advanced')">Advanced</a></li>
              </ul>
            </div>
            <div class="btn-group me-2">
              <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                Forces
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#" onclick="filterByForce('Pull')">Pull</a></li>
                <li><a class="dropdown-item" href="#" onclick="filterByForce('Push')">Push</a></li>
                <li><a class="dropdown-item" href="#" onclick="filterByForce('Hold')">Hold</a></li>
              </ul>
            </div>
            <div class="btn-group me-2">
              <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                Muscles
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#" onclick="filterByMuscle('Biceps')">Biceps</a></li>
                <li><a class="dropdown-item" href="#" onclick="filterByMuscle('Forearms')">Forearms</a></li>
                <li><a class="dropdown-item" href="#" onclick="filterByMuscle('Shoulders')">Shoulders</a></li>
                <li><a class="dropdown-item" href="#" onclick="filterByMuscle('Triceps')">Triceps</a></li>
                <li><a class="dropdown-item" href="#" onclick="filterByMuscle('Quads')">Quads</a></li>
                <li><a class="dropdown-item" href="#" onclick="filterByMuscle('Glutes')">Glutes</a></li>
                <li><a class="dropdown-item" href="#" onclick="filterByMuscle('Lats')">Lats</a></li>
                <li><a class="dropdown-item" href="#" onclick="filterByMuscle('Mid back')">Mid back</a></li>
                <li><a class="dropdown-item" href="#" onclick="filterByMuscle('Lower back')">Lower back</a></li>
                <li><a class="dropdown-item" href="#" onclick="filterByMuscle('Hamstrings')">Hamstrings</a></li>
                <li><a class="dropdown-item" href="#" onclick="filterByMuscle('Chest')">Chest</a></li>
                <li><a class="dropdown-item" href="#" onclick="filterByMuscle('Abdominals')">Abdominals</a></li>
                <li><a class="dropdown-item" href="#" onclick="filterByMuscle('Obliques')">Obliques</a></li>
                <li><a class="dropdown-item" href="#" onclick="filterByMuscle('Traps')">Traps</a></li>
                <li><a class="dropdown-item" href="#" onclick="filterByMuscle('Calves')">Calves</a></li>
              </ul>
            </div>
          </div>
      </div>
 <div id="damn">
 <div id="exerciseCardsContainer" class="row">
 </div>
      </div>

    </div>

    <div id="loadingSpinner" class="text-center mt-5">
  <div class="spinner-border mt-5" role="status">
    <span class="visually-hidden mt-5">Loading...</span>
  </div>
</div>


    
      
      
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
      <div class="modal fade" id="Savenotice" tabindex="-1" aria-labelledby="SavenoticeModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
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
      
      
      <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->

    </main>
  </div>
  
</div>
<nav aria-label="Page navigation example ">
        <ul class="pagination justify-content-center ">
        </ul>
      </nav>
<script>
  
  </script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

       <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
        
       <script src="./Dash-Exerc.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>
</html>
