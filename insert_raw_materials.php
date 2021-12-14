<?php 

    include 'conn.php';

    $rawname = $_POST['rawname'];
    $rawweight = $_POST['rawweight'];
    $car_id = $_POST['car_id'];
    $company_id = $_POST['company_id'];

   

	
    

    //ตรวจสอบ
    if($conn
    ->query("INSERT INTO tb_raw_materials (raw_company_origin,raw_name,raw_cars,raw_weight) VALUES ('".$company_id."','".$rawname."','".$car_id."','".$rawweight."')"))
    {
        
       
    }


?>