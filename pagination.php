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
        </div>
        
    </div>
</body>
</html>

<script src="jquery.js"></script>
<script>
    $(document).ready(function(){
        loadData =function ($page){
            $.ajax({
                url:"ajax-pagination.php",
                type:"POST",
                data:{page:$page},
                success: function(data){
                    $("#main").html(data);
                    // console.log(data);
                    
                }
            });
        }
        loadData(1);
        $(document).on("click","#pagination a",function(e){
            e.preventDefault();
            var page_id = $(this).attr("id");
            console.log(page_id);
            loadData(page_id);
        });
    });
</script>