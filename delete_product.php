<?php
        include 'conn.php';
        $id=$_POST['id'];
        $conn->query("DELETE from tb_products WHERE product_id=$id");

?>