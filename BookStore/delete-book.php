<?php
    include('read-json.php');
    $id  = $_GET['id'];
    if(array_key_exists($id,$bookArray)){
        echo "<h1>Deleted Successfully..!!</h1>";
        array_splice($bookArray,$id,1);
        $newJson = json_encode($bookArray);
        // echo "<pre>";
        //     print_r(($newJson));
        // echo "</pre>";
        file_put_contents($fileName,$newJson);
    }
    
    else{
        echo "<h1>Something is Gorbor</h1>";
    }

?>
<a href='index.php' style="text-decoration: none; color:crimson; font-size:20px"><b>Click here to go Home page..👈 </b>
</a>