<?php 

	include 'conn.php';

	$queryResult=$conn -> query("SELECT DISTINCT lpg_company_origin ,lpg_name,company_name FROM tb_use_lpg 
	join tb_company on tb_use_lpg.lpg_company_origin = tb_company.company_id  GROUP BY lpg_company_origin" );

	$result = array ();

	while ($fetchData = $queryResult->fetch_assoc()) {
		$result[] = $fetchData;
	}

	echo json_encode($result);

?>