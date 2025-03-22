<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <table id="main" border="0" cellspacing='0'>
    <tr>
        <td>
            <h1>PHP with Ajax</h1>
        </td>
    </tr>
    <tr>
        <td id="table-load">
            <form id="form">
                <label for="">First Name: </label>
                <input type="text" id="first" placeholder="First Name"><br><br>
                <label for="">Last Name: </label>
                <input type="text" id="last" placeholder="Last Name"><br><br>
                <input type="button" id="insert-button" value="Insert Data">
            </form>
        
        </td>
    </tr>
    <tr>
        <td id="table-data">
            
        </td>
    </tr>
    <tr>
        <td>
            <h1 id="messege"></h1>
        </td>
    </tr>
    </table>
    <div id="modal">
        <div id="modal-form">
            <h2>Edit Form</h2>
            <table cellpadding="10" width="100%" style="text-align: center;">
            <tr>
                    <td>First Name </td>
                    <td><input type="text" id="edit-fname"></td>
                </tr>
                <tr>
                    <td>Last Name </td>
                    <td><input type="text" id="edit-lname"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" id="edit-submit" value="save"></td>
                </tr>
            </table>
            <div id="close-btn">X</div>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript">
       $(document).ready(function(){
            //Load Table Ajax
            function loadTable(){
                $.ajax({
                    url:"ajax-load.php",
                    type:"POST",
                    success: function(data){
                        $("#table-data").html(data);
                    }
                }
                );
            }
            loadTable();

            //Insert Ajax
            $("#insert-button").on("click",function(event){
                event.preventDefault();
                var first = $("#first").val();
                var last = $("#last").val();
                if( first=="" || last=="" ){
                    $("#messege").text("Something is GorBor!!");
                }
                else{
                    $.ajax({
                        url:"input-ajax.php",
                        type:"POST",
                        data:{first_name:first, last_name: last},
                        success: function(data){
                            if(data==1){
                                loadTable();
                                $("form").trigger("reset");
                                $("#messege").text("Inserted Successfuly!!");
                            }
                             
                            else{
                                alert("Can't Save record");
                            }
                        }
                    });
                
                }
            });

            //Delete Ajax
            $(document).on("click",".del", function(event){
                if(confirm("Do you really want to delete this record?")){
                    var studentId = $(this).data("id");
                    console.log(studentId);
                    var element = this;
                    $.ajax({
                        url: "delete-ajax.php",
                        type: "POST",
                        data:{id: studentId},
                        success: function(value){
                            if(value == 1){
                                $("#messege").text("Deleted Successfuly!!");
                                $(element).closest("tr").fadeOut();
                            }
                            else{
                                $("#messege").text("Error Hay Bro!!");
                            }
                        }
                    });
                } 
            });

            //Edit Table
            $(document).on("click",".edit",function(event){
                $("#modal").show();
                var studentId = $(this).data('id');

                $.ajax({
                   url:"update-form.php",
                   type:"POST",
                   data:{id:studentId},
                   success: function(data){
                    $("#modal-form table").html(data);
                    
                   } 
                })

            });

            //Hide modalbox
            $("#close-btn").on("click",function(e){
                $("#modal").hide();
            });

            //insert-button(যদি  বাটন ডাইনামিকালি আসে তাহলে document selector)
            $(document).on("click","#edit-submit", function(e){
                $std_id = $('#edit-id').val();
                $std_fn = $('#edit-fname').val();
                $std_ln = $('#edit-lname').val();

                $.ajax({
                    url:"update-ajax.php",
                    type:"POST",
                    data:{id: $std_id, first_name:$std_fn, last_name:$std_ln},
                    success: function(data){
                        $("#modal").hide();
                        if(data==1){
                            loadTable();
                            $("#messege").text("Updated Successfuly!!");
                        }
                        else
                        $("#messege").text("Update Error Brooo!!");
                        
                    }
                })
            });
        });
       
    </script>
</body>
</html>