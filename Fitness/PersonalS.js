$(document).ready(function() {
    var fields = ['fullName', 'gender', 'email', 'phone', 'weight', 'height', 'age', 'Waist', 'Neck', 'Hip'];
  
    $.ajax({
        url: './getUserData.php',
        type: 'GET',
        data: {fields: fields},
        success: function(response) {
            if (typeof response !== 'object') {
                console.error("Response is not an object:", response);
                return;
            }

            fields.forEach(function(field) {
                if (field === 'gender') {
                    if (response[field] === 0) {
                        $('#' + field).text('Male');
                    } else if (response[field] === 1) {
                        $('#' + field).text('Female');
                    }
                } else if (field === 'age') {
                    // Parse the birth date string into a Date object
                    var birthDate = new Date(response[field]);
                    // Get the current date
                    var currentDate = new Date();
                    // Calculate the age
                    var age = currentDate.getFullYear() - birthDate.getFullYear();
                    // Adjust the age if the current date is before the birth date in the current year
                    if (currentDate.getMonth() < birthDate.getMonth() || (currentDate.getMonth() == birthDate.getMonth() && currentDate.getDate() < birthDate.getDate())) {
                        age--;
                    }
                    // Display the age
                    $('#' + field).text(age);
                } else {
                    $('#' + field).text(response[field]);
                }
            });
        },
        error: function(jqXHR, textStatus) {
            $('#resultModal .modal-body').text('An error occurred: ' + textStatus);
            $('#resultModal').modal('show');
        }
    });
});

  
$(document).ready(function() {
  var originalData = {};

  $(document).on('click', '#editButton', function() {
    var fields = ['fullName', 'weight', 'height', 'Waist', 'Neck', 'Hip','gender'];
    fields.forEach(function(field) {
      var element = $('#' + field);
      var input;

      // Gender field needs to be a select
      if (field === 'gender') {
        input = $('<select>').attr('id', field + 'Input').addClass('form-control bg-dark text-light custom-inp');
        
        $('<option>').val(0).text('Male').appendTo(input);
        $('<option>').val(1).text('Female').appendTo(input);
        $('<option>').val('').text('sex').appendTo(input);
        input.val(element.text() === 'Male' ? 0 : 1);
      } else if (['height', 'age', 'Waist', 'Neck', 'Hip'].includes(field)) {
        var minMax = {};
        switch(field) {
          case 'height':
            minMax = {min: 130, max: 230};
            break;
          case 'age':
            minMax = {min: 0, max: 80};
            break;
          case 'Waist':
          case 'Hip':
            minMax = {min: 40, max: 130};
            break;
          case 'Neck':
            minMax = {min: 20, max: 60};
            break;
        }
        input = $('<input>', {min: minMax.min, max: minMax.max, type: 'number'}).val(element.text()).attr('id', field + 'Input').addClass('form-control bg-dark text-light custom-inp');
      } else {
        input = $('<input>').val(element.text()).attr('id', field + 'Input').addClass('form-control bg-dark text-light custom-inp me-2 ms-2');
      }

      // Create an error message container
      var errorMsg = $('<p>').attr('id', 'error-' + field).addClass('error-msg').hide();

      originalData[field] = element.text();
      element.replaceWith(input);
      input.after(errorMsg);  // Insert the error message container after the input

      // Bind keyup event for live validation
      input.keyup(function() {
        validateInput(field, input);
      });
    });

    $(this).text('Save').attr('id', 'saveButton');
    $('<button>').text('Cancel').attr('id', 'cancelButton').addClass('btn btn-sm btn-outline-secondary').insertAfter($(this));
  });


  $(document).on('click', '#saveButton', function() {
    var fields = ['fullName', 'weight', 'height', 'Waist', 'Neck', 'Hip', 'gender'];
    var data = {};
    var valid = true;

    fields.forEach(function(field) {
      var input = $('#' + field + 'Input');
      if (!validateInput(field, input)) {
        valid = false;
      }

      // Convert gender value to integer
      if (field === 'gender') {
        data[field] = parseInt(input.val(), 10);
      } else {
        data[field] = input.val();
      }
    });

    if (!valid) {
      return false;
    }

    $.ajax({
      url: './updateUser.php',
      type: 'POST',
      data: data,
      dataType: 'json',
      success: function(response) {
        fields.forEach(function(field) {
          var input = $('#' + field + 'Input');
          var p = $('<p>').attr('id', field);
          
          if (field === 'gender') {
            p.text(input.find('option:selected').text());
          } else {
            p.text(input.val());
          }
          
          p.addClass('mb-0');
          input.replaceWith(p);
        });
  
        
        var responseObject = typeof response === "object" ? response : JSON.parse(response);
        $('#resultModal .modal-body').text(responseObject.message);
        $('#resultModal').modal('show');
      },
      error: function(jqXHR, textStatus, errorThrown) {
        $('#resultModal .modal-body').text('An error occurred: ' + textStatus);
        $('#resultModal').modal('show');
      }
    });
    $('#cancelButton').remove();
    $(this).text('Edit').attr('id', 'editButton');
  });

  function validateInput(field, input) {
    var value = parseFloat(input.val());
    var valid = true;
    var errorMsg = "";

    switch (field) {
      case 'height':
        if (value < 130 || value > 230) {
          valid = false;
          errorMsg = "Height must be between 130 cm to 230 cm.";
        }
        break;
      case 'age':
        if (value < 0 || value > 80) {
          valid = false;
          errorMsg = "Age must be between 0 to 80.";
        }
        break;
      case 'Neck':
        if (value < 20 || value > 60) {
          valid = false;
          errorMsg = "Neck must be between 20 cm to 60 cm.";
        }
        break;
      case 'Waist':
      case 'Hip':
        if (value < 40 || value > 130) {
          valid = false;
          errorMsg = `${field} must be between 40 cm to 130 cm.`;
        }
        break;
    }

    if (!valid) {
      input.css('border-color', 'red');
      $('#error-' + field).text(errorMsg).show();
    } else {
      input.css('border-color', '');
      $('#error-' + field).text('').hide();
    }

    return valid;
  }


  
      $(document).on('click', '#cancelButton', function() {
        var fields = ['fullName', 'gender', 'weight', 'height', 'age', 'Waist', 'Neck', 'Hip'];
        fields.forEach(function(field) {
          var input = $('#' + field + 'Input');
          var p = $('<p>').text(originalData[field]).attr('id', field).addClass('mb-0');
          input.replaceWith(p);
        });
        $('#saveButton').text('Edit').attr('id', 'editButton');
        $(this).remove();
      });
    });

    const API_URL = 'https://musclewiki.p.rapidapi.com/exercises';
  const headers = {
    'X-RapidAPI-Key': '3ec250bf1cmsh6ba74139d7fb301p1de1eejsn7dbf4db26f0c',
    'X-RapidAPI-Host': 'musclewiki.p.rapidapi.com'
  };
  let exercises= []; // Declare exercises at a higher scope
  let currentPage = 1;
  const itemsPerPage = 4; // Change this to alter the number of items per page
   

// Global variable to store the original exercises data
let originalExercisesData = [];

// async function loadExercises() {
//   const response = await fetch(API_URL, {
//     method: 'GET',
//     headers: headers
//   });
//   exercises = await response.json(); // Store the result in exercises
//   originalExercisesData = [...exercises]; // Store a copy of the original data
//   displayExercises(exercises.slice(0, itemsPerPage)); // Call displayExercises directly from here
//   createPaginationButtons(Math.ceil(exercises.length / itemsPerPage));
// }

// loadExercises();

async function loadSavedExercises() {
  // Fetch the saved exercise IDs from the PHP script
  const response = await fetch('./getSavedExercises.php');
  const exerciseIds = await response.json();
  
  // Fetch each exercise from the API
  for (const id of exerciseIds) {
    const response = await fetch(`${API_URL}/${id}`, {
      method: 'GET',
      headers: headers
    });
    const exercise = await response.json();
    exercises.push(exercise);
      displayExercises(exercises.slice(0, itemsPerPage)); // Call displayExercises directly from here
  createPaginationButtons(Math.ceil(exercises.length / itemsPerPage));
 
  }

  // Now `exercises` contains all the exercises saved by the user
  displayExercises(exercises); // Display them
  goToPage(1);
}

loadSavedExercises()

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
      <div class="card bg-dark text-white col-12" id="exerciseCard_${exercise.id}">
        <div class="card-body text-capitalize">
          <video autoplay loop muted class="card-img-top">
            <source src="${exercise.videoURL}"  type="video/mp4">
            Your browser does not support the video tag.
          </video>
          <h5 class="card-title">${exercise.exercise_name}</h5>
          <p class="card-text">Click below to view exercise details.</p>
          <button type="button" class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#exerciseModal" onclick="displayModalData('${exercise.id}')">Details</button>
          <button type="button" class="btn btn-danger" onclick="deleteExercise('${exercise.id}')">Delete</button>
        </div>
      </div>
    `;

    exerciseCardsContainer.appendChild(exerciseCard);
  });

}

function deleteExercise(id) {
  // Functionality for deleting the exercise
  $.ajax({
    url: './deleteEx.php', // Replace this with the actual URL of your PHP delete script
    type: 'POST',
    data: { id: id },
    success: function (response) {
      // Handle the response from the PHP script here
      var modalTitle = 'Delete Notice'; // Set the title of the modal
      var modalDescription = 'Exercise deleted successfully!'; // Set the description

      // Update the modal title and description
      $('#Deletenotice .modal-title').text(modalTitle);
      $('#Deletenotice .modal-body').html(modalDescription + '<br>' + response);

      // Show the modal
      $('#Deletenotice').modal('show');

      // Automatically hide the modal after 10 seconds
      setTimeout(function () {
        $('#Deletenotice').modal('hide');
      }, 10000);

      // Fade out and remove the exercise card from the UI
      $('#exerciseCard_' + id).parent().fadeOut(400, function () {
        $(this).remove();

        // Remove the exercise from the exercises array
        exercises = exercises.filter(exercise => exercise.id !== Number(id));
      });
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.error('An error occurred: ' + textStatus);
    }
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
  
  if (currentPage > 2) {
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
  