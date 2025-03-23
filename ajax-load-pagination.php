<?php
    $db_conn = mysqli_connect("localhost","root","","businessdb") 
                or die("Connection error");
    $page_no = 1;
    if(isset($_POST['page']))
    $page_no = $_POST['page'];
    $output = "";
    $per_page = 3;
    $sql = "SELECT * FROM products LIMIT $page_no, $per_page";
    $result = mysqli_query($db_conn,$sql);
    $no_rows = mysqli_num_rows($result) or die("");
    $last_id = "";
    if($no_rows>0){
        
        $output .="<tbody>";
        
        
        while($row = mysqli_fetch_assoc($result)){
            $last_id = $row['id'];
            $output .= "<tr>
                    <td>{$row["id"]}</td>
                    <td>{$row["product"]}</td>
                    <td>{$row["price"]}</td>
                    <td>{$row["entry_date"]}</td>
                    </tr>";
        }
        
        $output .="</tbody>";
                
    }
    
            $output .="<tbody id='load' ><tr><td colspan ='4'>
                    <button data-id='{$last_id}' id='ajaxbtn'>Load more</button>
                    </td></tr></tbody>";
    echo $output;
    // echo mysqli_num_rows($result);
    mysqli_close($db_conn);
?>