<?php
    include('conn.php');
   

    $sql = "SELECT * from tb_company";
    $result=$conn->query($sql);
    $resultt = array();
   

        while($row=mysqli_fetch_assoc($result)){
            $list[]=$row;
        }
        echo json_encode($list);
   
?>