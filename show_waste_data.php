<?php 

	include 'conn.php';

	$waste_year = $_GET['waste_year'];
	$mon_Start = $_GET['mon_Start'];
	$mon_End = $_GET['mon_End'];

	$sql1 =  "'" . $mon_Start . "' ";
	$sql2 =  "'" . $mon_End . "' ";
	$sql3 =  "'" . $waste_year . "' ";
	$queryResult=$conn -> query("SELECT SUM(`waste_total_eq`)as waste_data2 FROM tb_waste_recycle where `waste_month` >= $sql1 AND `waste_month` <= $sql2 AND `waste_year` = $sql3 " );

	$result = array ();

	while ($fetchData = $queryResult->fetch_assoc()) {
		$result[] = $fetchData;
	}

	echo json_encode($result);

?>