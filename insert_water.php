<?php

include 'conn.php';

// $water_id = $_POST['water_id'];
$water_cubic = $_POST['water_cubic'];
$water_cubic_eq = $_POST['water_cubic_eq'];
$water_month = $_POST['water_month'];
$water_year = $_POST['water_year'];
$water_name = $_POST['water_name'];
// $water_cubic= "789";
// $water_cubic_eq="789";
// $water_month = "01";
// $water_year = "2021";




//ตรวจสอบ
$sql1 =  "'" . $water_month . "' ";
$sql2 =  "'" . $water_year . "' ";
$sql3 =  "'" . $water_name . "' ";
$selectData = $conn->query("SELECT water_id,water_month,water_year FROM tb_use_waters where water_month = $sql1 AND water_year = $sql2 AND water_name = $sql3 ");
$result = array();

while ($fetchData = $selectData->fetch_assoc()) {
    $result[] = $fetchData;
}
echo json_encode($result[0]['water_id']) ;

$water_dtoU = json_encode($result[0]['water_month']);
$water_dtoU1 = json_encode($result[0]['water_year']);
$water_idtoU = json_encode($result[0]['water_id']);
echo  $water_dtoU;
echo  $water_idtoU;

if ($result[0]['water_id']  == null) {
    echo "เพิ่มได้";
    $conn->query("INSERT INTO tb_use_waters (water_cubic,water_month,water_year,water_cubic_eq,water_name) 
    VALUES ('".$water_cubic."','".$water_month."','".$water_year."','".$water_cubic_eq."','".$water_name."')");
} else {
    echo "อัปเดตข้อมูล";
    $conn->query("UPDATE tb_use_waters SET water_cubic='".$water_cubic."', 
     water_month='".$water_month."' , water_year='".$water_year."'
    ,water_cubic_eq='".$water_cubic_eq."',water_name='".$water_name."' 
    WHERE  water_id =".$water_idtoU);
}
    
    // if($conn
    // ->query("INSERT INTO tb_use_waters (water_company_origin,water_name,water_cars,water_weight,water_cubic_eq,water_distance,water_distance_eq,water_total_eq,water_date,water_car_codeid) 
    // VALUES ('".$company_id."','".$water_cubic."','".$car_id."','".$waterweight."','".$water_cubic_eq."','".$water_distance."','".$water_distance_eq."','".$water_total_eq."','".$water_date."','".$water_car_codeid."')"))
    // {
        
       
    // }
