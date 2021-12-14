<?php 

	include 'conn.php';

	$queryResult=$conn -> query("SELECT DISTINCT raw_company_origin ,raw_name,company_name FROM tb_raw_materials 
	join tb_company on tb_raw_materials.raw_company_origin = tb_company.company_id  GROUP BY raw_company_origin" );

	$result = array ();

	while ($fetchData = $queryResult->fetch_assoc()) {
		$result[] = $fetchData;
	}

	echo json_encode($result);

?>