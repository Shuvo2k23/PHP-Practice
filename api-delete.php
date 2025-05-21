<?php
    header('Content-type:application/json');
    header('Access-Control-Allow-Origin:*');
    
    include("config.php");
    $input = json_decode(file_get_contents("php://input"),true);
    $stdId = $input['sid'];
    $sql = "DELETE  FROM students WHERE id={$stdId}";
    
    if(mysqli_query($conn,$sql)){
        echo json_encode(array('messege'=>'Deletion Successful' , 'status'=>true));
    }
    else{
        echo json_encode(array('messege'=>'Deletion Failed.' , 'status'=>false));
    }
    
    
    mysqli_close($conn);
?>
