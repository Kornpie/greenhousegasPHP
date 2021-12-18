<?php

include 'conn.php';

// $raw_id = $_POST['raw_id'];
$rawname = $_POST['rawname'];
$rawweight = $_POST['rawweight'];
$car_id = $_POST['car_id'];
// $car_id = 1;
$company_id = $_POST['company_id'];
// $company_id = '2';
$raw_eq = $_POST['raw_eq'];
// $raw_distance = 2555;
$raw_distance = $_POST['raw_distance'];
// $raw_distance_eq = $_POST['raw_distance_eq'];
//$raw_total_eq = $_POST['raw_total_eq'];
$raw_month = $_POST['raw_month'];
$raw_yaer = $_POST['raw_yaer'];
$raw_day = $_POST['raw_date'];
// $raw_month = 02;
// $raw_yaer = 2022;
$raw_car_codeid = $_POST['raw_car_codeid'];

 $selectData = $conn->query("SELECT car_eq FROM tb_typecars where car_id =$car_id  ");
 $result = array();

 while ($fetchData = $selectData->fetch_assoc()) {
    $result[] = $fetchData;

}
$careq = $result[0]['car_eq'];
echo $careq;

$careqResult = $raw_distance * $careq ;
echo " ค่าจากการคำนวณ ",$careqResult;


$total = $careqResult + $raw_eq ; 
//ตรวจสอบ
// $sql1 =  "'" . $raw_month . "' ";
// $sql2 =  "'" . $raw_yaer . "' ";
// $sql3 =  "'" . $company_id . "' ";
// $sql4 =  "'" . $raw_day . "' ";
// $selectData = $conn->query("SELECT raw_id,raw_month,raw_yaer FROM tb_raw_materials where raw_date = $sql4 AND raw_month = $sql1 AND raw_yaer = $sql2 AND raw_company_origin = $sql3 ");
// $result = array();

// while ($fetchData = $selectData->fetch_assoc()) {
//     $result[] = $fetchData;
// }
// //echo json_encode($result[0]['raw_date']) ;

// $raw_dtoU = json_encode($result[0]['raw_month']);
// $raw_dtoU1 = json_encode($result[0]['raw_yaer']);
// $raw_idtoU = json_encode($result[0]['raw_id']);
// echo  $raw_dtoU;
// echo  $raw_idtoU;

if ($careqResult != null && $total != null) {
    echo "เพิ่มได้";
    $conn->query("INSERT INTO tb_raw_materials (raw_company_origin,raw_name,raw_cars,raw_weight,raw_weight_eq,raw_distance,raw_distance_eq,raw_total_eq,raw_month,raw_yaer,raw_car_codeid,raw_date) 
    VALUES ('" . $company_id . "','" . $rawname . "','" . $car_id . "','" . $rawweight . "','" . $raw_eq . "','" . $raw_distance . "','" . $careqResult . "','" . $total . "','" . $raw_month . "','" . $raw_yaer . "','" . $raw_car_codeid . "','" . $raw_day . "')");
}
// else {
//     echo "อัปเดตข้อมูล";
//     $conn->query("UPDATE tb_raw_materials SET raw_name='" . $rawname . "', raw_weight='" . $rawweight . "', 
//     raw_company_origin='" . $company_id . "', raw_cars='" . $car_id . "', raw_weight_eq='" . $raw_eq . "' , raw_distance='" . $raw_distance . "' 
//     ,raw_distance_eq='" . $raw_distance_eq . "' , raw_total_eq='" . $raw_total_eq . "', raw_month='" . $raw_month . "' , raw_yaer='" . $raw_yaer . "'
//     ,raw_car_codeid='" . $raw_car_codeid . "'  ,raw_date='" . $raw_day . "' 
//     WHERE  raw_id =" . $raw_idtoU);
// }
    
    // if($conn
    // ->query("INSERT INTO tb_raw_materials (raw_company_origin,raw_name,raw_cars,raw_weight,raw_eq,raw_distance,raw_distance_eq,raw_total_eq,raw_date,raw_car_codeid) 
    // VALUES ('".$company_id."','".$rawname."','".$car_id."','".$rawweight."','".$raw_eq."','".$raw_distance."','".$raw_distance_eq."','".$raw_total_eq."','".$raw_date."','".$raw_car_codeid."')"))
    // {
        
       
    // }
