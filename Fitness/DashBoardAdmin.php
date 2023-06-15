<?php
session_start();

if (!isset($_SESSION['adminID'])) {
  // Redirect to login page
  header('Location: ./loginAdmin.php');
  exit(); // Important: stop executing the rest of the script
}

$adminID = $_SESSION['adminID']; 



// Connect to the database
require_once 'db.php';

try {
  $pdo = new PDO($dsn, $user, $pass, $options);

  $stmt = $pdo->query("SELECT COUNT(*) as totalUsers FROM user");
  $row = $stmt->fetch();
  $totalUsers = $row['totalUsers'];

} catch (\PDOException $e) {
  throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

try {
  $pdo = new PDO($dsn, $user, $pass, $options);

  $stmt = $pdo->query("SELECT COUNT(*) as totalUsers FROM user");
  $row = $stmt->fetch();
  $totalUsers = $row['totalUsers'];

  $stmt = $pdo->query("SELECT Gender, 
  CASE 
    WHEN TIMESTAMPDIFF(YEAR, Age, CURDATE()) BETWEEN 16 AND 25 THEN '16-25'
    WHEN TIMESTAMPDIFF(YEAR, Age, CURDATE()) BETWEEN 26 AND 35 THEN '26-35'
    WHEN TIMESTAMPDIFF(YEAR, Age, CURDATE()) BETWEEN 36 AND 65 THEN '36-65'
    ELSE '65+' 
  END AS AgeRange 
  FROM user");
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (\PDOException $e) {
throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Astraeus Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="./dashboard.css" rel="stylesheet">
  </head>
  <body class="bg-dark text-light">
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="text-center logo navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#"><span>Astraeus</span></a>
      <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search" disabled>
      <div class="navbar-nav">
        <div class="nav-item text-nowrap">
          <a class="nav-link px-3" href="./signout.php">Sign out</a>
        </div>
      </div>
    </header>

    <div class="container-fluid">  
      <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
          <div class="position-sticky pt-3 sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./UserInt.php">
                  <span data-feather="home" class="align-text-bottom"></span>
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./Adminacc.php">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  Accounts
                </a>
              </li>
            </ul>

          </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Discover Exercies</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <!-- <a href="./Exercises.php">
                <button type="button" class="btn btn-sm btn-outline-secondary">
                  More Exercises
                </button>
              </a> -->
            </div>
          </div>

          <div class="row mt-5 justify-content-center ">
  <div class="col-12 col-sm-6 col-md-4 ">
    <div class="card mb-4 border border-0 ">
      <div class="card-body bg-dark text-white d-flex flex-column justify-content-center align-items-center">
        <h5 class="card-title">Total Users</h5>
        <h1 class="card-text fs-1" style="color:  #f9ef23;"><?php echo $totalUsers; ?></h1>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-md-4">
    <div class="card mb-4 border border-0">
      <div class="card-body bg-dark text-white d-flex flex-column justify-content-center align-items-center">
        <h5 class="card-title">Total Exercises</h5>
        <h1 class="card-text" id="totalExercises" style="color:  #f9ef23;"></h1>
      </div>
    </div>
  </div>
</div>


          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h2 class="h2">Gender to age ration</h2> 
            <div class="btn-toolbar mb-2 mb-md-0"> 
            </div>
          </div> 
          <div class="row">
  <div class="col-md-6">
    <canvas class="my-4 w-100" id="myChartMale"></canvas>
  </div>
  <div class="col-md-6">
    <canvas class="my-4 w-100" id="myChartFemale"></canvas>
  </div>
</div>

        </main>
        
      </div>
    </div>
    <script>

const API_URL = 'https://musclewiki.p.rapidapi.com/exercises';
const headers = {
  'X-RapidAPI-Key': '3ec250bf1cmsh6ba74139d7fb301p1de1eejsn7dbf4db26f0c',
  'X-RapidAPI-Host': 'musclewiki.p.rapidapi.com'
};

async function countExercises() {
  const response = await fetch(API_URL, {
    method: 'GET',
    headers: headers
  });

  const exercises = await response.json();
  
  // Get the HTML element with id 'totalExercises' and update its text content
  document.getElementById('totalExercises').textContent = exercises.length;
}

countExercises();

    </script>
  <!-- <script src="./UserInt.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script>
var data = <?php echo json_encode($data); ?>;

(() => {
  'use strict'

  feather.replace({ 'aria-hidden': 'true' })

  // Preprocess data
  var ageRanges = ['16-25', '26-35', '36-65', '65+'];
  var maleCounts = [0, 0, 0, 0];
  var femaleCounts = [0, 0, 0, 0];
  for (let i = 0; i < data.length; i++) {
    var index = ageRanges.indexOf(data[i].AgeRange);
    if (data[i].Gender === 0) {
      maleCounts[index]++;
    } else {
      femaleCounts[index]++;
    }
  }

  // Graphs
  var ctxMale = document.getElementById('myChartMale');
  var ctxFemale = document.getElementById('myChartFemale');

  new Chart(ctxMale, {
    type: 'doughnut',
    data: {
      labels: ageRanges,
      datasets: [{
        data: maleCounts,
        backgroundColor: [
          '#ff6384',
          '#36a2eb',
          '#cc65fe',
          '#ffce56'
        ]
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Male Age Ranges'
      }
    }
  });

  new Chart(ctxFemale, {
    type: 'doughnut',
    data: {
      labels: ageRanges,
      datasets: [{
        data: femaleCounts,
        backgroundColor: [
          '#ff6384',
          '#36a2eb',
          '#cc65fe',
          '#ffce56'
        ]
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Female Age Ranges'
      }
    }
  });

})()
</script>

  </body>
</html>
