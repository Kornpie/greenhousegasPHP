<?php

    include 'conn.php';

    $waste_id = $_POST['waste_id'];
    $waste_eq = $_POST['waste_eq'];
    $waste_weight = $_POST['waste_weight'];

    $conn->query("UPDATE tb_waste_recycle SET waste_weight='".$waste_weight."', 
    waste_eq='".$waste_eq."'
    WHERE  waste_id =".$waste_id);


?>