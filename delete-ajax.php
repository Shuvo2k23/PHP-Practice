<?php
    include("database.php");
    $id = $_POST['id'];
    $sql = "DELETE FROM students WHERE id='$id'";
    // echo $id;
    if(mysqli_query($db_conn,$sql))
    echo 1;
    else
    echo 0;


    mysqli_close($db_conn);
?>