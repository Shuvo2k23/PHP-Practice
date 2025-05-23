<?php
include('read-json.php');
$id  = $_GET['id'];
if (array_key_exists($id, $bookArray)) {
    echo "<h1>Deleted Successfully..!!</h1>";
    array_splice($bookArray, $id, 1);
    $newJson = json_encode($bookArray);
    file_put_contents($fileName, $newJson);
    header("Location:index.php");
} else {
    echo "<h1>Something is Gorbor</h1>";
}
