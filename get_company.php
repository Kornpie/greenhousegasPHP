<?php 

	include 'conn.php';

	
	$queryResult=$conn -> query("SELECT * FROM tb_company where status='1'");

	$result = array ();

	while ($fetchData = $queryResult->fetch_assoc()) {
		$result[] = $fetchData;
	}
	echo json_encode($result);

?>