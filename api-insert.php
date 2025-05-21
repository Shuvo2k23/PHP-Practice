<?php
    header('Content-type:application/json');
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Methods:POST');
    

    include("config.php");
    $input = json_decode(file_get_contents("php://input"),true);
    // $stdId = $input['sid'];
    $fname = $input['fname'];
    $lname = $input['lname'];
    if(empty($fname) || empty($lname))
    echo json_encode(array('messege'=>'Invalid Input' , 'status'=>false));
    else{
        $sql = "INSERT INTO students (first_name, last_name)
            VALUES ('$fname','$lname')";
     
        if(mysqli_query($conn,$sql)){
            echo json_encode(array('messege'=>'Data Inserted Successfuly' , 'status'=>true));
        }
        else{
            echo json_encode(array('messege'=>'Data Insertion failed' , 'status'=>false));
        }
    }
    
    
    
    mysqli_close($conn);
?>
