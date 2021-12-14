<?php 

	include 'conn.php';

	$queryResult=$conn -> query("SELECT DISTINCT product_company_origin FROM tb_products" );

	$result = array ();

	while ($fetchData = $queryResult->fetch_assoc()) {
		$result[] = $fetchData;
	}

	echo json_encode($result);

?>