<?php
    include('read-json.php');
    $id  = $_POST['id'];
    $prev = $bookArray[$id];

    $bookArray[$id]->title = $_POST['title'];
    $bookArray[$id]->author = $_POST['author'];
    $bookArray[$id]->available = $_POST['available'];
    $bookArray[$id]->pages = $_POST['pages'];
    $bookArray[$id]->isbn = $_POST['isbn'];
    //  echo "<pre>";
    //         print_r($bookArray);
    //     echo "</pre>";
    // echo "id   :". $id;
    $jsonData = json_encode($bookArray);
    file_put_contents($fileName,$jsonData);
?>

<a href='index.php' style="text-decoration: none; color:crimson; font-size:20px"><b>Click here to go Home page..👈 </b>
</a>