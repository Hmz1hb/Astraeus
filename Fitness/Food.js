/* globals Chart:false, feather:false */

(() => {
    'use strict'
  
    feather.replace({ 'aria-hidden': 'true' })

  })()
  


  const API_URL = 'https://musclewiki.p.rapidapi.com/exercises';
  const headers = {
    'X-RapidAPI-Key': '3ec250bf1cmsh6ba74139d7fb301p1de1eejsn7dbf4db26f0c',
    'X-RapidAPI-Host': 'musclewiki.p.rapidapi.com'
  };

  let exercises; // Declare exercises at a higher scope
  let currentPage = 1;
  const itemsPerPage = 10; // Change this to alter the number of items per page

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

  loadExercises(); // Call the function

  
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

  // Global variable to store the original exercises data
  let originalExercisesData = [];

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
            <button type="button" class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#exerciseModal" onclick="displayModalData('${exercise.id}')">Save</button>
          </div>
        </div>
      `;

      exerciseCardsContainer.appendChild(exerciseCard);
    });
  }

// Global variables to store the selected body part and equipment
let selectedCategory = '';
let selectedDifficulty = '';
let selectedForce = '';
let selectedMuscle = '';



function filterByCategory(category) {
selectedCategory = category;
applyFilter();
}

function filterByDifficulty(difficulty) {
selectedDifficulty = difficulty;
applyFilter();
}

function filterByForce(force) {
selectedForce = force;
applyFilter();
}

function filterByMuscle(muscle) {
selectedMuscle = muscle;
applyFilter();
}


function applyFilter() {
exercises = originalExercisesData.filter(exercise =>
  (!selectedCategory || exercise.Category === selectedCategory) &&
  (!selectedDifficulty || exercise.Difficulty === selectedDifficulty) &&
  (!selectedForce || exercise.Force === selectedForce) &&
  (!selectedMuscle || (exercise.target.Primary.includes(selectedMuscle))));

// Reset the current page to 1 and display the filtered exercises with pagination
currentPage = 1;
goToPage(1);
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

function updateSuggestions() {
const input = document.getElementById('searchInput').value.toLowerCase();
const suggestions = document.getElementById('suggestions');
suggestions.innerHTML = ''; // Clear previous suggestions

if (input.length > 0) { // Only show suggestions if input is not empty
  originalExercisesData.forEach(exercise => {
    if (exercise.exercise_name.toLowerCase().includes(input)) {  // Modified this line
      const suggestion = document.createElement('div');
      suggestion.textContent = exercise.exercise_name;
      suggestion.addEventListener('click', () => {
        document.getElementById('searchInput').value = exercise.exercise_name;
        suggestions.innerHTML = ''; // Clear suggestions after selection
        filterByName(exercise.exercise_name);
      });
      suggestions.appendChild(suggestion);
    }
  });
}

}

function filterByName(name) {
const filteredExercises = originalExercisesData.filter(exercise => exercise.exercise_name === name);

var buttons = document.querySelectorAll('.my-custom-pagination-button');
buttons.forEach(function(button) {
    button.style.display = 'none';
});

displayExercises(filteredExercises);

}

