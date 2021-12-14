<?php 

	include 'conn.php';

	$eg_year = $_GET['eg_year'];
	$mon_Start = $_GET['mon_Start'];
	$mon_End = $_GET['mon_End'];

	// $eg_year = "2021";
	// $mon_Start = "1";
	// $mon_End = "5";
	// $eg_name = "การใช้LPG";
	$sql1 =  "'" . $mon_Start . "' ";
	$sql2 =  "'" . $mon_End . "' ";
	$sql3 =  "'" . $eg_year . "' ";
	// $sql4 =  "'" . $eg_name . "' ";
	$queryResult=$conn -> query("SELECT SUM(`lpg_weight_eq`)as lpg_data2 FROM tb_use_lpg where `lpg_month` >= $sql1 AND `lpg_month` <= $sql2 AND `lpg_year` = $sql3  "  );

	$result = array ();

	while ($fetchData = $queryResult->fetch_assoc()) {
		$result[] = $fetchData;
	}

	echo json_encode($result);

?>