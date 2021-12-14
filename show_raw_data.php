<?php 

	include 'conn.php';

	$raw_yaer = $_GET['raw_yaer'];
	$mon_Start = $_GET['mon_Start'];
	$mon_End = $_GET['mon_End'];

	$sql1 =  "'" . $mon_Start . "' ";
	$sql2 =  "'" . $mon_End . "' ";
	$sql3 =  "'" . $raw_yaer . "' ";
	$queryResult=$conn -> query("SELECT SUM(`raw_total_eq`)as raw_data2 FROM tb_raw_materials where `raw_month` >= $sql1 AND `raw_month` <= $sql2 AND `raw_yaer` = $sql3 " );

	$result = array ();

	while ($fetchData = $queryResult->fetch_assoc()) {
		$result[] = $fetchData;
	}

	echo json_encode($result);

?>