<?php 

	include 'conn.php';

	$eg_year = $_GET['eg_year'];
	$mon_Start = $_GET['mon_Start'];
	$mon_End = $_GET['mon_End'];
	// $eg_name = $_GET['eg_name'];
	// $eg_year = 2021;
	// $mon_Start = 1;
	// $mon_End = 5;
	$eg_name = "การใช้ไฟฟ้า";

	$sql1 =  "'" . $mon_Start . "' ";
	$sql2 =  "'" . $mon_End . "' ";
	$sql3 =  "'" . $eg_year . "' ";
	$sql4 =  "'" . $eg_name . "' ";
	$queryResult=$conn -> query("SELECT * FROM tb_energy_touse where `eg_month` >= $sql1 AND `eg_month` <= $sql2 AND `eg_year` = $sql3 
	 AND `eg_name` = $sql4 ORDER BY `eg_month` ASC " );

	$result = array ();

	while ($fetchData = $queryResult->fetch_assoc()) {
		$result[] = $fetchData;
	}

	echo json_encode($result);

?>