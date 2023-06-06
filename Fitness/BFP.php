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
    

    <link href="./dashboard.css" rel="stylesheet">
    <style>
        * {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

/* .body {
  background-image: linear-gradient(to bottom, #384B9D, #8F0B94);
  background-repeat: no-repeat;
  background-attachment: fixed;
} */

#darkModeToggler {
  font-size: 25px;
}


#body {
  height: 700px;
}

#img-toggler {
  z-index: 2;
  border-top-color: var(--bs-gray-400);
  height: 0px;
  transition: 0.3s ease-out;
}
#img-toggler.deployed {
  transition: 0.3s ease-out;
  height: 358px;
}

#btn-male {
  font-size: 40px;
}
#btn-male.active {
  color: #384B9D !important;
  pointer-events: none;
}
#btn-male.active svg {
  filter: drop-shadow(2px 2px 2px rgba(0, 0, 0, 0.541));
}
#btn-male:not(.active).dark-mode {
  color: var(--bs-gray-700) !important;
}
#btn-male:not(.active):hover {
  color: #384B9D !important;
  animation: rotate-btn 1s ease-in-out infinite;
}
#btn-male:not(.active):hover svg {
  filter: drop-shadow(2px 2px 2px rgba(0, 0, 0, 0.541));
}

#btn-female {
  font-size: 40px;
}
#btn-female.active {
  color: #8F0B94 !important;
  pointer-events: none;
}
#btn-female.active svg {
  filter: drop-shadow(2px 2px 2px rgba(0, 0, 0, 0.541));
}
#btn-female:not(.active).dark-mode {
  color: var(--bs-gray-700) !important;
}
#btn-female:not(.active):hover {
  color: #8F0B94 !important;
  animation: rotate-btn 1s ease-in-out infinite;
}
#btn-female:not(.active):hover svg {
  filter: drop-shadow(2px 2px 2px rgba(0, 0, 0, 0.541));
}

@keyframes rotate-btn {
  0% {
    transform: rotate(10deg);
  }
  50% {
    transform: rotate(-10deg);
  }
  100% {
    transform: rotate(10deg);
  }
}
#btn-calc {
  font-size: 22px;
  font-weight: 600;
  background-image: linear-gradient(to right, #384B9D, #8F0B94);
  background-repeat: no-repeat;
  background-attachment: fixed;
}

.form-label {
  font-family: Fira Mono, monospace;
  font-size: 15px;
}

#weight-indicator {
  background-color: #384B9D;
  height: 1.5em;
  width: 4em;
  left: -4%;
  top: 60px;
}

footer a {
  font-size: 28px;
  color: white;
}
footer a:hover {
  background-color: white;
  color: black;
}

.calc-title.dark-mode h1, .calc-title.dark-mode .h1 {
  color: white !important;
}
.calc-title.dark-mode hr {
  border-top-color: #f1f1f1;
}
.calc-title.dark-mode p {
  color: var(--bs-gray-600) !important;
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
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block  sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="./UserInt.html">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./PersonalSpace.html">
              <span data-feather="file" class="align-text-bottom"></span>
              Personal Wellbeing
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="./BFP.html">
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
            <a class="nav-link" href="./food.html">
              <i class="fa-solid fa-drumstick-bite"></i>
              Mass Meals Recipes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="./Exercises.html">
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
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                Categories
              </button>
              <ul class="dropdown-menu ">
                <li><a class="dropdown-item" href="#" onclick="filterByCategory('Barbell')">Barbell</a></li>
              </ul>
            </div>
            <div class="btn-group me-2">
              <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                Difficulties
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#" onclick="filterByDifficulty('Beginner')">Beginner</a></li>

              </ul>
            </div>
            <div class="btn-group me-2">
              <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                Forces
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#" onclick="filterByForce('Pull')">Pull</a></li>
              </ul>
            </div>
            <div class="btn-group me-2">
              <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                Muscles
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#" onclick="filterByMuscle('Biceps')">Biceps</a></li>
              </ul>
            </div>
          </div>
      </div>
 
      <body>
        <div class="container-fluid d-flex flex-column p-0 min-vh-100 p-3 body">
            <div class="row mx-0 mb-3">
                <nav class="navbar bg-dark navbar-expand-sm py-2 px-4">
                    <div class="container-fluid px-0 d-flex flex-column flex-xs-row align-items-stretch align-items-xs-center">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse mt-2 mt-sm-0" id="main-navbar">
                            <ul class="navbar-nav ms-auto border rounded-pill overflow-hidden">
                                <li class="nav-item border-end text-center">
                                    <a class="nav-link active" href="#" aria-current="page">BFP</a>
                                </li>
                                <li class="nav-item text-center">
                                    <a class="nav-link disabled" href="#">Ideal Weight</a>
                                </li>
                                <li class="nav-item border-start text-center">
                                    <a class="nav-link disabled" href="#">DCR</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>   
            </div>
            <div class="row mx-0 mb-3 bg-dark flex-grow-1 rounded-5 h-100" id="calc-container">
                <div class="container-fluid mx-0 my-auto py-3">
                    <div class="container-lg px-0">
                        <div class="row d-flex justify-content-center mx-0">
                            <div class="text-center d-block d-xl-none mb-4 w-75 calc-title">
                                <h1 class="m-0">BFP Calculator</h1>
                                <hr class="w-100 my-1"/>
                                <p class="text-muted">Body Fat Percentage</p>
                            </div>
                            <div class="d-xl-none col-12"></div>
                            <div class="col-auto d-flex align-items-stretch">
                                <div class="d-flex flex-column">
                                    <div class="position-relative d-flex flex-grow-1">
                                        <div id="img-toggler" class="w-100 border-top border-3 position-absolute bg-white align-self-end"></div>
                                        <img src="./img/male.png" alt="male" id="body" class="mb-2">
                                    </div>
                                    <div class="mt-2 d-flex justify-content-between px-2">
                                        <button class="bg-transparent border-0 text-muted active" id="btn-male">
                                            <i class="fa-solid fa-mars"></i>
                                        </button>
                                        <button class="bg-transparent border-0 text-muted" id="btn-female">
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
                                                        <input class="form-control text-center" type="number" id="neck-input" aria-describedby="neck-cm" min="20" max="80">
                                                        <span class="input-group-text" id="neck-cm">cm</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center mb-3 col-12 col-sm-6 col-md-4">
                                                <div class="w-75 mx-auto">
                                                    <label class="form-label" for="waist-input">Waist</label>
                                                    <div class="input-group flex-nowrap shadow-sm">
                                                        <input class="form-control text-center" type="number" id="waist-input" aria-describedby="waist-cm" min="40" max="130">
                                                        <span class="input-group-text" id="waist-cm">cm</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center mb-3 col-12 col-sm-6 col-md-4">
                                                <div class="w-75 mx-auto">
                                                    <label class="form-label" for="hip-input">Hip</label>
                                                    <div class="input-group flex-nowrap shadow-sm">
                                                        <input class="form-control text-center" type="number" id="hip-input" aria-describedby="hip-cm" min="40" max="130">
                                                        <span class="input-group-text" id="hip-cm">cm</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center mb-3 col-12 col-sm-6 col-md-4">
                                                <div class="w-75 mx-auto">
                                                    <label class="form-label" for="age-input">Age</label>
                                                    <div class="input-group flex-nowrap shadow-sm">
                                                        <input class="form-control text-center" type="number" id="age-input" aria-describedby="age-years" min="1" max="80">
                                                        <span class="input-group-text" id="age-years">years</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center mb-3 col-12 col-sm-6 col-md-4">
                                                <div class="w-75 mx-auto">
                                                    <label class="form-label" for="height-input">Height</label>
                                                    <div class="input-group flex-nowrap shadow-sm">
                                                        <input class="form-control text-center" type="number" id="height-input" aria-describedby="height-cm" min="130" max="230">
                                                        <span class="input-group-text" id="height-cm">cm</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center mb-3 col-12 col-sm-6 col-md-4 d-block d-md-none mb-5">
                                                <div class="w-75 mx-auto">
                                                    <label class="form-label" for="weight-input">Weight</label>
                                                    <div class="input-group flex-nowrap shadow-sm">
                                                        <input class="form-control text-center" type="number" id="weight-input" aria-describedby="weight-cm" min="40" max="160">
                                                        <span class="input-group-text" id="weight-kg">kg</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-column justify-content-center mb-5 d-none d-md-block">
                                                <div class="text-center position-relative w-100">
                                                    <label class="form-label" for="weight-range-input">Weight</label><br/>
                                                    <input class="form-range" type="range" id="weight-range-input" min="40" max="160" value="100">
                                                    <span id="weight-indicator" class="position-absolute text-white rounded-pill"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <button id="btn-calc" class="btn w-50 py-2 rounded-5 text-white mt-auto mx-auto shadow">
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
                <div class="modal-content">
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
<script>

const apiKey = '764b7dd13bmsh5052cb02cc32d39p133d57jsne66582f5752e'
  // Weight slider

const weightIndicator = document.getElementById('weight-indicator')
const weightSlider = document.getElementById('weight-range-input')

weightIndicator.style.left = (weightSlider.value-45)*0.808333+'%'
weightIndicator.textContent = weightSlider.value + 'kg'

weightSlider.oninput = (()=>{
    weightIndicator.style.left = (weightSlider.value-45)*0.808333+'%'
    weightIndicator.textContent = weightSlider.value + 'kg'
})

//gender toggler

let gender = 'male'

const maleBtn = document.getElementById('btn-male')
const femaleBtn = document.getElementById('btn-female')
const body = document.getElementById('body')
const toggler = document.getElementById('img-toggler')

maleBtn.onclick = ()=>{
    maleBtn.classList.toggle('active')
    femaleBtn.classList.toggle('active')
    
    toggler.classList.toggle('deployed')
    setTimeout(() => {
        body.src = './img/male.png'
        gender = 'male'
        toggler.classList.toggle('deployed')
    }, 300)
       
}

femaleBtn.onclick = ()=>{
    femaleBtn.classList.toggle('active')
    maleBtn.classList.toggle('active')

    toggler.classList.toggle('deployed')
    setTimeout(() => {
        body.src = './img/female.png'
        gender = 'female'
        toggler.classList.toggle('deployed')
    }, 300)
    
}

//get data

const btnCalc = document.getElementById('btn-calc')

btnCalc.onclick = ()=>{
    
    let age = document.getElementById('age-input').value
    if (age === ''){
        age = -1
    }
    else if (age == 0){
        age = 1
    }
    
    let weight = 0
    if (window.innerWidth > 768){
        weight = document.getElementById('weight-range-input').value
    } 
    else {
        weight = document.getElementById('weight-input').value
    }

    let height = document.getElementById('height-input').value
    let neck = document.getElementById('neck-input').value
    let waist = document.getElementById('waist-input').value
    let hip = document.getElementById('hip-input').value

    const options = {
        method: 'GET',
        headers: {
            'X-RapidAPI-Key': apiKey,
		    'X-RapidAPI-Host': 'fitness-calculator.p.rapidapi.com'
        }
    }

    fetch(`https://fitness-calculator.p.rapidapi.com/bodyfat?age=${age}&gender=${gender}&weight=${weight}&height=${height}&neck=${neck}&waist=${waist}&hip=${hip}`, options)

        .then(response => response.json())
        .then(response => {
            if(response.status_code === 422){
                showErrors(response.errors)
            }
            if(response.status_code === 200){
                showResults(response.data)
            }
        })
}

//results

const resultsModal = document.getElementById('results-modal')
const resultsTitle = document.querySelector('.modal-title')
const resultsBody = document.querySelector('.modal-body')

function showErrors(errors){
    
    resultsTitle.textContent = 'Wrong Values'
    resultsBody.innerHTML = '<ul></ul>'
    
    errors.forEach(error => {
        let errorElement = document.createElement('li')
        let errorContent = error[0].toUpperCase() + error.slice(1)
        errorElement.textContent = errorContent
        document.querySelector('.modal-body ul').appendChild(errorElement)
    })

    resultsModal.toggle()
}

function showWrongMeasurements() {
    resultsTitle.textContent = 'Wrong Measurements'
    
    resultsBody.textContent = 'The values you provide are not proportionally correct'
    resultsModal.toggle()

}

function showResults(data){

    for (let x in data){
        if (isFinite(data[x]) && data[x] < 1){
            showWrongMeasurements()
            return
        }
    }
    
    resultsTitle.textContent = 'Results'
    resultsBody.innerHTML = '<ul></ul>'
    let category = ''

    switch(data['Body Fat Category']){
        case 'Obese':
            category = "danger"
            break
        case 'Average':
            category = "warning"
            break
        case 'Fitness':
            category = "success"
            break
        case 'Athletes':
            category = "primary"
            break
        case 'Essential Fat':
            category = "info"
            break
    }

    let html = `
        
        <li>Body Fat: <span class="text-${category}">${data['Body Fat (BMI method)']}</span></li>
        <li>Body Fat Category: <span class="text-${category}">${data['Body Fat Category']}</span></li>
        <li>Body Fat Mass: <span class="text-${category}">${data['Body Fat Mass']}</span></li>
        <li>Lean Body Mass: <span class="text-${category}">${data['Lean Body Mass']}</span></li>

    `

    document.querySelector('.modal-body ul').innerHTML = html
    
    resultsModal.toggle()
}

// Dark mode toggler

const darkModeBtn = document.getElementById('darkModeToggler');
const navbar = document.querySelector('.navbar');
const calcContainer = document.getElementById('calc-container');
const calcTitle = document.getElementsByClassName('calc-title');
const formLabels = document.getElementsByClassName('form-label');
const formInputs = document.getElementsByClassName('form-control');
const imgToggler = document.getElementById('img-toggler')

  </script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

       <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
        
       <!-- <script src="./Food.js"></script> -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>
</html>
