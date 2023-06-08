 <?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page or show error
    die('Please login to continue');
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
    
    
    

    <link href="./dashboard.css" rel="stylesheet">

    <style>

  
        
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
            <div class="col-lg-8">

            <div id="exerciseCardsContainer" class="row">
      
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
            </div>
            </main>
  </div>
</div>
<body>
        <script>
  const API_URL = 'https://musclewiki.p.rapidapi.com/exercises';
  const headers = {
    'X-RapidAPI-Key': '3ec250bf1cmsh6ba74139d7fb301p1de1eejsn7dbf4db26f0c',
    'X-RapidAPI-Host': 'musclewiki.p.rapidapi.com'
  };
  let exercises; // Declare exercises at a higher scope
  let currentPage = 1;
  const itemsPerPage = 10; // Change this to alter the number of items per page
   

// Global variable to store the original exercises data
let originalExercisesData = [];

async function loadExercises() {
  const response = await fetch(API_URL, {
    method: 'GET',
    headers: headers
  });
  exercises = await response.json(); // Store the result in exercises
  originalExercisesData = [...exercises]; // Store a copy of the original data
  displayExercises(exercises.slice(0, itemsPerPage)); // Call displayExercises directly from here
  createPaginationButtons(Math.ceil(exercises.length / itemsPerPage));
}

loadExercises();

async function loadSavedExercises() {
  // Fetch the saved exercise IDs from the PHP script
  const response = await fetch('./getSavedExercises.php');
  const exerciseIds = await response.json();
  
  // Fetch each exercise from the API
  const exercises = [];
  for (const id of exerciseIds) {
    const response = await fetch(`${API_URL}${id}`, {
      method: 'GET',
      headers: headers
    });
    const exercise = await response.json();
    exercises.push(exercise);
  }

  // Now `exercises` contains all the exercises saved by the user
  displayExercises(exercises); // Display them
}

function displayModalData(id) {
  const exercise = exercises.find(exercise => exercise.id === Number(id));

  if (!exercise) {
    console.log(`Exercise with id ${id} not found.`);
    return;
  }

  const modalBody = document.querySelector('.modal-body');
  const modalTitle = document.querySelector('.modal-header');
  
  modalTitle.innerHTML = `
    <h5 class="modal-title" id="exerciseModalLabel">${exercise.exercise_name}</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  `;

  modalBody.innerHTML = `
    <div class="modal-body">
      <video autoplay loop muted class="card-img-top modal-video">
        <source src="${exercise.videoURL}"  type="video/mp4">
        Your browser does not support the video tag.
      </video>
      <video autoplay loop muted class="card-img-top modal-video">
        <source src="${exercise.videoURL[1]}"  type="video/mp4">
        Your browser does not support the video tag.
      </video>
      <h3>Category: ${exercise.Category}</h3>
      <h3>Difficulty: ${exercise.Difficulty}</h3>
      <h3>Force: ${exercise.Force}</h3>
      <h3>Grips: ${exercise.Grips}</h3>
      <h5>Details:</h5>
      <p>${exercise.details}</p>
      <h5>Steps:</h5>
      <ol>
        ${exercise.steps.map(step => `<li>${step}</li>`).join('')}
      </ol>
      <div class="ratio ratio-16x9">
        <iframe src="${exercise.youtubeURL}" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
      </div>
    </div>
  `;
}

function displayExercises(data) {
  const exerciseCardsContainer = document.querySelector('#exerciseCardsContainer');
  exerciseCardsContainer.innerHTML = '';

  data.forEach(exercise => {
    const exerciseCard = document.createElement('div');
    exerciseCard.classList.add('col-12', 'col-sm-6' ,'col-md-6','col-lg-3','col-xl-3','col-xxl-2' );
    exerciseCard.classList.add('mb-4');

    exerciseCard.innerHTML = `
      <div class="card bg-dark text-white col-12">
        <div class="card-body text-capitalize">
          <video autoplay loop muted class="card-img-top">
            <source src="${exercise.videoURL}"  type="video/mp4">
            Your browser does not support the video tag.
          </video>
          <h5 class="card-title">${exercise.exercise_name}</h5>
          <p class="card-text">Click below to view exercise details.</p>
          <button type="button" class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#exerciseModal" onclick="displayModalData('${exercise.id}')">Details</button>
          <button type="button" class="btn btn-custom" onclick="displayModalSave('${exercise.id}')">Save</button>
        </div>
      </div>
    `;

    exerciseCardsContainer.appendChild(exerciseCard);
  });
}


function createPaginationButtons(totalPages) {
const paginationContainer = document.querySelector('.pagination');
paginationContainer.innerHTML = ''; // Clear existing buttons

const addPageButton = (page, active = false) => {
  const pageButton = document.createElement('li');
  pageButton.className = 'page-item my-custom-pagination-button' + (active ? ' active' : '');
  pageButton.innerHTML = `<a class="page-link my-custom-pagination-button" onclick="goToPage(${page})">${page}</a>`;
  paginationContainer.appendChild(pageButton);
};

const addDots = () => {
  const dots = document.createElement('li');
  dots.className = 'page-item disabled my-custom-pagination-button';
  dots.innerHTML = `<a class="page-link my-custom-pagination-button">...</a>`;
  paginationContainer.appendChild(dots);
};

// Previous Button
const previousButton = document.createElement('li');
previousButton.className = 'page-item my-custom-pagination-button';
previousButton.innerHTML = `<a class="page-link my-custom-pagination-button" onclick="changePage(-1)">Previous</a>`;
paginationContainer.appendChild(previousButton);

// First page
addPageButton(1, currentPage === 1);

if (currentPage > 5) {
  addDots();
}

// Surrounding pages
for (let i = Math.max(2, currentPage - 2); i <= Math.min(totalPages - 1, currentPage + 2); i++) {
  addPageButton(i, currentPage === i);
}

if (currentPage < totalPages - 2) {
  addDots();
}

// Last page
if (totalPages > 1) {
  addPageButton(totalPages, currentPage === totalPages);
}

// Next Button
const nextButton = document.createElement('li');
nextButton.className = 'page-item my-custom-pagination-button';
nextButton.innerHTML = `<a class="page-link my-custom-pagination-button" onclick="changePage(1)" >Next</a>`;
paginationContainer.appendChild(nextButton);
}

function goToPage(pageNumber) {
currentPage = pageNumber;
const startIndex = (currentPage - 1) * itemsPerPage;
const endIndex = startIndex + itemsPerPage;
displayExercises(exercises.slice(startIndex, endIndex));
createPaginationButtons(Math.ceil(exercises.length / itemsPerPage)); // Call createPaginationButtons here
} 

function changePage(direction) {
const newPage = currentPage + direction;
if (newPage < 1 || newPage > Math.ceil(exercises.length / itemsPerPage)) {
  return; // Don't go past the first or last page
}

goToPage(newPage);
}
        </script>

<script src="./PersonalS.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

       <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
        

  </body>
</html>
