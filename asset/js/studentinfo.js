$(function () {
    $(".btngetsupername").click(function () {
        var indexone = $(this).closest("tr").find(".indexone").val();
        var secondindex = $(this).closest("tr").find(".indextwo").val();
        var topicname = $(this).closest("tr").find(".topicname").val();
        var supername = $(this).closest("tr").find(".supername").val();
        var superid = $(this).closest("tr").find(".superid").val();
        var supermobile = $(this).closest("tr").find(".supermobile").val();

        //Jquery Confirm
        $.confirm({
            title: 'Confirm!',
            btnClass: 'btn-green',
            type:'green',
            content: 'Please are you sure\n you want to select this students for supervision?',
            buttons: {
                YES: {
                    btnClass:'btn-success',
                    action:function () {
                        $.post("SelectStudents.php",{secondindex:secondindex,indexone:indexone,supername:supername,superid:superid,topicname:topicname,supermobile:supermobile}, function (result) {
                            if (result.trim() == "Students Selected Successfully"){
                                toastr.success(result);
                                setTimeout(() => window.location.href='getstudents.php',2000)
                            }
                             else if (result.trim() == "Alreay Have A Supervisor"){
                                 toastr.error("Alreay Have A Supervisor");
                            }
                            else {
                                toastr.error("Oops! Make selection first");
                            }
                        });
                    },
                },
                NO: {
                    btnClass:'btn-red',
                    action:function () {

                    }
                },

            }
        });
        //End of Confirm
    })
      //ToolTIP Effect
    $(".btngetsupername").hover(function () {
        var indexone = $(this).closest("tr").find(".indexone").val();
        var secondindex = $(this).closest("tr").find(".indextwo").val();
         $.post("Tooltip.php",{indexone:indexone,secondindex:secondindex},function (result) {

         })
    })

})