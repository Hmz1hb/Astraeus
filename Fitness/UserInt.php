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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="./dashboard.css" rel="stylesheet">
  </head>
  <body class="bg-dark text-light">
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="text-center logo navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#"><span>Astraeus</span></a>
      <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
      <div class="navbar-nav">
        <div class="nav-item text-nowrap">
          <a class="nav-link px-3" href="#">Sign out</a>
        </div>
      </div>
    </header>

    <div class="container-fluid">  
      <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
          <div class="position-sticky pt-3 sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./UserInt.php">
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
                <a class="nav-link" href="./Exercises.php">
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
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <a href="./Exercises.php">
                <button type="button" class="btn btn-sm btn-outline-secondary">
                  Another Exercises
                </button>
              </a>
            </div>
          </div>
          <div class="container mt-5">
            <div id="exerciseList" class="row"></div>
          </div>

          <script>
            let exercises = [];
            const API_URL = 'https://musclewiki.p.rapidapi.com/exercises';
            const headers = {
              'X-RapidAPI-Key': '3ec250bf1cmsh6ba74139d7fb301p1de1eejsn7dbf4db26f0c',
              'X-RapidAPI-Host': 'musclewiki.p.rapidapi.com'
            };

            
            // Function to fetch random exercises from the API
          // Function to fetch random exercises from the API
async function fetchRandomExercises() {
  try {
    const response = await fetch(API_URL, {
      headers: headers
    });
    const data = await response.json();

    // Get 11 random exercises
    const randomExercises = getRandomElements(data, 8);

    // Modify the ID property to match the actual ID returned from the API
    const exercisesWithCorrectId = randomExercises.map((exercise, index) => ({
      ...exercise,
      id: index + 1
    }));
    const exercisesWithCorrectProperties = randomExercises.map(exercise => ({
      id: exercise.id,
      exercise_name: exercise.exercise_name,
      videoURL: exercise.videoURL,
      Category: exercise.Category,
      Difficulty: exercise.Difficulty,
      Force: exercise.Force || 'N/A', // Add a default value in case the property is missing
      Grips: exercise.Grips || 'N/A', // Add a default value in case the property is missing
      details: exercise.details || 'No details available', // Add a default value in case the property is missing
      steps: exercise.steps || [] // Add a default empty array in case the property is missing
    }));

    // Assign the modified exercises to the global exercises array
    exercises = exercisesWithCorrectProperties;

    // Assign the modified exercises to the global exercises array
    exercises = exercisesWithCorrectId;

    // Process and display the random exercises
    displayExercises(exercises);
  } catch (error) {
    console.log('Error:', error);
  }
}

            // Function to get random elements from an array
            function getRandomElements(array, count) {
              const shuffledArray = array.sort(() => Math.random() - 0.5);
              return shuffledArray.slice(0, count);
            }

            // Function to display the exercises
            function displayExercises(exercises) {
              const exerciseList = document.getElementById('exerciseList');
              exerciseList.innerHTML = '';

              exercises.forEach((exercise, index) => {
                if (index % 4 === 0) {
                  const row = document.createElement('div');
                  row.classList.add('row', 'mb-4');
                  exerciseList.appendChild(row);
                }

                const exerciseCard = document.createElement('div');
                exerciseCard.classList.add('col-md-3');
                exerciseCard.innerHTML = `
                  <div class="card bg-dark text-white col-12">
                    <div class="card-body text-capitalize">
                      <video autoplay loop muted class="card-img-top">
                        <source src="${exercise.videoURL}" type="video/mp4">
                        Your browser does not support the video tag.
                      </video>
                      <h5 class="card-title">${exercise.exercise_name}</h5>
                      <p class="card-text">Click below to view exercise details.</p>
                      <button type="button" class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#exerciseModal" onclick="displayModalData('${exercise.id}')">Details</button>
                      <button type="button" class="btn btn-custom" onclick="displayModalSave('${exercise.id}')">Save</button>
                    </div>
                  </div>
                `;

                exerciseList.appendChild(exerciseCard);
              });
            }

            // Call the function to fetch random exercises
            fetchRandomExercises();

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

  let modalContent = '';

  modalContent += `
    <div class="modal-body">
      <video autoplay loop muted class="card-img-top modal-video">
        <source src="${exercise.videoURL}"  type="video/mp4">
        Your browser does not support the video tag.
      </video>
      <video autoplay loop muted class="card-img-top modal-video">
        <source src="${exercise.videoURL[1]}"  type="video/mp4">
        Your browser does not support the video tag.
      </video>
  `;

  if (exercise.Category) {
    modalContent += `<h3>Category: ${exercise.Category}</h3>`;
  }

  if (exercise.Difficulty) {
    modalContent += `<h3>Difficulty: ${exercise.Difficulty}</h3>`;
  }

  if (exercise.Force) {
    modalContent += `<h3>Force: ${exercise.Force}</h3>`;
  }

  if (exercise.Grips) {
    modalContent += `<h3>Grips: ${exercise.Grips}</h3>`;
  }

 
  if (exercise.details) {
    modalContent += `<p><h5>Details:</h5>${exercise.details}</p>`;
  }

  modalContent += `<h5>Steps:</h5><ol>`;

  if (exercise.steps && exercise.steps.length > 0) {
    modalContent += `${exercise.steps.map(step => `<li>${step}</li>`).join('')}`;
  }

  modalContent += `</ol><div class="ratio ratio-16x9">
    <iframe src="${exercise.youtubeURL}" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
  </div></div>`;

  modalBody.innerHTML = modalContent;
}


            function displayModalSave(id) {
              // Functionality for saving the exercise
              $.ajax({
                url: './nada.php', // Replace this with the actual URL of your PHP page
                type: 'POST',
                data: { id: id },
                success: function (response) {
                  // Handle the response from the PHP page here
                  console.log(response);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                  console.error('An error occurred: ' + textStatus);
                }
              });
            }
          </script>

          <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>
          <div class="modal fade" id="exerciseModal" tabindex="-1" aria-labelledby="exerciseModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content bg-dark">
                <div class="modal-header"></div>
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

          <h2>Section title</h2>
          <!-- <div class="table-responsive">
            <table class="table table-dark table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Header</th>
                  <th scope="col">Header</th>
                  <th scope="col">Header</th>
                  <th scope="col">Header</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1,001</td>
                  <td>random</td>
                  <td>data</td>
                  <td>placeholder</td>
                  <td>text</td>
                </tr>
              </tbody>
            </table>
          </div> -->
        </main>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script> -->
    <!-- <script src="dashboard.js"></script> -->
  </body>
</html>
