<?php
    include("database.php");
    $fn = $_POST['first_name'];
    $ln = $_POST['last_name'];
    $id = $_POST['id'];
    $sql = "UPDATE students SET first_name='{$fn}', last_name = '{$ln}' 
            WHERE id = '$id'";
    if(mysqli_query($db_conn,$sql)){
        echo 1;
    }
    else
    echo $id;

    mysqli_close($db_conn);
?>