<?php
    include('database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <label for="">First Name: </label>
        <input type="text" name="first"><br><br>
        <label for="">Last Name: </label>
        <input type="text" name="last"><br><br>
        <input type="submit" name="submit">
    </form>
</body>
</html>

<?php
    if(($_SERVER['REQUEST_METHOD'])=='POST'){
        $fn = $_POST['first'];
        $ln = $_POST['last'];
        if(!empty($fn) && !empty($ln))
        {
            $query ="INSERT INTO students (first_name,last_name)
                    VALUES ('$fn','$ln')";
            try{
                mysqli_query($db_conn,$query);
                echo "<h3>Entry successful.!</h3>";
            }
            catch(mysqli_sql_exception){
                echo "queary error";
            }
        }
        else{
            echo "<h3>Please input first name & last name!</h3>";
        }
    }
    // foreach($_SERVER as $k => $v)
    // echo $k ."=>" . $v . "<br>";
    mysqli_close($db_conn);
?>