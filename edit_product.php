<?php

    include 'conn.php';

    $product_id = $_POST['product_id'];
    $product_weight_eq = $_POST['product_eq'];
    $product_weight = $_POST['product_weight'];

    $conn->query("UPDATE tb_products SET product_weight='".$product_weight."', 
    product_weight_eq='".$product_weight_eq."'
    WHERE  product_id =".$product_id);


?>