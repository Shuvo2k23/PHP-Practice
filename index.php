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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript">
       $(document).ready(function(){
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
        });
       
    </script>
</body>
</html>