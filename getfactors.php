<?php 
include 'conn.php';

$nameFac = $_GET['nameFac'];
//$nameFac = "RawEQ";

$queryResult=$conn -> query("SELECT factor_value FROM tb_factors Where factor_name = '".$nameFac."' ");

	$result = array ();

	while ($fetchData = $queryResult->fetch_assoc()) {
		$result[] = $fetchData;
	}
	echo json_encode($result);



?>