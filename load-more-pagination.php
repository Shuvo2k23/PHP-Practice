<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Style/pagination-style.css">
</head>
<body>
    <div id="body">
        <div id="head">
            <h1>Pagination Example</h1>
            <p>Pagination is a technique used to devide a table into some pages</p>
        </div>
        <div id="main">
            <!-- main table here -->
            <table border='1' cellspacing='0' id='up'>
                <tr>
                    <th width='20%'>Product Id</th>
                    <th  width='35%'>Product Name</th>
                    <th width='20%'>Price</th>
                    <th>Entry date </th>
                </tr>
            </table>
        </div>
        
    </div>
</body>
</html>

<script src="jquery.js"></script>
<script>
    $(document).ready(function(){
        loadData =function (page){
            $.ajax({
                url:"ajax-load-pagination.php",
                type:"POST",
                data:{page:page},
                success: function(data){
                    
                    if(data){
                        $("#load").remove();
                        $("#up").append(data);
                    }
                    
                    else
                    $("#ajaxbtn").prop("disabled",true);
                    // console.log(data);
                    
                }
            });
        }
        loadData();
        $(document).on("click","#load button",function(e){
            e.preventDefault();
            var last = $(this).data("id");
            console.log(last);
            // $("#up").append(data);
            loadData(last);
        });
    });
</script>