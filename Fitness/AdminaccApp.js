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
                "<td align='center'>" + adminID + "</td>" +
                "<td align='center'>" + firstName + "</td>" +
                "<td align='center'>" + lastName + "</td>" +
                "<td align='center'>" + email + "</td>" +
                "<td align='center'>" + confirmed + "</td>" +
                "<td align='center'><button class='btn btn-custom confirm-admin'>Confirm</button></td>" +
                "<td align='center'><button class='btn btn-outline-danger delete-admin'>Delete</button></td>" +
                "</tr>";

                $("#adminTable tbody").append(tr_str);
            }
        }
    });
});

$(document).on('click', '.confirm-admin', function(){
    let adminID = $(this).closest('tr').find('td:first').text();
  
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

$(document).on('click', '.delete-admin', function(){
    let adminID = $(this).closest('tr').find('td:first').text();
  
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