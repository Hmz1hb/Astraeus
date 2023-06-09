$(document).ready(function() {
    $.ajax({
        url: 'getUnconfirmedAdmins.php',
        type: 'get',
        dataType: 'JSON',
        success: function(response) {
            let len = response.length;
            for(let i=0; i<len; i++){
                let adminID = response[i].AdminID;
                let firstName = response[i].firstNameA;
                let lastName = response[i].lastNameA;
                let email = response[i].emailA;
                let confirmed = response[i]['Is confirmed'] ? 'Yes' : 'No'; 

                let tr_str = "<tr>" +
                "<td>" + adminID + "</td>" +
                "<td>" + firstName + "</td>" +
                "<td>" + lastName + "</td>" +
                "<td>" + email + "</td>" +
                "<td>" + confirmed + "</td>" +
                "<td><button class='btn btn-custom confirm-admin'>Confirm</button></td>" +
                "<td><button class='btn btn-outline-danger mt-1 delete-admin'>Delete</button></td>" +
                "</tr>";

                $("#adminTable tbody").append(tr_str);
            }
        }
    });
});

$(document).on('click', '.confirm-admin', function(){
    let adminID = $(this).closest('tr').find('td:first').text();
  
    $('#confirmModal').modal('show'); // Show the confirmation modal

    // If the confirm button in the modal is clicked
    $('#confirmButton').off('click').on('click', function() {
        $.ajax({
            url: 'confirmAdmin.php',
            type: 'post',
            data: {adminID: adminID},
            success: function(response) {
                console.log(response);
                location.reload(); // Reload the page to update the table
            },
            error: function() {
                console.log('An error occurred during admin confirmation');
            }
        });
    });
});

$(document).on('click', '.delete-admin', function(){
    let adminID = $(this).closest('tr').find('td:first').text();

    $('#deleteModal').modal('show'); // Show the deletion modal

    // If the delete button in the modal is clicked
    $('#deleteButton').off('click').on('click', function() {
        $.ajax({
            url: 'deleteAdmin.php',
            type: 'post',
            data: {adminID: adminID},
            success: function(response) {
                console.log(response);
                location.reload(); // Reload the page to update the table
            },
            error: function() {
                console.log('An error occurred during admin deletion');
            }
        });
    });
});
