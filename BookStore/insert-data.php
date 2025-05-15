<?php
    include('read-json.php');
    $newBook = [];
    $newBook["title"] = $_POST['title'];
    $newBook["author"] = $_POST['author'];
    $newBook["available"] = $_POST['available'];
    $newBook["pages"] = $_POST['pages'];
    $newBook["isbn"] = $_POST['isbn'];
    
   
    // echo $_POST('title');
    $bookArray[] = $newBook;
    $newJson = json_encode($bookArray);
    //  echo "<pre>";
    // print_r( $newJson);
    // echo "</pre>";
    if(file_exists($fileName) and (!empty($_POST['title']) and !empty($_POST['author'] ))){
        file_put_contents($fileName,$newJson);
        echo "<h1>Insert Successful.!!</h1>";
        
    }
    else{
        echo "<h1>Insertion failed.!!</h1>";
    }
    
?>

<a href='index.php' style="text-decoration: none; color:crimson; font-size:20px"><b>Click here to go Home page..👈 </b>
        </a>