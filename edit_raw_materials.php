<?php

    include 'conn.php';

    $raw_id = $_POST['rawid'];
    $raw_weight_eq = $_POST['raw_eq'];
    $rawweight = $_POST['rawweight'];

    $conn->query("UPDATE tb_raw_materials SET raw_weight='".$rawweight."', 
    raw_weight_eq='".$raw_weight_eq."'
    WHERE  raw_id =".$raw_id);


?>