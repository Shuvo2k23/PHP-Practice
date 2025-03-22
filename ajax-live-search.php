<?php
    $conc = mysqli_connect("localhost","root","","businessdb") or die("Connection failde");
    $item = $_POST['item'];
    $sql = "SELECT * FROM students WHERE  first_name LIKE '%$item%' OR  last_name LIKE '%{$item}%'";
    $result = mysqli_query($conc,$sql) or die("SQL Query Failed.");
    $output = "";
    if(mysqli_num_rows($result)>0){
        $output = ' <table border="1" width="100%" cellspacing="0" cellpadding="10px">
                <tr>
                    <th width="60px">ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th width="90px">Edit</th>
                    <th width="90px">Delete</th>
                </tr>    
                ';
        while($row = mysqli_fetch_assoc($result)){
            $output .= "<tr><td>{$row["id"]}</td>
                            <td>{$row["first_name"]}</td>
                            <td>{$row["last_name"]}</td>
                            <td><button class='edit' data-id={$row["id"]}>Edit</button></td>
                            <td><button class='del' data-id={$row["id"]}>Delete</button></td></tr>";
        }
        $output .= "</table>";
        echo $output;
    }
    else{
        echo "<h2>No Record Found </h2>";
    }


    mysqli_close($conc);
?>