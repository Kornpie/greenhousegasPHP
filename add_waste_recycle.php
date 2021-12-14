<?php

include 'conn.php';

// $waste_id = $_POST['waste_id'];
$waste_name = $_POST['waste_name'];
$waste_weight = $_POST['waste_weight'];
$car_id = $_POST['car_id'];
 $company_id = $_POST['company_id'];
// $company_id = '1';
$waste_eq = $_POST['waste_eq'];
$waste_distance = $_POST['waste_distance'];
// $waste_distance_eq = $_POST['waste_distance_eq'];
$waste_total_eq = $_POST['waste_total_eq'];
$waste_month = $_POST['waste_month'];
$waste_year = $_POST['waste_year'];
$waste_day = $_POST['waste_day'];
// $waste_month = 02;
// $waste_year = 2022;
$waste_car_codeid = $_POST['waste_car_codeid'];

$selectData = $conn->query("SELECT car_eq FROM tb_typecars where car_id =$car_id  ");
$result = array();

while ($fetchData = $selectData->fetch_assoc()) {
   $result[] = $fetchData;

}
$careq = $result[0]['car_eq'];
echo $careq;

$careqResult = $waste_distance * $careq ;
echo " ค่าจากการคำนวณ ",$careqResult;

//ตรวจสอบ
// $sql1 =  "'" . $waste_month . "' ";
// $sql2 =  "'" . $waste_year . "' ";
// $sql3 =  "'" . $company_id . "' ";
// $selectData = $conn->query("SELECT waste_id,waste_month,waste_year 
// FROM tb_waste_recycle where waste_month = $sql1 AND waste_year = $sql2 AND waste_company_destination = $sql3 ");
// $result = array();

// while ($fetchData = $selectData->fetch_assoc()) {
//     $result[] = $fetchData;
// }

// echo json_encode($result) ;

// $waste_dtoU = json_encode($result[0]['waste_month']);
// $waste_dtoU1 = json_encode($result[0]['waste_year']);
// $waste_idtoU = json_encode($result[0]['waste_id']);
// echo  $waste_dtoU;
// echo  $waste_idtoU;

if ($careqResult) {
    echo "เพิ่มได้";
    $conn->query("INSERT INTO tb_waste_recycle (waste_name, waste_weight, waste_company_destination, waste_cars, waste_eq,  waste_distance, waste_distance_eq, waste_total_eq,waste_day, waste_month, waste_year, waste_car_codeid) 
                                  VALUES ('".$waste_name."','".$waste_weight."','".$company_id."','".$car_id."','".$waste_eq."','".$waste_distance."','".$careqResult."','".$waste_total_eq."','".$waste_day."','".$waste_month."','".$waste_year."','".$waste_car_codeid."')");
}

// else {
//     echo "อัปเดตข้อมูล";
//     $conn->query("UPDATE tb_waste_recycle SET waste_name='".$waste_name."', waste_weight='".$waste_weight."', 
//     waste_company_destination='".$company_id."', waste_cars='".$car_id."', waste_eq='".$waste_eq."' , waste_distance='".$waste_distance."' 
//     ,waste_distance_eq='".$waste_distance_eq."' , waste_total_eq='".$waste_total_eq."', waste_day='".$waste_day."', waste_month='".$waste_month."' , waste_year='".$waste_year."'
//     ,waste_car_codeid='".$waste_car_codeid."' 
//     WHERE  waste_id =".$waste_idtoU);
// }
    
    // if($conn
    // ->query("INSERT INTO tb_waste_recycle (waste_company_destination,waste_name,waste_cars,waste_weight,waste_eq,waste_distance,waste_distance_eq,waste_total_eq,waste_date,waste_car_codeid) 
    // VALUES ('".$company_id."','".$waste_name."','".$car_id."','".$waste_weight."','".$waste_eq."','".$waste_distance."','".$waste_distance_eq."','".$waste_total_eq."','".$waste_date."','".$waste_car_codeid."')"))
    // {
        
       
    // }
