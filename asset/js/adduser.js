$(function () {
    $('#modal').iziModal({
        title: 'Add new User',
        headerColor: '#007E6C',
        autoOpen: true,
        icon: 'fab fa-pinterest',
        iconColor: '#fff',
        padding: 70,
        closeOnEscape: false,
        closeButton: false,
        overlayClose: false,
        overlay: false,
        transitionIn: 'bounceInDown',
    })

     $("#add-user").click(function (e) {
        e.preventDefault();
        var fullname = $("#fullname").val();
         var mobile = $("#mobile").val();
         var email = $("#email").val();
         var password = $("#password").val();
          
         $.post("addmoreuser_exec.php",{fullname:fullname,mobile:mobile,email:email,password:password},function (result) {
             if (result.trim() == "User Added successfully") {
                 toastr.success(result);
                 $("#my-form").trigger("reset");
             }
             else {
                 toastr.error("Somethin went wrong");
             }
         })
     })
})