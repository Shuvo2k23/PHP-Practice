<?php
    header('Content-type:application/json');
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Methods:PUT');
    header('Access-Control-Allow-Headers:
            Access-Control-Allow-Methods, Content-Type,
            Access-Control-Allow-Headers,Authorization,X-Requested-With');

    include("config.php");
    $input = json_decode(file_get_contents("php://input"),true);
    $stdId = $input['sid'];
    $fname = $input['fname'];
    $lname = $input['lname'];
    
        $sql = "UPDATE students SET first_name = '{$fname}', last_name = '{$lname}'
                WHERE id = {$stdId}";
     
        if(mysqli_query($conn,$sql)){
            echo json_encode(array('messege'=>'Data Updated Successfuly' , 'status'=>true));
        }
        else{
            echo json_encode(array('messege'=>'Data Update failed' , 'status'=>false));
        }
    
    
    
    
    mysqli_close($conn);
?>
