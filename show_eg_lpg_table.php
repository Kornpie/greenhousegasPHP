<?php 

	include 'conn.php';

	$eg_year = $_GET['eg_year'];
	$mon_Start = $_GET['mon_Start'];
	$mon_End = $_GET['mon_End'];
	// $eg_name = $_GET['eg_name'];

	$eg_name = "การใช้LPG";

	$sql1 =  "'" . $mon_Start . "' ";
	$sql2 =  "'" . $mon_End . "' ";
	$sql3 =  "'" . $eg_year . "' ";
	$sql4 =  "'" . $eg_name . "' ";
	$queryResult=$conn -> query("SELECT * FROM tb_use_lpg where `lpg_month` >= $sql1 AND `lpg_month` <= $sql2 AND `lpg_year` = $sql3 
	  ORDER BY `lpg_month` ASC " );

	$result = array ();

	while ($fetchData = $queryResult->fetch_assoc()) {
		$result[] = $fetchData;
	}

	echo json_encode($result);

?>