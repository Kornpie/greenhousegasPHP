<?php
    
    include 'conn.php';

    $raw_id = $_POST['raw_id'];
    $rawname = $_POST['raw_name'];
    $rawweight = $_POST['raw_weight'];
    $car_id = $_POST['car_id'];
    $company_id = $_POST['company_id'];


    $conn->query("UPDATE tb_raw_materials SET raw_name='".$rawname."', raw_weight='".$rawweight."', raw_company_origin='".$company_id."', raw_cars='".$car_id."' WHERE  raw_id =".$raw_id);


?>