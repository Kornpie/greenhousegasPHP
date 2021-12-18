<?php

include 'conn.php';


$productname = $_POST['productname'];
$productweight = $_POST['productweight'];
$car_id = $_POST['car_id'];
 $company_id = $_POST['company_id'];

$product_eq = $_POST['product_eq'];
$product_distance = $_POST['product_distance'];
// $product_distance_eq = $_POST['product_distance_eq'];
// $product_total_eq = $_POST['product_total_eq'];
$product_month = $_POST['product_month'];
$product_year = $_POST['product_year'];
$product_day = $_POST['product_day'];
// $product_month = 02;
// $product_year = 2022;
$product_car_codeid = $_POST['product_car_codeid'];

$selectData = $conn->query("SELECT car_eq FROM tb_typecars where car_id =$car_id  ");
$result = array();

while ($fetchData = $selectData->fetch_assoc()) {
   $result[] = $fetchData;

}
$careq = $result[0]['car_eq'];
echo $careq;

$careqResult = $product_distance * $careq ;
echo " ค่าจากการคำนวณ ",$careqResult;

$total = $careqResult + $product_eq ; 
//ตรวจสอบ
// $sql1 =  "'" . $product_month . "' ";
// $sql2 =  "'" . $product_year . "' ";
// $sql3 =  "'" . $company_id . "' ";
// $selectData = $conn->query("SELECT product_id,product_month,product_year FROM tb_products where product_month = $sql1 AND product_year = $sql2 AND product_company_origin = $sql3 ");
// $result = array();

// while ($fetchData = $selectData->fetch_assoc()) {
//     $result[] = $fetchData;
// }
// //echo json_encode($result[0]['raw_date']) ;

// $raw_dtoU = json_encode($result[0]['product_month']);
// $raw_dtoU1 = json_encode($result[0]['product_year']);
// $product_idtoU = json_encode($result[0]['product_id']);
// echo  $raw_dtoU;
// echo  $product_idtoU;

if ($careqResult != null && $total != null) {
    echo "เพิ่มได้";
    $conn->query("INSERT INTO tb_products (product_company_origin,product_name,product_cars,product_weight,product_weight_eq,product_distance,product_distance_eq,product_total_eq,product_month,product_year,product_car_codeid,product_day) 
    VALUES ('".$company_id."','".$productname."','".$car_id."','".$productweight."','".$product_eq."','".$product_distance."','".$careqResult."','".$total."','".$product_month."','".$product_year."','".$product_car_codeid."','".$product_day."')");
}
// else {
//     echo "อัปเดตข้อมูล";
//     $conn->query("UPDATE tb_products SET product_name='".$productname."', product_weight='".$productweight."', 
//     product_company_origin='".$company_id."', product_cars='".$car_id."', product_weight_eq='".$product_eq."' , product_distance='".$product_distance."' 
//     ,product_distance_eq='".$product_distance_eq."' , product_total_eq='".$product_total_eq."', product_month='".$product_month."' , product_year='".$product_year."'
//     ,product_car_codeid='".$product_car_codeid."' 
//     WHERE  product_id =".$product_idtoU);
// }
    
    // if($conn
    // ->query("INSERT INTO tb_products (product_company_origin,product_name,product_cars,product_weight,product_eq,product_distance,product_distance_eq,product_total_eq,raw_date,product_car_codeid) 
    // VALUES ('".$company_id."','".$productname."','".$car_id."','".$productweight."','".$product_eq."','".$product_distance."','".$product_distance_eq."','".$product_total_eq."','".$raw_date."','".$product_car_codeid."')"))
    // {
        
       
    // }
