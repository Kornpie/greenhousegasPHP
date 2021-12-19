<?php

    include 'conn.php';

    $lpg_id = $_POST['lpg_id'];
    $lpg_weight_eq = $_POST['lpg_eq'];
    $lpg_weight = $_POST['lpg_weight'];

    $conn->query("UPDATE tb_use_lpg SET lpg_weight='".$lpg_weight."', 
    lpg_weight_eq='".$lpg_weight_eq."'
    WHERE  lpg_id =".$lpg_id);


?>