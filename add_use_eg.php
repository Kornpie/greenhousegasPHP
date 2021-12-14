<?php

include 'conn.php';

$eg_month = $_POST['eg_month'];
$eg_year = $_POST['eg_year'];
$eg_name = $_POST['eg_name'];
$eg_unit = $_POST['eg_unit'];
$eg_unit_eq = $_POST['eg_unit_eq'];


// $eg_month ="01";
// $eg_year = "2021";

// $eg_name = "dsfds";
// $eg_unit ="55";
// $eg_unit_eq ="313";



//ตรวจสอบ
$sql1 =  "'" . $eg_month . "' ";
$sql2 =  "'" . $eg_year . "' ";
$sql3 =  "'" . $eg_name . "' ";
$selectData = $conn->query("SELECT eg_id,eg_month,eg_year,eg_name FROM tb_energy_touse where eg_month = $sql1 AND eg_year = $sql2 AND eg_name = $sql3 ");
$result = array();

while ($fetchData = $selectData->fetch_assoc()) {
    $result[] = $fetchData;
}
echo json_encode($result[0]['eg_id']) ;

$eg_id = json_encode($result[0]['eg_id']);
$eg_month1 = json_encode($result[0]['eg_month']);
$eg_year1 = json_encode($result[0]['eg_year']);

echo  $eg_id;
echo  $eg_month1;
echo  $eg_year1;
if ($result[0]['eg_id']  == null) {
    echo "เพิ่มได้";
    $conn->query("INSERT INTO tb_energy_touse (	eg_name, eg_unit,eg_month,	eg_year,eg_unit_eq) 
    VALUES ('".$eg_name."','".$eg_unit."','".$eg_month."','".$eg_year."','".$eg_unit_eq."')");
} else {
    echo "อัปเดตข้อมูล";
    $conn->query("UPDATE tb_energy_touse SET eg_name='".$eg_name."', eg_unit='".$eg_unit."', 
    eg_month='".$eg_month."', eg_year='".$eg_year."', eg_unit_eq='".$eg_unit_eq."' 
   
    WHERE  eg_id =".$eg_id);
}
    
    // if($conn
    // ->query("INSERT INTO tb_raw_materials (raw_company_origin,raw_name,raw_cars,raw_weight,raw_eq,raw_distance,raw_distance_eq,raw_total_eq,raw_date,raw_car_codeid) 
    // VALUES ('".$company_id."','".$rawname."','".$car_id."','".$rawweight."','".$raw_eq."','".$raw_distance."','".$raw_distance_eq."','".$raw_total_eq."','".$raw_date."','".$raw_car_codeid."')"))
    // {
        
       
    // }
