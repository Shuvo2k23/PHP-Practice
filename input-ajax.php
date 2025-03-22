<?php
    $conc = mysqli_connect("localhost","root","","businessdb") or die("Connection failde");
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    
    $sql = "INSERT INTO students (first_name, last_name) 
            VALUES ('$first_name','$last_name')";
    if(mysqli_query($conc,$sql))
        echo 1;
    else
        echo 0;


    mysqli_close($conc);
?>