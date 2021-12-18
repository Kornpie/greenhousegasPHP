<?php
include 'conn.php';



$water_year = $_GET['water_year'];
	$mon_Start = $_GET['mon_Start'];
	$mon_End = $_GET['mon_End'];
	
	// $water_year = 2021;
	// $mon_Start = 1;
	// $mon_End = 12;
$water_name = "การใช้น้ำประปานิคมฯ";

	$sql1 =  "'" . $mon_Start . "' ";
	$sql2 =  "'" . $mon_End . "' ";
	$sql3 =  "'" . $water_year . "' ";
	$sql4 =  "'" . $water_name . "' ";
	

	$queryResult2=$conn -> query("SELECT tb_use_waters.water_month, tb_use_waters.water_cubic, tb_use_waters.water_cubic_eq, tb_use_waters.water_name, tb_month.mon_name 
    FROM tb_use_waters, tb_month 
    WHERE tb_use_waters.water_month = tb_month.mon_id AND tb_use_waters.water_month >= $sql1 AND tb_use_waters.water_month <= $sql2 AND tb_use_waters.water_year = $sql3 AND tb_use_waters.water_name = $sql4
     ORDER BY tb_use_waters.water_month ASC " );


$data2["data"] = array();
while ($row = mysqli_fetch_array($queryResult2)) {
    array_push(
        $data2["data"],
        array(
            "label" => $row["mon_name"],
            "y" => $row["water_cubic_eq"]
        )
    );
}

$queryResult3=$conn -> query("SELECT tb_use_waters.water_month, tb_use_waters.water_cubic, tb_use_waters.water_cubic_eq, tb_use_waters.water_name, tb_month.mon_name 
    FROM tb_use_waters, tb_month 
    WHERE tb_use_waters.water_month = tb_month.mon_id AND tb_use_waters.water_month >= $sql1 AND tb_use_waters.water_month <= $sql2 AND tb_use_waters.water_year = $sql3 AND tb_use_waters.water_name = $sql4
     ORDER BY tb_use_waters.water_month ASC " );


$data3["data"] = array();
while ($row = mysqli_fetch_array($queryResult3)) {
    array_push(
        $data3["data"],
        array(
            "label" => $row["mon_name"],
            "y" => $row["water_cubic"]
        )
    );
}

?>
<!DOCTYPE HTML>
<html>

<head>
    <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "กราฟแสดงข้อมูลการใช้พลังงานประจำเดือน"
                },
                axisY: {
                    includeZero: true
                },
                legend: {
                    cursor: "pointer",
                    verticalAlign: "center",
                    horizontalAlign: "right",
                    itemclick: toggleDataSeries
                },

                data: [{
                        type: "column",
                        name: "การใช้น้ำประปานิคมฯ",
                        indexLabel: "{y}",
                        showInLegend: true,
                        dataPoints: <?php echo json_encode($data2['data'], JSON_NUMERIC_CHECK); ?>
                    },
                    {
                        type: "column",
                        name: "การใช้น้ำประปานิคมฯEQ",
                        indexLabel: "{y}",
                        showInLegend: true,
                        dataPoints: <?php echo json_encode($data3['data'], JSON_NUMERIC_CHECK); ?>
                    },
                    
                ]
            });
            chart.render();

            function toggleDataSeries(e) {
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                } else {
                    e.dataSeries.visible = true;
                }
                chart.render();
            }

        }
    </script>
</head>

<body>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>

</html>