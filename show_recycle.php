<?php 

	// include 'conn.php';

	// $queryResult=$conn -> query("SELECT  DISTINCT waste_company_destination FROM tb_waste_recycle");

	// $result = array ();

	// while ($fetchData = $queryResult->fetch_assoc()) {
	// 	$result[] = $fetchData;
	// }

	// echo json_encode($result);


	include 'conn.php';

	$queryResult=$conn -> query("SELECT DISTINCT waste_company_destination ,waste_name,company_name FROM tb_waste_recycle 
	join tb_company on tb_waste_recycle.waste_company_destination = tb_company.company_id  GROUP BY waste_company_destination" );

	$result = array ();

	while ($fetchData = $queryResult->fetch_assoc()) {
		$result[] = $fetchData;
	}

	echo json_encode($result);

?>