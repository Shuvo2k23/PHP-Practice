<?php
    include("database.php");
    $studentId = $_POST['id'];
    $sql = "SELECT * FROM students WHERE id = '$studentId' ";
    $result = mysqli_query($db_conn,$sql) or die("fail");
        
 
    
    if(mysqli_num_rows($result)>0){
       
        while($row = mysqli_fetch_assoc($result)){
             $output= "<table cellpadding='10' width='100%' style='text-align: center;'>
            <tr>
                    <td>First Name </td>
                    <td>
                        <input type='text' id='edit-fname' value='{$row["first_name"]}'>
                        <input type='text' id='edit-id' hidden value='{$row["id"]}'>
                    </td>
                </tr>
                <tr>
                    <td>Last Name </td>
                    <td><input type='text' id='edit-lname' value='{$row["last_name"]}'></td>
                </tr>
                <tr>
                    <td colspan='2'><input type='submit' id='edit-submit' value='save'></td>
                </tr>
            </table>";
            echo $output;
        }
        
        
    }
    // echo $studentId;
    mysqli_close($db_conn);
?>