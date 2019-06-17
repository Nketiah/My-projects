$(document).ready(function() {
  $('#login').click(function(e) {
    e.preventDefault();
    var email_index = $('#email_index').val();
    var password = $('#password').val();
    var role = $('#role').val();

    $.ajax({
      url: 'Auth.php',
      method: 'POST',
      data: {
        email_index: email_index,
        password: password,
        role:role
      },
      dataType: 'text',
      success: function(result) {
        if (result.trim() == "Student") {
          window.location.href='studentdash.php';
        }
         else if (result.trim() == "Password does not Match"){
           toastr.error(result);
        }
         else if (result.trim() == "Wrong Password"){
           toastr.error(result);
        }
         else if (result.trim() == "please All Fields are required"){
           toastr.error(result)
        }
         else if (result.trim() == "Supervisor"){
           window.location.href="superdash.php";
        }
         else if (result.trim() == "Wrong Password"){
           toastr.error(result);
        }
      }
    });
  });
});
