// const form = {
//   name: document.getElementById('name'),
//   email: document.getElementById('email'),
//   indexNo: document.getElementById('indexNo'),
//   depart: document.getElementById('depart'),
//   password: document.getElementById('password'),
//   confpass: document.getElementById('confpass'),
//   btnreg: document.getElementById('btnreg')
// };

// form.btnreg.addEventListener('click', () => {
//   const request = new XMLHttpRequest();

//   request.onload = () => {
//     let responseObject = null;
//     try {
//       responseObject = JSON.parse(request.responseText);
//     } catch {
//       console.log('could not parse JSON');
//     }
//   };
//   const requestData = `name=${form.name.value}&email=${
//     form.email.value
//   }&indexNo=${form.indexNo.value}&depart=${form.depart.value}&password=${
//     form.password.value
//   }`;
//   console.log(requestData);

//   request.open('POST', 'studreg.php');
//   request.setRequestHeader('conten-type', 'application/x-www-form-urlencoded');
//   request.send(requestData);
// });

$(document).ready(function() {
  $('#btnreg').click(function(e) {
    e.preventDefault();

    var name = $('#name').val();
    var email = $('#email').val();
    var indexNo = $('#indexNo').val();
    var depart = $('#depart').val();
    var password = $('#password').val();
    var confpass = $('#confpass').val();

    $.ajax({
      url: 'studreg.php',
      method: 'POST',
      data: {
        name: name,
        email: email,
        indexNo: indexNo,
        depart: depart,
        password: password,
        confpass: confpass
      },
      success: function(result) {

              if (result.trim() =="Account Created Successfull") {
                toastr.success(result);
              }
              else {
                toastr.error(result);
              }
      }
    });
  });
});
//});
