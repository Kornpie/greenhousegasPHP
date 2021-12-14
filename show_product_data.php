<?php 

	include 'conn.php';

	$product_year = $_GET['product_year'];
	$mon_Start = $_GET['mon_Start'];
	$mon_End = $_GET['mon_End'];

	$sql1 =  "'" . $mon_Start . "' ";
	$sql2 =  "'" . $mon_End . "' ";
	$sql3 =  "'" . $product_year . "' ";
	$queryResult=$conn -> query("SELECT SUM(`product_total_eq`)as product_data2 FROM tb_products where `product_month` >= $sql1 AND `product_month` <= $sql2 AND `product_year` = $sql3 " );

	$result = array ();

	while ($fetchData = $queryResult->fetch_assoc()) {
		$result[] = $fetchData;
	}

	echo json_encode($result);

?> 