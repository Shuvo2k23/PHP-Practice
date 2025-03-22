<?php
    $conc = mysqli_connect("localhost","root","","businessdb") or die("Connection failde");
    $sql = "SELECT * FROM students";
    $result = mysqli_query($conc,$sql) or die("SQL Query Failed.");
    $output = "";
    if(mysqli_num_rows($result)>0){
        $output = ' <table border="1" width="100%" cellspacing="0" cellpadding="10px">
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                </tr>    
                ';
        while($row = mysqli_fetch_assoc($result)){
            $output .= "<tr><td>{$row["id"]}</td>
                            <td>{$row["first_name"]}</td>
                            <td>{$row["last_name"]}</td></tr>";
        }
        $output .= "</table>";
        echo $output;
    }
    else{
        echo "<h2>No Record Found </h2>";
    }


    mysqli_close($conc);
?>