<?php 

	include 'conn.php';

	$queryResult=$conn -> query("SELECT DISTINCT water_cubic FROM tb_use_waters" );

	$result = array ();

	while ($fetchData = $queryResult->fetch_assoc()) {
		$result[] = $fetchData;
	}

	echo json_encode($result);

?>