<?php
    
    include 'conn.php';

    $waste_id = $_POST['waste_id'];
    $waste_name = $_POST['waste_name'];
    $waste_weight = $_POST['waste_weight'];
    $car_id = $_POST['car_id'];
    $company_id = $_POST['company_id'];


    $conn->query("UPDATE tb_waste_recycle SET waste_name='".$waste_name."', waste_weight='".$waste_weight."', waste_company_destination='".$company_id."', waste_cars='".$car_id."'WHERE  waste_id =".$waste_id);


?>