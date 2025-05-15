<?php
    include('read-json.php');
    $output = "";
    if(sizeof($bookArray)>0){
        $output = ' <table border="1" width="100%" cellspacing="0" cellpadding="10px">
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th width="60px">Available</th>
                    <th width="90px">Edit</th>
                    <th width="90px">Delete</th>
                </tr>    
                ';
        foreach($bookArray as $key=>$book){
            $output .= "<tr><td>{$book->title}</td>
                            <td>{$book->author}</td>
                            <td>{$book->available}</td>
                            <td><a href='edit-book.php?id={$key}'><button class='edit'>Edit</button></a></td>
                            <td><a href='delete-book.php?id={$key}'><button class='del' onclick='myFunction()'>Delete</button></a></td></tr>";
        }
        $output .= "</table>";
        echo $output;
    }
    else{
        echo "<h2>No Record Found </h2>";
    }

    // echo "<pre>";
     
    //     print_r($bookArray);
    // echo "</pre>";


?>

<script>
function myFunction() {
  confirm("Really want to Delete.!!");
}
</script>