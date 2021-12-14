<?php 

	// include 'conn.php';

	// $waste_year = $_GET['waste_year'];
	// $mon_Start = $_GET['mon_Start'];
	// $mon_End = $_GET['mon_End'];
	// $waste_company_destination = $_GET['comid'];

	// $sql1 =  "'" . $mon_Start . "' ";
	// $sql2 =  "'" . $mon_End . "' ";
	// $sql3 =  "'" . $waste_year . "' ";
	// $sql4 =  "'" . $waste_company_destination . "' ";
	// $queryResult=$conn -> query("SELECT * FROM tb_waste_recycle where `waste_month` >= $sql1 AND `waste_month` <= $sql2 AND `waste_year` = $sql3 
	//  AND `waste_company_destination` = $sql4 ORDER BY `waste_month` ASC " );

	// $result = array ();

	// while ($fetchData = $queryResult->fetch_assoc()) {
	// 	$result[] = $fetchData;
	// }

	// echo json_encode($result);

?>

<?php

include 'conn.php';

$waste_year = $_GET['waste_year'];
$mon_Start = $_GET['mon_Start'];
$mon_End = $_GET['mon_End'];
$comid = $_GET['comid'];

$sql1 =  "'" . $mon_Start . "' ";
$sql2 =  "'" . $mon_End . "' ";
$sql3 =  "'" . $waste_year . "' ";
$sql4 =  "'" . $comid . "' ";
$queryResult = $conn->query("SELECT DISTINCT(waste_month) ,
SUM(waste_weight) as sumweight ,SUM(waste_eq) as sumweight_eq ,SUM(waste_distance) as sum_dis  ,
    SUM(waste_distance_eq) as sum_diseq  ,SUM(waste_total_eq) as sum_total 
    FROM tb_waste_recycle where waste_month >= $sql1 AND waste_month <= $sql2 AND waste_year = $sql3 
     AND waste_company_destination = $sql4  GROUP BY waste_month  ");

$result = array();

while ($fetchData = $queryResult->fetch_assoc()) {
    $result[] = $fetchData;
}

echo json_encode($result);

?>