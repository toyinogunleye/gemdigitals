<?php
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    // echo "Thank you " . $first_name . " " . $last_name . " for your submission."
?>

<!DOCTYPE html>
<html>

<head>
    
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>  
</head>
<body>

  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#contact_dialog">Contact</button>
     
<!-- the div that represents the modal dialog -->
<div class="modal fade" id="contact_dialog" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Enter your name</h4>
            </div>
                <div class="modal-body">
                    <form id="contact_form" action="/onlinejson/test.php" method="POST">
                        First name: <input type="text" name="first_name"><br/>
                        Last name: <input type="text" name="last_name"><br/>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" id="submitForm" class="btn btn-default">Send</button>
                </div>
            </div>
        </div>
    </div>
  <!--close the modal by just clicking outside of the modal-->
  <script>
    /* must apply only after HTML has loaded */
$(document).ready(function () {
    $("#contact_form").on("submit", function(e) {
        var postData = $(this).serializeArray();
        var formURL = $(this).attr("action");
        $.ajax({
            url: formURL,
            type: "POST",
            data: postData,
            success: function(data, textStatus, jqXHR) {
                $('#contact_dialog .modal-header .modal-title').html("Result");
                $('#contact_dialog .modal-body').html(data);
                $("#submitForm").remove();
            },
            error: function(jqXHR, status, error) {
                console.log(status + ": " + error);
            }
        });
        e.preventDefault();
    });
     
    $("#submitForm").on('click', function() {
        $("#contact_form").submit();
    });
});
  </script>

</body>

</html>
