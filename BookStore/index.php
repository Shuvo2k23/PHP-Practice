<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <table id="main" border="0" cellspacing='0'>
    <tr>
        <td colspan="2">
            <h1>Book Store using PHP</h1>
        </td>
    </tr>
    <tr>
        <td id="table-load" colspan="2" style="padding: 30px;">
            
            <a href="insert.php">
                <button style="height: 40px; font-size:20px; border-radius:5px;background-color:rgb(186, 55, 226); color:wheat">Add Book</button>
            </a>
            
        </td>
        
    </tr>
    <tr>
        <td id="table-data" colspan="2">
            <?php
                include('load-books.php')
            ?>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <h1 id="messege"></h1>
        </td>
    </tr>
    </table>
   
    
    
</body>
</html>