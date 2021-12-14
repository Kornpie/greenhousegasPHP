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
$lpg_total_eq = $_POST['lpg_total_eq'];
$lpg_day = $_POST['lpg_day'];
$lpg_month = $_POST['lpg_month'];
$lpg_year = $_POST['lpg_year'];
$lpg_car_codeid = $_POST['lpg_car_codeid'];

// $lpg_name = 'ko';
// $lpg_weight = 150;
// $car_id = "2";
// $company_id = "1";
// $lpg_weight_eq = 44;
// $lpg_distance = 55;
// $lpg_distance_eq = 66;
// $lpg_total_eq = 77;
// $lpg_day = 8;
// $lpg_month = 9;
// $lpg_year = 2021;
// $lpg_car_codeid = "hu44";

$waste_car_codeid = $_POST['waste_car_codeid'];

$selectData = $conn->query("SELECT car_eq FROM tb_typecars where car_id =$car_id  ");
$result = array();

while ($fetchData = $selectData->fetch_assoc()) {
   $result[] = $fetchData;

}
$careq = $result[0]['car_eq'];
echo $careq;

$careqResult = $lpg_distance * $careq ;
echo " ค่าจากการคำนวณ ",$careqResult;
if ($careqResult) {
echo "เพิ่มได้";
$conn->query("INSERT INTO tb_use_lpg (lpg_name,lpg_weight,lpg_company_origin,lpg_cars,lpg_weight_eq,lpg_distance,lpg_distance_eq,lpg_total_eq,lpg_day,lpg_month,lpg_year,lpg_car_codeid) 
                                  VALUES ('" . $lpg_name . "','" . $lpg_weight . "','" . $company_id . "'
                                  ,'" . $car_id . "'
                                  ,'" . $lpg_weight_eq . "'
                                  ,'" . $lpg_distance . "'
                                  ,'" . $careqResult . "'
                                  ,'" . $lpg_total_eq . "'
                                  ,'" . $lpg_day . "','" . $lpg_month . "','" . $lpg_year . "','" . $lpg_car_codeid . "')");
                                }