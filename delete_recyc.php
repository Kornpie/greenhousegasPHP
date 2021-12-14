<?php
        include 'conn.php';
        $id=$_POST['id'];
        $conn->query("DELETE from tb_waste_recycle WHERE waste_id=$id");

?>