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