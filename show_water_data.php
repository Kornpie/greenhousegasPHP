<?php 

	include 'conn.php';

	$water_year = $_GET['water_year'];
	$mon_Start = $_GET['mon_Start'];
	$mon_End = $_GET['mon_End'];

	$sql1 =  "'" . $mon_Start . "' ";
	$sql2 =  "'" . $mon_End . "' ";
	$sql3 =  "'" . $water_year . "' ";
	$queryResult=$conn -> query("SELECT SUM(`water_cubic_eq`)as water_data2 FROM tb_use_waters where `water_month` >= $sql1 AND `water_month` <= $sql2 AND `water_year` = $sql3 " );

	$result = array ();

	while ($fetchData = $queryResult->fetch_assoc()) {
		$result[] = $fetchData;
	}

	echo json_encode($result);

?>