<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/insert-style.css">
</head>

<body>
    <div id="modal">
        <div id="modal-form">
            <h1 style="text-align: center;">Please Fill-up All the field</h1>
            <form method="post">
                <table cellpadding="8">
                    <tr>
                        <td><label for="">Title Name:</label></td>
                        <td><input type="text" name="title" placeholder="Title Name"></td>
                    </tr>
                    <tr>
                        <td><label for="">Author Name:</label></td>
                        <td><input type="text" name="author" placeholder="Author Name"></td>
                    </tr>
                    <tr>
                        <td><label for="">Available:</label></td>
                        <td><input type="text" name="available" placeholder="available"></td>
                    </tr>
                    <tr>
                        <td><label for="">Pages:</label></td>
                        <td><input type="text" name="pages" placeholder="Pages"></td>
                    </tr>
                    <tr>
                        <td><label for="">ISBN:</label></td>
                        <td><input type="text" name="isbn" placeholder="isbn"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center; ">
                            <input type="submit" id="submit" value="Insert Book">
                            <a href="index.php"><button type="button" id="cancel">Cancel</button></a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>



</body>

</html>


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include('read-json.php');
    $newBook = [];
    $newBook["title"] = $_POST['title'];
    $newBook["author"] = $_POST['author'];
    $newBook["available"] = $_POST['available'];
    $newBook["pages"] = $_POST['pages'];
    $newBook["isbn"] = $_POST['isbn'];
    $bookArray[] = $newBook;
    $newJson = json_encode($bookArray);
    if (file_exists($fileName) and (!empty($_POST['title']) and !empty($_POST['author']))) {
        file_put_contents($fileName, $newJson);
    }
    header("Location:index.php");
}
?>