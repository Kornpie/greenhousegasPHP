<?php 

	include 'conn.php';
    $comid = $_GET['comid'];
	$monthnow = $_GET['month'];

	$sql1 = "'".$comid."'";

	$queryResult=$conn -> query("SELECT * FROM tb_products 
	where product_company_origin = $sql1 And product_month = $monthnow
	-- join tb_company on tb_raw_materials.raw_company_origin = tb_company.company_id
	ORDER BY `product_id`DESC  " );

	$result = array ();

	while ($fetchData = $queryResult->fetch_assoc()) {
		$result[] = $fetchData;
	}

	echo json_encode($result);
