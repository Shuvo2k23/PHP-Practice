<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="jstyle.css">
</head>
<body>
    <div id="top">
        <h1>Play with JSON</h1>
    </div>
    <div>
        <h2>File from sql to Json: </h2>
    </div>
    <div id="container">
        
        <table id="load-data" cellspacing='0' width='90%'>
            <tr>
                <th>ID</th>
                <th>First Name </th>
                <th>Last Name </th>
            </tr>
        </table>
    </div>
    <div>
        <h2>File from local json : </h2>
    </div>
    <div id="container">
        
        <table id="load-data1" cellspacing='0' width='90%'>
            <tr>
                <th>ID</th>
                <th>First Name </th>
                <th>Last Name </th>
            </tr>
        </table>
    </div>
    <script src="jquery.js"></script>
    <script>
        $(document).ready(function(){
            $.getJSON({
                url:"sql2json.php",
                success: function(data){
                    console.log({data});
                    
                    $.each(data,function(key,val){
                        var new_line = "<tr><td>" + val.id +"</td><td>" + val.first_name + "</td><td>" + val.last_name + "</td></tr>";
                        $("#load-data").append(
                            new_line
                        );

                    })
                    
                    
                }
            });
            $.getJSON({
                url:"sql2json.php",
                success: function(data){
                    console.log({data});
                    
                    $.each(data,function(key,val){
                        var new_line = "<tr><td>" + val.id +"</td><td>" + val.first_name + "</td><td>" + val.last_name + "</td></tr>";
                        $("#load-data1").append(
                            new_line
                        );

                    })
                    
                    
                }
            });
            
        });
    </script>
</body>
</html>