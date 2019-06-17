$(document).ready(function() {
  $('#modal').iziModal({
    title: 'Reset your password',
    headerColor: '#007E6C',
    autoOpen: true,
    icon: 'fab fa-pinterest',
    iconColor: '#fff',
    padding: 70,
    closeOnEscape: false,
    closeButton: false,
    overlayClose: false,
    transitionIn: 'bounceInDown'
  });

  $("#btnreset").click(function(){
    var studid = $("#studid").val();
    var password = $("#password").val();
    var confpass = $("#confpass").val();
      //alert(studid);
     $.post("resetpassword_exec.php",{studid:studid,password:password,confpass:confpass},function(result){
        if (result.trim() == "Password updated successfully") {
            toastr.success(result);
              password.text = "";
             return;
        }else {
          toastr.error(result);
        }

     })
  })
});
