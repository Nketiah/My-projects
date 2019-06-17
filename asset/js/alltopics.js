$(function () {
      $(".btngetsupername").click(function () {
          var studid = $(this).closest("tr").find(".studid").val();
          var secondindex = $(this).closest("tr").find(".indextwo").val();
          var topicname = $(this).closest("tr").find(".topicname").val();
          var supername = $(this).closest("tr").find("#supername").val();

            $.post("Addsupername.php",{secondindex:secondindex,studid:studid,supername:supername,topicname:topicname}, function (result) {
              if (result.trim() == "Supervisor Assigned Successfully"){
                  toastr.success(result);
              }
              else {
                  toastr.error("Oops! Make selection first");
              }
            })
      })
})