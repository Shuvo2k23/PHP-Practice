<?php
    $conn = mysqli_connect("localhost","root","","businessdb")
            or die("connetion failed");
    
    $sql = "SELECT * FROM students";
    $result = mysqli_query($conn,$sql) or die("query failed");
    $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
    // echo "<pre>"; 
    // print_r($result);
    // echo "</pre>";
    $json_data = json_encode($result);
    $file_name = "my-" . date("d-m-Y") . ".json";
    // this method save the json file
    // file_put_contents($file_name,$json_data);
    echo($json_data);
    mysqli_close($conn);
?>
