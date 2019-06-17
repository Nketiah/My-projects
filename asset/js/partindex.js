$(document).ready(function() {
    $('#modal').iziModal({
        title: 'Add project topic',
        headerColor: '#007E6C',
        autoOpen: true,
        icon: 'fab fa-pinterest',
        iconColor: '#fff',
        padding: 70,
        closeOnEscape: false,
        closeButton: false,
        overlayClose: false,
        overlay: false,
        transitionIn: 'bounceInDown'
    });

      $("#add-index").click(function (e) {
          e.preventDefault();
          var myindex = $("#myindex").val();
          var partindex = $("#partindex").val();
          $.post("partname.php",{myindex:myindex,partindex:partindex},function (result) {
               if (result.trim() == "Done"){
                   window.location.href="add_topic.php";
               }
          })

      })
});
