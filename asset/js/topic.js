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

   $("#add-topic").click(function (e) {
         e.preventDefault();
         var studname = $("#studname").val();
         var partname = $("#partname").val();
         var topic = $("#topic").val();
         var programme = $("#programme").val();
         var index_one = $("#index_one").val();
         var index_two = $("#index_two").val();

          $.post("add_topic_exec.php",{studname:studname,partname:partname,topic:topic,programme,index_one:index_one,index_two:index_two},function (result) {
               if (result.trim() == "Please All fields are required") {
                   toastr.error(result);
               }
                else if (result.trim() == "Project topic has already been submitted"){
                     toastr.info(result);
               }
                 else if (result.trim() == "Project topic has already been submitted"){
                   toastr.info(result);
               }
               else if (result.trim() == "Project topic submitted successfully") {
                   toastr.success(result);
                   $("#my-form").trigger("reset");
                   setTimeout(() => window.location.href='studentdash.php',3000)

               }
          })
   })
});
