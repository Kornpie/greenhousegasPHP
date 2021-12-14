<?php

include 'conn.php';

$product_year = $_GET['product_year'];
$mon_Start = $_GET['mon_Start'];
$mon_End = $_GET['mon_End'];
$comid = $_GET['comid'];

$sql1 =  "'" . $mon_Start . "' ";
$sql2 =  "'" . $mon_End . "' ";
$sql3 =  "'" . $product_year . "' ";
$sql4 =  "'" . $comid . "' ";
$queryResult = $conn->query("SELECT DISTINCT(product_month) ,
SUM(product_weight) as sumweight ,SUM(product_weight_eq) as sumweight_eq ,SUM(product_distance) as sum_dis  ,
    SUM(product_distance_eq) as sum_diseq  ,SUM(product_total_eq) as sum_total 
    FROM tb_products where product_month >= $sql1 AND product_month <= $sql2 AND product_year = $sql3 
     AND product_company_origin = $sql4  GROUP BY product_month  ");

$result = array();

while ($fetchData = $queryResult->fetch_assoc()) {
    $result[] = $fetchData;
}

echo json_encode($result);

?>