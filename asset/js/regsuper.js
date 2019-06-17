$(document).ready(function() {
    $('#register').click(function(e) {
        e.preventDefault();

        var name = $('#name').val();
        var email = $('#email').val();
        var mobile = $("#mobile").val();
        var code = $("#code").val();
        var depart = $('#depart').val();
        var password = $('#password').val();
        var confpass = $('#confpass').val();

        $.ajax({
            url: 'superreg.php',
            method: 'POST',
            data: {
                name: name,
                email: email,
                mobile:mobile,
                code: code,
                depart: depart,
                password: password,
                confpass: confpass
            },
            dataType: 'text',
            success: function(result) {
                toastr.error(result);
                if (result == "please All Fields are required") {
                    toastr.error(result);
                }
                else if (result.trim() == "Email Already taken") {
                    toastr.error(result);
                }
                else if (result.trim() == "Wrong Code...try again!") {
                    toastr.error(result);
                }
                else if (result.trim() == "Password does Not Match") {
                    toastr.error(result);
                }
                //  else if (result.trim() == "Account Created Successfull"){
                //     toastr.info("Account Created Successfull");
                //     setTimeout(() => window.location.href='index.php',3000)
                // }
            }
        });
    });
});