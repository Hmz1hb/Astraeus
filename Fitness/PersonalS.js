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
          $('#' + field).text(response[field]);
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
        var fields = ['fullName', 'gender', 'weight', 'height', 'age', 'Waist', 'Neck', 'Hip'];
        fields.forEach(function(field) {
          var element = $('#' + field);
          var input = $('<input>').val(element.text()).attr('id', field + 'Input').addClass('form-control');
          originalData[field] = element.text();
          element.replaceWith(input);
        });
        $(this).text('Save').attr('id', 'saveButton');
        $('<button>').text('Cancel').attr('id', 'cancelButton').addClass('btn btn-custom').insertAfter($(this));
      });
  
      $(document).on('click', '#saveButton', function() {
        var fields = ['fullName', 'gender', 'weight', 'height', 'age', 'Waist', 'Neck', 'Hip'];
        var data = {};
        fields.forEach(function(field) {
          data[field] = $('#' + field + 'Input').val();
        });
        $.ajax({
          url: './updateUser.php',
          type: 'POST',
          data: data,
          success: function(response) {
            fields.forEach(function(field) {
              var input = $('#' + field + 'Input');
              var p = $('<p>').text(input.val()).attr('id', field).addClass('mb-0');
              input.replaceWith(p);
            });
            
            $('#resultModal .modal-body').text(response.message);
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