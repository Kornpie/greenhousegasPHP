<?php

include 'conn.php';

$raw_id = $_POST['raw_id'];
$lpg_name = $_POST['lpg_name'];
$lpg_weight = $_POST['lpg_weight'];
$car_id = $_POST['car_id'];
$company_id = $_POST['company_id'];
$lpg_weight_eq = $_POST['lpg_weight_eq'];
$lpg_distance = $_POST['lpg_distance'];
// $lpg_distance_eq = $_POST['lpg_distance_eq'];
// $lpg_total_eq = $_POST['lpg_total_eq'];
$lpg_day = $_POST['lpg_day'];
$lpg_month = $_POST['lpg_month'];
$lpg_year = $_POST['lpg_year'];
$lpg_car_codeid = $_POST['lpg_car_codeid'];



$waste_car_codeid = $_POST['waste_car_codeid'];

$selectData = $conn->query("SELECT car_eq FROM tb_typecars where car_id =$car_id  ");
$result = array();

while ($fetchData = $selectData->fetch_assoc()) {
   $result[] = $fetchData;
}
$careq = $result[0]['car_eq'];
echo $careq;

$careqResult = $lpg_distance * $careq;
echo " ค่าจากการคำนวณ ", $careqResult;
$total = $careqResult + $lpg_weight_eq ; 

if ($careqResult != null && $total != null) {
   echo "เพิ่มได้";
   $conn->query("INSERT INTO tb_use_lpg (lpg_name,lpg_weight,lpg_company_origin,lpg_cars,lpg_weight_eq,lpg_distance,lpg_distance_eq,lpg_total_eq,lpg_day,lpg_month,lpg_year,lpg_car_codeid) 
                                  VALUES ('" . $lpg_name . "','" . $lpg_weight . "','" . $company_id . "'
                                  ,'" . $car_id . "'
                                  ,'" . $lpg_weight_eq . "'
                                  ,'" . $lpg_distance . "'
                                  ,'" . $careqResult . "'
                                  ,'" . $total . "'
                                  ,'" . $lpg_day . "','" . $lpg_month . "','" . $lpg_year . "','" . $lpg_car_codeid . "')");
}
