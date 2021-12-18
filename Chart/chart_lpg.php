<?php
include 'conn.php';

$lpg_year = $_GET['year'];
$mon_Start = $_GET['mon_start'];
$mon_End = $_GET['mon_end'];
// $lpg_name = $_GET['lpg_name'];

// $lpg_year = 2021;
// $mon_Start = 1;
// $mon_End = 12;

$lpg_name = "การใช้LPG";

$sql1 =  "'" . $mon_Start . "' ";
$sql2 =  "'" . $mon_End . "' ";
$sql3 =  "'" . $lpg_year . "' ";
$sql4 =  "'" . $lpg_name . "' ";
$queryResult=$conn -> query("SELECT
tb_use_lpg.lpg_month,
tb_use_lpg.lpg_weight,
tb_use_lpg.lpg_weight_eq,
tb_use_lpg.lpg_distance,
tb_use_lpg.lpg_distance_eq,
tb_use_lpg.lpg_total_eq,
tb_month.mon_name
FROM
tb_use_lpg,tb_month
WHERE
 tb_use_lpg.lpg_month = tb_month.mon_id AND tb_use_lpg.lpg_month >= $sql1 AND tb_use_lpg.lpg_month <= $sql2 AND tb_use_lpg.lpg_year = $sql3
ORDER BY
tb_use_lpg.lpg_month ASC " );

$data1["data"] = array();
while ($row = mysqli_fetch_array($queryResult)) {
    array_push(
        $data1["data"],
        array(
            "label" => $row["mon_name"],
            "y" => $row["lpg_weight"]
        )
    );
}


$queryResult2=$conn -> query("SELECT
tb_use_lpg.lpg_month,
tb_use_lpg.lpg_weight,
tb_use_lpg.lpg_weight_eq,
tb_use_lpg.lpg_distance,
tb_use_lpg.lpg_distance_eq,
tb_use_lpg.lpg_total_eq,
tb_month.mon_name
FROM
tb_use_lpg,tb_month
WHERE
 tb_use_lpg.lpg_month = tb_month.mon_id AND tb_use_lpg.lpg_month >= $sql1 AND tb_use_lpg.lpg_month <= $sql2 AND tb_use_lpg.lpg_year = $sql3
ORDER BY
tb_use_lpg.lpg_month ASC " );

$data2["data"] = array();
while ($row = mysqli_fetch_array($queryResult2)) {
    array_push(
        $data2["data"],
        array(
            "label" => $row["mon_name"],
            "y" => $row["lpg_weight_eq"]
        )
    );
}
$queryResult3=$conn -> query("SELECT
tb_use_lpg.lpg_month,
tb_use_lpg.lpg_weight,
tb_use_lpg.lpg_weight_eq,
tb_use_lpg.lpg_distance,
tb_use_lpg.lpg_distance_eq,
tb_use_lpg.lpg_total_eq,
tb_month.mon_name
FROM
tb_use_lpg,tb_month
WHERE
 tb_use_lpg.lpg_month = tb_month.mon_id AND tb_use_lpg.lpg_month >= $sql1 AND tb_use_lpg.lpg_month <= $sql2 AND tb_use_lpg.lpg_year = $sql3
ORDER BY
tb_use_lpg.lpg_month ASC  " );

$data3["data"] = array();
while ($row = mysqli_fetch_array($queryResult3)) {
    array_push(
        $data3["data"],
        array(
            "label" => $row["mon_name"],
            "y" => $row["lpg_distance"]
        )
    );
}

$queryResult4=$conn -> query("SELECT
tb_use_lpg.lpg_month,
tb_use_lpg.lpg_weight,
tb_use_lpg.lpg_weight_eq,
tb_use_lpg.lpg_distance,
tb_use_lpg.lpg_distance_eq,
tb_use_lpg.lpg_total_eq,
tb_month.mon_name
FROM
tb_use_lpg,tb_month
WHERE
 tb_use_lpg.lpg_month = tb_month.mon_id AND tb_use_lpg.lpg_month >= $sql1 AND tb_use_lpg.lpg_month <= $sql2 AND tb_use_lpg.lpg_year = $sql3
ORDER BY
tb_use_lpg.lpg_month ASC " );

$data4["data"] = array();
while ($row = mysqli_fetch_array($queryResult4)) {
    array_push(
        $data4["data"],
        array(
            "label" => $row["mon_name"],
            "y" => $row["lpg_distance_eq"]
        )
    );
}
$queryResult5=$conn -> query("SELECT
tb_use_lpg.lpg_month,
tb_use_lpg.lpg_weight,
tb_use_lpg.lpg_weight_eq,
tb_use_lpg.lpg_distance,
tb_use_lpg.lpg_distance_eq,
tb_use_lpg.lpg_total_eq,
tb_month.mon_name
FROM
tb_use_lpg,tb_month
WHERE
 tb_use_lpg.lpg_month = tb_month.mon_id AND tb_use_lpg.lpg_month >= $sql1 AND tb_use_lpg.lpg_month <= $sql2 AND tb_use_lpg.lpg_year = $sql3
ORDER BY
tb_use_lpg.lpg_month ASC  " );

$data5["data"] = array();
while ($row = mysqli_fetch_array($queryResult5)) {
    array_push(
        $data5["data"],
        array(
            "label" => $row["mon_name"],
            "y" => $row["lpg_total_eq"]
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