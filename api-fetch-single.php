<?php
    header('Content-type:application/json');
    header('Access-Control-Allow-Origin:*');
    
    include("config.php");
    $input = json_decode(file_get_contents("php://input"),true);
    $stdId = $input['sid'];
    $sql = "SELECT * FROM students WHERE id={$stdId}";
    $result = mysqli_query($conn,$sql) or die("query failed.");
    if(mysqli_num_rows($result)>0){
        $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
        $json_data = json_encode($data) ;
        echo($json_data);
    }
    else{
        echo json_encode(array('messege'=>'No record Found' , 'status'=>false));
    }
    
    
    mysqli_close($conn);
?>
