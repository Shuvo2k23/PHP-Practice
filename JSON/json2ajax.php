<?php
    $file_path ="my-23-03-2025.json";
    $json_data = file_get_contents($file_path);
    // $result = json_decode($json_data);
    // echo "<pre>";
    // print_r($result) ;
    // echo "</pre>";
    // $output ="<tbod>";
    // while($row = mysqli_fetch_assoc($result)){
    //     $output .= "<tr><td>{$row['id']}</td><td>{$row['first_name']}</td><td>{$row['last_name']}</td></tr.";
    // }
    // $output .="</tbody>";
    echo $json_data;
?>