<?php
    include("database.php");
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    
    $sql = "INSERT INTO students (first_name, last_name) 
            VALUES ('$first_name','$last_name')";
    if(mysqli_query($db_conn,$sql))
        echo 1;
    else
        echo 0;


    mysqli_close($db_conn);
?>