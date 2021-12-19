<?php

include 'conn.php';

$lpg_year = $_GET['lpg_year'];
$mon_Start = $_GET['mon_Start'];
$mon_End = $_GET['mon_End'];
$comid = $_GET['comid'];

$sql1 =  "'" . $mon_Start . "' ";
$sql2 =  "'" . $mon_End . "' ";
// $sql2 =  "10";
$sql3 =  "'" . $lpg_year . "' ";
$sql4 =  "'" . $comid . "' ";
$queryResult = $conn->query("SELECT DISTINCT(`lpg_month`) ,
SUM(`lpg_weight`) as sumweight ,SUM(`lpg_weight_eq`) as sumweight_eq ,SUM(`lpg_distance`) as sum_dis  ,
	SUM(`lpg_distance_eq`) as sum_diseq  ,SUM(`lpg_total_eq`) as sum_total 
	FROM `tb_use_lpg` where `lpg_month` >= $sql1 AND `lpg_month` <= $sql2 AND `lpg_year` = $sql3 
	 AND `lpg_company_origin` = $sql4  GROUP BY `lpg_month` ORDER BY lpg_month ASC" );

$result = array();

while ($fetchData = $queryResult->fetch_assoc()) {
	$result[] = $fetchData;
}

echo json_encode($result);

?>

