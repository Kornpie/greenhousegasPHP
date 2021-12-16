<?php 
include 'conn.php';

$elec = $_GET['useelec'];
$ng = $_GET['useNg'];
$wt1 = $_GET['useWater1'];// $year = $_GET['year'];
$wt2 = $_GET['useWater2'];
$wt3 = $_GET['useWater3'];

// echo $elec,"<br />" ;
// echo $ng,"<br />" ;
// echo $wt1,"<br />" ;
// echo $wt2,"<br />" ;
// echo $wt3,"<br />" ;


$year = $_GET['year'];
$mon_Start = $_GET['mon_start'];
$mon_End = $_GET['mon_end'];
// $year = "2021";
// $mon_Start = "1";
// $mon_End = "3";

$sql1 =  "'" . $mon_Start . "' ";
$sql2 =  "'" . $mon_End . "' ";
$sql3 =  "'" . $year . "' ";

$queryResult = $conn->query("SELECT
	SUM(`raw_distance_eq`) as sum_diseq_raw ,SUM(`raw_weight_eq`) as sum_weighteq_raw
	FROM `tb_raw_materials` where `raw_month` >= $sql1 AND `raw_month` <= $sql2 AND `raw_yaer` = $sql3 
	ORDER BY raw_month ASC" );

$result = array();

while ($fetchData = $queryResult->fetch_assoc()) {
	$result[] = $fetchData;
}
// echo json_encode($result);

$queryResult1 = $conn->query("SELECT SUM(product_distance_eq) as sum_diseq_pro,SUM(`product_weight_eq`) as sum_weighteq_product
    FROM tb_products where product_month >= $sql1 AND product_month <= $sql2 AND product_year = $sql3 
     ");

$result1 = array();

while ($fetchData = $queryResult1->fetch_assoc()) {
    $result1[] = $fetchData;
}

// echo json_encode($result1);

$queryResult3 = $conn->query("SELECT 

    SUM(waste_distance_eq) as sum_diseq_waste,SUM(`waste_eq`) as sum_weighteq_waste
    FROM tb_waste_recycle where waste_month >= $sql1 AND waste_month <= $sql2 AND waste_year = $sql3 
    ");

$result3 = array();

while ($fetchData = $queryResult3->fetch_assoc()) {
    $result3[] = $fetchData;
}
// echo json_encode($result3);

$queryResult4 = $conn->query("SELECT 
    SUM(lpg_distance_eq) as sum_diseq_lpg,SUM(`lpg_weight_eq`) as sum_weighteq_lpg
    FROM tb_use_lpg where lpg_month >= $sql1 AND lpg_month <= $sql2 AND lpg_year = $sql3 
    ");

$result4 = array();
while ($fetchData = $queryResult4->fetch_assoc()) {
    $result4[] = $fetchData;
}
 //echo json_encode($result4);
$sumResult = $elec + $ng + $wt1 +$wt2 +$wt3 +$result[0]['sum_weighteq_raw'] +
$result1[0]['sum_weighteq_product']+$result3[0]['sum_weighteq_waste']+$result4[0]['sum_weighteq_lpg'];

$dataPoints = array(
	array("label"=> "วัตถุดิบ({$result[0]['sum_diseq_raw']})", "y"=> $result[0]['sum_diseq_raw']),
	array("label"=> "สินค้า({$result1[0]['sum_diseq_pro']})", "y"=> $result1[0]['sum_diseq_pro']),
	array("label"=> "ของเสียรีไซเคิล({$result3[0]['sum_diseq_waste']})", "y"=> $result3[0]['sum_diseq_waste']),
	array("label"=> "การใช้ LPG ({$result4[0]['sum_diseq_lpg']})", "y"=> $result4[0]['sum_diseq_lpg']),
	array("label"=> "ส่วนต่าง({$sumResult})", "y"=> $sumResult),
	// array("label"=> "Travel Insurance", "y"=> 126)
);
?>

<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	title:{
		text: "กราฟประเมินค่าคาร์บอนฟุตพริ้นท์จากระยะทาง"
	},
	subtitles: [{
		text: ""
	}],
	data: [{
		type: "pie",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - #percent%",
		yValueFormatString: "฿#,##0",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<center>
<p style="font-size: 16px;">
<?php
echo "น้ำหนัก EQ ของวัตถุดิบ = " ,$result[0]['sum_weighteq_raw'] ,"<br>";
echo "น้ำหนัก EQ ของสินค้า = " ,$result1[0]['sum_weighteq_product'] ,"<br>";
echo "น้ำหนัก EQ ของของเสียรีไซเคิล = " ,$result3[0]['sum_weighteq_waste'] ,"<br>";
echo "น้ำหนัก EQ ของ LPG = " ,$result4[0]['sum_weighteq_lpg'] ,"<br>";
echo "ผลรวมของการใช้ไฟฟ้า = " ,$elec ,"<br>";
echo "ผลรวมของการใช้ NG = " ,$ng ,"<br>";
echo "ผลรวมของการใช้น้ำประปานิคม = " ,$wt1 ,"<br>";
echo "ผลรวมของการใช้น้ำประปาอ่อน = " ,$wt2 ,"<br>";
echo "ผลรวมของการใช้น้ำ RO = " ,$wt3 ,"<br>";
?>
</p>
<p style="font-size: 16px; color:red;">
<?php
 echo "ผลรวมที่ไม่รวมระยะทาง EQ = " ,$sumResult ,"<br>"; 
?></p>
</center>
</body>
</html>