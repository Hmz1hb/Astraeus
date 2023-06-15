$(document).ready(function() {
    $.ajax({
      url: 'getUsers.php',
      type: 'get',
      dataType: 'JSON',
      success: function(response) {
        let len = response.length;
        for(let i=0; i<len; i++){
          let id = response[i].UserID;
          let name = response[i].Name;
          let email = response[i].Email;
          let phone = response[i].Phone;
          let age = response[i].Age;
          let gender = response[i].Gender == 0 ? 'Male' : 'Female';  // Assuming 0 for Male and 1 for Female
          let exercises = response[i].Exercies;
          let ticketID = response[i].TicketID;
  
          let tr_str = "<tr>" +
            "<td align='center'>" + id + "</td>" +
            "<td align='center'>" + name + "</td>" +
            "<td align='center'>" + email + "</td>" +
            "<td align='center'>" + phone + "</td>" +
            "<td align='center'>" + age + "</td>" +
            "<td align='center'>" + gender + "</td>" +
            "<td align='center'>" + exercises + "</td>" +
            "<td align='center'>" + ticketID + "</td>" +
            "<td align='center'><button class='btn btn-custom reset-password'>Reset Password</button></td>" +
            "<td align='center'><button class='btn btn-outline-danger delete-user'>Delete</button></td>" +
            "</tr>";
  
          $("#userTable tbody").append(tr_str);
        }
      }
    });
  });
  
  $(document).on('click', '.reset-password', function(){
    let userID = $(this).closest('tr').find('td:first').text();
    let email = $(this).closest('tr').find('td:eq(2)').text();
  
    $.ajax({
      url: 'resetPasswordMail.php',
      type: 'post',
      data: {userID: userID, email: email},
      success: function(response) {
        console.log(response);
        // Show success modal
        $('#successModal').modal('show');
        // Perform any additional actions after the AJAX call is successful
      },
      error: function() {
        // Show error modal
        $('#errorModal').modal('show');
      }
    });
  });
  
  
  
  // Show the modal when delete button is clicked, and store the UserID to be deleted
  $(document).on('click', '.delete-user', function(){
    $("#deleteModal").modal('show');
    $("#confirmDelete").data('id', $(this).closest('tr').find('td:first').text());  // Store UserID in button data
  });
  
  // Send Ajax request to delete script when delete is confirmed
  $("#confirmDelete").click(function(){
    let userID = $(this).data('id');  // Retrieve UserID from button data
  
    $.ajax({
      url: 'deleteUser.php',
      type: 'post',
      data: {UserID: userID},
      success: function(response) {
        if (response == 'Success') {
   
          $('table#userTable tr:contains("' + userID + '")').remove();  // Remove the deleted row from the table
        } else {
  
        }
      }
    });
  });
  
  // Function to convert the table data to a worksheet
  function tableToWorksheet(table) {
    var worksheet = XLSX.utils.table_to_sheet(table);
    return worksheet;
  }
  
  // Function to download the workbook as an Excel file
  function downloadWorkbook(workbook, filename) {
    var workbookOutput = XLSX.write(workbook, { bookType: 'xlsx', type: 'array' });
    var blob = new Blob([workbookOutput], { type: 'application/octet-stream' });
    saveAs(blob, filename);
  }
  
  // Function to handle the export button click event
  document.getElementById('exportButton').addEventListener('click', function() {
    var table = document.getElementById('userTable');
    var worksheet = tableToWorksheet(table);
    var workbook = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(workbook, worksheet, 'Users');
    downloadWorkbook(workbook, 'users.xlsx');
  });
  
  $('#searchInput').on('input', function() {
    var query = $(this).val().toLowerCase();
    filterTableRows(query);
  });
  
  function filterTableRows(query) {
    $('#userTable tbody tr').each(function() {
      var rowText = $(this).text().toLowerCase();
      if (rowText.indexOf(query) === -1) {
        $(this).hide();
      } else {
        $(this).show();
      }
    });
  }
  