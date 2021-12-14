<?php
include 'conn.php';

$lpg_year = $_GET['year'];
$mon_Start = $_GET['mon_start'];
$mon_End = $_GET['mon_end'];
// $eg_name = $_GET['eg_name'];

// $lpg_year = 2021;
// $mon_Start = 1;
// $mon_End = 12;

$eg_name = "การใช้LPG";

$sql1 =  "'" . $mon_Start . "' ";
$sql2 =  "'" . $mon_End . "' ";
$sql3 =  "'" . $lpg_year . "' ";
$sql4 =  "'" . $eg_name . "' ";
$queryResult=$conn -> query("SELECT `lpg_month`, `lpg_weight`, `lpg_weight_eq`, `lpg_distance`, `lpg_distance_eq`, `lpg_total_eq` FROM tb_use_lpg where `lpg_month` >= $sql1 AND `lpg_month` <= $sql2 AND `lpg_year` = $sql3 
	  ORDER BY `lpg_month` ASC " );

$data1["data"] = array();
while ($row = mysqli_fetch_array($queryResult)) {
    array_push(
        $data1["data"],
        array(
            "label" => $row["lpg_month"],
            "y" => $row["lpg_weight"]
        )
    );
}


$queryResult2=$conn -> query("SELECT `lpg_month`, `lpg_weight`, `lpg_weight_eq`, `lpg_distance`, `lpg_distance_eq`, `lpg_total_eq` FROM tb_use_lpg where `lpg_month` >= $sql1 AND `lpg_month` <= $sql2 AND `lpg_year` = $sql3 
	  ORDER BY `lpg_month` ASC " );

$data2["data"] = array();
while ($row = mysqli_fetch_array($queryResult2)) {
    array_push(
        $data2["data"],
        array(
            "label" => $row["lpg_month"],
            "y" => $row["lpg_weight_eq"]
        )
    );
}
$queryResult3=$conn -> query("SELECT `lpg_month`, `lpg_weight`, `lpg_weight_eq`, `lpg_distance`, `lpg_distance_eq`, `lpg_total_eq` FROM tb_use_lpg where `lpg_month` >= $sql1 AND `lpg_month` <= $sql2 AND `lpg_year` = $sql3 
	  ORDER BY `lpg_month` ASC " );

$data3["data"] = array();
while ($row = mysqli_fetch_array($queryResult3)) {
    array_push(
        $data3["data"],
        array(
            "label" => $row["lpg_month"],
            "y" => $row["lpg_distance"]
        )
    );
}

$queryResult4=$conn -> query("SELECT `lpg_month`, `lpg_weight`, `lpg_weight_eq`, `lpg_distance`, `lpg_distance_eq`, `lpg_total_eq` FROM tb_use_lpg where `lpg_month` >= $sql1 AND `lpg_month` <= $sql2 AND `lpg_year` = $sql3 
	  ORDER BY `lpg_month` ASC " );

$data4["data"] = array();
while ($row = mysqli_fetch_array($queryResult4)) {
    array_push(
        $data4["data"],
        array(
            "label" => $row["lpg_month"],
            "y" => $row["lpg_distance_eq"]
        )
    );
}
$queryResult5=$conn -> query("SELECT `lpg_month`, `lpg_weight`, `lpg_weight_eq`, `lpg_distance`, `lpg_distance_eq`, `lpg_total_eq` FROM tb_use_lpg where `lpg_month` >= $sql1 AND `lpg_month` <= $sql2 AND `lpg_year` = $sql3 
	  ORDER BY `lpg_month` ASC " );

$data5["data"] = array();
while ($row = mysqli_fetch_array($queryResult5)) {
    array_push(
        $data5["data"],
        array(
            "label" => $row["lpg_month"],
            "y" => $row["lpg_total_eq"]
        )
    );
}

// $result = array();

// while ($fetchData = $queryResult->fetch_assoc()) {
// 	$result[] = $fetchData;
// }
// echo json_encode($result);

// while($row = mysqli_fetch_array($queryResult)) {
// echo $row['eg_month'];
// echo $row['sum_diseq']," ffff";
// }

// format data structure
// $data = array();
// $i = 0;
// while($row = mysqli_fetch_array($queryResult)) {
//     $i += 1;
//     array_push($data, array($i) + $row);
//     echo json_encode($data);
//     $dataPoints1 = array(
//         array("label" => $data['eg_month'], "y" =>$data['sumweight']),
//         // array("label" => "กุมภาพัน", "y" => 34.87),
//         // array("label" => "มีนาคม", "y" => 40.30),
//         // array("label" => "เมษายน", "y" => 35.30),
//         // array("label" => "พฤษภาคม", "y" => 39.50),
//         // array("label" => "มิถุนายน", "y" => 50.82),
//         // array("label" => "กรกฎาคม", "y" => 74.70)
//     );
// }

// convert to JavaScript


// $dataPoints1 = 
//  array(
//     array("label" => "มกราคม", "y" => 36.12),
//     array("label" => "กุมภาพัน", "y" => 34.87),
//     array("label" => "มีนาคม", "y" => 40.30),
//     array("label" => "เมษายน", "y" => 35.30),
//     array("label" => "พฤษภาคม", "y" => 39.50),
//     array("label" => "มิถุนายน", "y" => 50.82),
//     array("label" => "กรกฎาคม", "y" => 74.70)
// );

// $dataPoints2 = array(
//     array("label" => "มกราคม", "y" => 64.61),
//     array("label" => "กุมภาพัน", "y" => 70.55),
//     array("label" => "มีนาคม", "y" => 72.50),
//     array("label" => "เมษายน", "y" => 81.30),
//     array("label" => "พฤษภาคม", "y" => 63.60),
//     array("label" => "มิถุนายน", "y" => 69.38),
//     array("label" => "กรกฎาคม", "y" => 1198.70)
// );
// $dataPoints3 = array(
//     array("label" => "มกราคม", "y" => 64.61),
//     array("label" => "กุมภาพัน", "y" => 70.55),
//     array("label" => "มีนาคม", "y" => 72.50),
//     array("label" => "เมษายน", "y" => 81.30),
//     array("label" => "พฤษภาคม", "y" => 63.60),
//     array("label" => "มิถุนายน", "y" => 69.38),
//     array("label" => "กรกฎาคม", "y" => 98.70)
// );
// $dataPoints4 = array(
//     array("label" => "มกราคม", "y" => 64.61),
//     array("label" => "กุมภาพัน", "y" => 70.55),
//     array("label" => "มีนาคม", "y" => 72.50),
//     array("label" => "เมษายน", "y" => 81.30),
//     array("label" => "พฤษภาคม", "y" => 63.60),
//     array("label" => "มิถุนายน", "y" => 69.38),
//     array("label" => "กรกฎาคม", "y" => 98.70)
// );
// $dataPoints5 = array(
//     array("label" => "มกราคม", "y" => 64.61),
//     array("label" => "กุมภาพัน", "y" => 70.55),
//     array("label" => "มีนาคม", "y" => 72.50),
//     array("label" => "เมษายน", "y" => 81.30),
//     array("label" => "พฤษภาคม", "y" => 63.60),
//     array("label" => "มิถุนายน", "y" => 69.38),
//     array("label" => "กรกฎาคม", "y" => 98.70)
// );


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
                    text: "กราฟข้อมูลการใช้LPG"
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
                        name: "ใช้LPG",
                        indexLabel: "{y}",
                        showInLegend: true,
                        dataPoints: <?php echo json_encode($data1["data"], JSON_NUMERIC_CHECK); ?>
                    }, {
                        type: "column",
                        name: "ใช้LPG EQ",
                        indexLabel: "{y}",
                        showInLegend: true,
                        dataPoints: <?php echo json_encode($data2['data'], JSON_NUMERIC_CHECK); ?>
                    },
                    {
                        type: "column",
                        name: "Distance",
                        indexLabel: "{y}",
                        showInLegend: true,
                        dataPoints: <?php echo json_encode($data3["data"], JSON_NUMERIC_CHECK); ?>
                    },
                    {
                        type: "column",
                        name: "Distance EQ",
                        indexLabel: "{y}",
                        showInLegend: true,
                        dataPoints: <?php echo json_encode($data4["data"], JSON_NUMERIC_CHECK); ?>
                    },
                    {
                        type: "column",
                        name: "Total",
                        indexLabel: "{y}",
                        showInLegend: true,
                        dataPoints: <?php echo json_encode($data5["data"], JSON_NUMERIC_CHECK); ?>
                    }
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