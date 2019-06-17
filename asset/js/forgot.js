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

    $("#btnforgot").click(function(e){
     var email = $("#email").val();
     $.post("getstudentid.php",{email:email},function(result){
        //  alert(result);
      var allresult =  result.split("<=>");
      var studid = allresult[0];
      var studemail = allresult[1];
      var studname = allresult[2];
     //  alert(studid);
     //  alert(studemail);
     // alert(studname);
     $.post("sendmail.php",{studid:studid, studemail:studemail,studname:studname},function(result){
            //alert(result);
         toastr.success(result);
    })
    })

       })
});
