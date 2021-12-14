<?php

include 'conn.php';

$raw_yaer = $_GET['raw_yaer'];
$mon_Start = $_GET['mon_Start'];
$mon_End = $_GET['mon_End'];
$comid = $_GET['comid'];

$sql1 =  "'" . $mon_Start . "' ";
$sql2 =  "'" . $mon_End . "' ";
// $sql2 =  "10";
$sql3 =  "'" . $raw_yaer . "' ";
$sql4 =  "'" . $comid . "' ";
$queryResult = $conn->query("SELECT DISTINCT(`raw_month`) ,
SUM(`raw_weight`) as sumweight ,SUM(`raw_weight_eq`) as sumweight_eq ,SUM(`raw_distance`) as sum_dis  ,
	SUM(`raw_distance_eq`) as sum_diseq  ,SUM(`raw_total_eq`) as sum_total 
	FROM `tb_raw_materials` where `raw_month` >= $sql1 AND `raw_month` <= $sql2 AND `raw_yaer` = $sql3 
	 AND `raw_company_origin` = $sql4  GROUP BY `raw_month` ORDER BY raw_month ASC" );

$result = array();

while ($fetchData = $queryResult->fetch_assoc()) {
	$result[] = $fetchData;
}

echo json_encode($result);

?>

