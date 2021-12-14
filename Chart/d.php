<?php

 include 'conn.php';
 
 
 $sql1 =  "4 ";
 $sql2 =  "10 ";
 // $sql2 =  "10";
 $sql3 =  "2021 ";
 $sql4 =  "1";
 $queryResult = $conn->query("SELECT DISTINCT(`raw_month`) ,
 SUM(`raw_weight`) as sumweight ,SUM(`raw_weight_eq`) as sumweight_eq ,SUM(`raw_distance`) as sum_dis  ,
     SUM(`raw_distance_eq`) as sum_diseq  ,SUM(`raw_total_eq`) as sum_total 
     FROM `tb_raw_materials` where `raw_month` >= $sql1 AND `raw_month` <= $sql2 AND `raw_yaer` = $sql3 
      AND `raw_company_origin` = $sql4  GROUP BY `raw_month` ORDER BY raw_month ASC" );

while($row = mysqli_fetch_array($queryResult)) {
    array_push($data1["data"], array(
      "label" => $row["raw_month"],
      "value" => $row["sumweight_eq"]
      )
    );
  }
// while($row = mysqli_fetch_array($queryResult)) {

// }
// $dataPoints = array(
// 	array("x"=> 10, "y"=> 41),
// 	array("x"=> 20, "y"=> 35, "indexLabel"=> "Lowest"),
// 	array("x"=> 30, "y"=> 50),
// 	array("x"=> 40, "y"=> 45),
// 	array("x"=> 50, "y"=> 52),
// 	array("x"=> 60, "y"=> 68),
// 	array("x"=> 70, "y"=> 38),
// 	array("x"=> 80, "y"=> 71, "indexLabel"=> "Highest"),
// 	array("x"=> 90, "y"=> 52),
// 	array("x"=> 100, "y"=> 60),
// 	array("x"=> 110, "y"=> 36),
// 	array("x"=> 120, "y"=> 49),
// 	array("x"=> 130, "y"=> 41)
// );
	
?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Simple Column Chart with Index Labels"
	},
	axisY:{
		includeZero: true
	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",   
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