<?php 

include 'conn.php';
$lpg_year = $_GET['lpg_year'];
$mon_Start = $_GET['mon_Start'];
$mon_End = $_GET['mon_End'];
// $lpg_name = $_GET['lpg_name'];

// $lpg_name = "การใช้LPG";

$sql1 =  "'" . $mon_Start . "' ";
$sql2 =  "'" . $mon_End . "' ";
$sql3 =  "'" . $lpg_year . "' ";
// $sql4 =  "'" . $lpg_name . "' ";
$queryResult=$conn -> query("SELECT * FROM tb_use_lpg where `lpg_month` >= $sql1 AND `lpg_month` <= $sql2 AND `lpg_year` = $sql3 
  ORDER BY `lpg_month` ASC " );

$result = array ();

while ($fetchData = $queryResult->fetch_assoc()) {
	$result[] = $fetchData;
}

echo json_encode($result);
?>