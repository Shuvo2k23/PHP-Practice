<?php
    $db_conn = mysqli_connect("localhost","root","","businessdb") 
                or die("Connection error");
    $sql = "SELECT * FROM products";
    $page_no = 1;
    if(isset($_POST['page']))
    $page_no = $_POST['page'];
    $result = mysqli_query($db_conn,$sql) or die("Query Error");
    $output = "";
    $no_rows = mysqli_num_rows($result);
    if($no_rows>0){
        $per_page = 3;
        $tot_page = ceil($no_rows / $per_page);
        $offset = ($page_no-1)*$per_page;
        $sql = "SELECT * FROM products LIMIT $offset, $per_page";
        $result = mysqli_query($db_conn,$sql);
        $output .= "<table border='1' cellspacing='0' id='up'>
                <tr>
                    <th width='20%'>Product Id</th>
                    <th  width='35%'>Product Name</th>
                    <th width='20%'>Price</th>
                    <th>Entry date </th>
                </tr>
                
            ";
        while($row = mysqli_fetch_assoc($result)){
            $output .= "<tr>
                    <td>{$row["id"]}</td>
                    <td>{$row["product"]}</td>
                    <td>{$row["price"]}</td>
                    <td>{$row["entry_date"]}</td>
                    </tr>";
        }
        $output .="</table>
                    <div id='pagination' >
                    ";
        $status = "";
        for($in = 1;$in<=$tot_page;$in++){
            if($in==$page_no)
            $status = "active";
            else
            $status = "";
            $output .="<a class='{$status}' href='' id='{$in}'>{$in}</a>";
        }
        $output .= "</div>";            
    }
    else{
        $output .="<h2>No Entry</h2>";
    }
    echo $output;
    // echo mysqli_num_rows($result);
    mysqli_close($db_conn);
?>