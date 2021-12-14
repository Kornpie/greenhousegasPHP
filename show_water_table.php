<?php 

	include 'conn.php';

	$water_year = $_GET['water_year'];
	$mon_Start = $_GET['mon_Start'];
	$mon_End = $_GET['mon_End'];
	
	// $water_year = 2021;
	// $mon_Start = 1;
	// $mon_End = 7;
$water_name = "การใช้น้ำประปานิคมฯ";

	$sql1 =  "'" . $mon_Start . "' ";
	$sql2 =  "'" . $mon_End . "' ";
	$sql3 =  "'" . $water_year . "' ";
	$sql4 =  "'" . $water_name . "' ";
	

	$queryResult=$conn -> query("SELECT * FROM tb_use_waters where `water_month` >= $sql1 AND `water_month` <= $sql2 AND `water_year` = $sql3 AND `water_name` =  $sql4
	   ORDER BY `water_month` ASC " );

	$result = array ();

	while ($fetchData = $queryResult->fetch_assoc()) {
		$result[] = $fetchData;
	}

	echo json_encode($result);

?>

