<?php
 
$raw_data = $_GET['raw_data'];
$product_data = $_GET['product_data'];
$waste_data = $_GET['waste_data'];
$elec_data = $_GET['elec_data'];
$lpg_data = $_GET['lpg_data'];
$ng_data = $_GET['ng_data'];
$water_data = $_GET['water_data'];


$dataPoints = array(
	array("label"=> "วัตถุดิบ", "y"=> $raw_data),
	array("label"=> "สินค้า", "y"=> $product_data),
	array("label"=> "ของเสียรีไซเคิล", "y"=> $waste_data),
	array("label"=> "การใช้ไฟฟ้า", "y"=> $elec_data),
	array("label"=> "การใช้ LPG", "y"=> $lpg_data),
	array("label"=> "การใช้ NG", "y"=> $ng_data),
	array("label"=> "การใช้น้ำประปา", "y"=> $water_data),
	array("label"=> "มลพิษสิ่งแวดล้อม", "y"=> 0),
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
		text: "กราฟประเมินค่าคาร์บอนฟุตพริ้นท์ทั้งหมด"
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
</body>
</html>