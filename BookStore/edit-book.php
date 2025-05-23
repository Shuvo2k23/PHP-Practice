<?php
include('read-json.php');
$id  = $_GET['id'];
$prev = $bookArray[$id];
?>
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
            <h1 style="text-align: center;">Update page</h1>
            <form method="post">
                <table cellpadding="8">
                    <tr>
                        <td><label for="">Title Name:</label></td>
                        <td><input type="text" name="title" value="<?php echo htmlspecialchars($prev->title) ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="">Author Name:</label></td>
                        <td><input type="text" name="author" value="<?php echo htmlspecialchars($prev->author) ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="">available:</label></td>
                        <td><input type="text" name="available" value="<?php echo htmlspecialchars($prev->available) ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="">Pages:</label></td>
                        <td><input type="text" name="pages" value="<?php echo htmlspecialchars($prev->pages) ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="">ISBN:</label></td>
                        <td><input type="text" name="isbn" value="<?php echo htmlspecialchars($prev->isbn) ?>"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center; ">
                            <input type="submit" id="submit" value="Update Details">
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
    $bookArray[$id]->title = $_POST['title'];
    $bookArray[$id]->author = $_POST['author'];
    $bookArray[$id]->available = $_POST['available'];
    $bookArray[$id]->pages = $_POST['pages'];
    $bookArray[$id]->isbn = $_POST['isbn'];
    $jsonData = json_encode($bookArray);
    file_put_contents($fileName, $jsonData);
    header("Location:index.php");
}
?>