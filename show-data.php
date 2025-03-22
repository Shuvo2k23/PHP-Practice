<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <input type="button" id="load-button" value="Load Data">
        </td>
    </tr>
    <tr>
        <td id="table-data">
            <table border="1" width="100%" cellspacing='0' cellpadding="10px">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>    
            <tr>
                    <td>1</td>
                    <td>Yahoo Baba</td>
                </tr>
            </table>
        </td>
    </tr>
    </table>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript">
       $(document).ready(
        function(){
            $("#load-button").on("click",function(e){
                $.ajax({
                    url:"ajax-load.php",
                    type:"POST",
                    success: function(data){
                        $("#table-data").html(data);
                    }
                }
                );
            });
        }
       );
    </script>
</body>
</html>