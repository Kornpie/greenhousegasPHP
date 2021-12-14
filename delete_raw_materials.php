<?php
        include 'conn.php';
        $id=$_POST['id'];
        $conn->query("DELETE from tb_raw_materials WHERE raw_id=$id");

?>