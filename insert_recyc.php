<?php 

    include 'conn.php';

    $recyc_name = $_POST['recyc_name'];
    $recyc_weight = $_POST['recyc_weight'];
    $company_id = $_POST['company_id'];
    $car_id = $_POST['car_id'];
  

   

	
    

    //ตรวจสอบ
    if($conn
    ->query("INSERT INTO tb_waste_recycle (waste_name,waste_weight,waste_company_destination,waste_cars) VALUES ('".$recyc_name."','".$recyc_weight."','".$company_id."','".$car_id."')"))
    {
        
       
    }


?>