<?php
    header('Content-type:application/json');
    header('Access-Control-Allow-Origin:*');
    
    include("config.php");
    
    $sql = "SELECT * FROM students";
    $result = mysqli_query($conn,$sql) or die("query failed.");
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $json_data = json_encode($data) ;
    echo($json_data);
    // echo "<pre>";
    // print_r($json_data);
    // echo "</pre>";
    mysqli_close($conn);
?>
