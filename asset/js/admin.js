$(function () {
   $("#adduser").click(function (e) {
       e.preventDefault();
       var username = $("#username").val();
       var mobile = $("#mobile").val();
       var password = $("#password").val();

         $.post("add_user.php",{username:username,mobile:mobile,password:password,code:"add"},function (result) {
             toastr.info(result);
             setTimeout(() => window.location.href="admin.php",2000);

         })

   })
})