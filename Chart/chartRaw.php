<?php
include 'conn.php';

$mon_start = $_GET['mon_start'];
$mon_end = $_GET['mon_end'];
$year = $_GET['year'];
$comid = $_GET['comid'];
// $mon_start = 1;
// $mon_end = 8;
// $year = 2021;
// $comid = 1;

$sql1 =  "'".$mon_start."'";
$sql2 =   "'".$mon_end."'";
// $sql2 =  "10";
$sql3 =  "'".$year."'";
$sql4 =  "'".$comid."'";
$queryResult = $conn->query("SELECT DISTINCT
(tb_raw_materials.raw_month),
SUM(tb_raw_materials.raw_weight) AS sumweight,
SUM(tb_raw_materials.raw_weight_eq) AS sumweight_eq,
SUM(tb_raw_materials.raw_distance) AS sum_dis,
SUM(tb_raw_materials.raw_distance_eq) AS sum_diseq,
SUM(tb_raw_materials.raw_total_eq) AS sum_total,
tb_month.mon_name
FROM
tb_raw_materials,tb_month
WHERE
tb_raw_materials.raw_month =  tb_month.mon_id AND tb_raw_materials.raw_month >= $sql1 AND tb_raw_materials.raw_month <= $sql2 AND tb_raw_materials.raw_yaer = $sql3 AND tb_raw_materials.raw_company_origin = $sql4
GROUP BY
tb_raw_materials.raw_month
ORDER BY
tb_raw_materials.raw_month ASC");
$data1["data"] = array();
while ($row = mysqli_fetch_array($queryResult)) {
    array_push(
        $data1["data"],
        array(
            "label" => $row["mon_name"],
            "y" => $row["sumweight"]
        )
    );
}

$queryResult2 = $conn->query("SELECT DISTINCT
(tb_raw_materials.raw_month),
SUM(tb_raw_materials.raw_weight) AS sumweight,
SUM(tb_raw_materials.raw_weight_eq) AS sumweight_eq,
SUM(tb_raw_materials.raw_distance) AS sum_dis,
SUM(tb_raw_materials.raw_distance_eq) AS sum_diseq,
SUM(tb_raw_materials.raw_total_eq) AS sum_total,
tb_month.mon_name
FROM
tb_raw_materials,tb_month
WHERE
tb_raw_materials.raw_month =  tb_month.mon_id AND tb_raw_materials.raw_month >= $sql1 AND tb_raw_materials.raw_month <= $sql2 AND tb_raw_materials.raw_yaer = $sql3 AND tb_raw_materials.raw_company_origin = $sql4
GROUP BY
tb_raw_materials.raw_month
ORDER BY
tb_raw_materials.raw_month ASC");

$data2["data"] = array();
while ($row = mysqli_fetch_array($queryResult2)) {
    array_push(
        $data2["data"],
        array(
            "label" => $row["mon_name"],
            "y" => $row["sumweight_eq"]
        )
    );
}

$queryResult3 = $conn->query("SELECT DISTINCT
(tb_raw_materials.raw_month),
SUM(tb_raw_materials.raw_weight) AS sumweight,
SUM(tb_raw_materials.raw_weight_eq) AS sumweight_eq,
SUM(tb_raw_materials.raw_distance) AS sum_dis,
SUM(tb_raw_materials.raw_distance_eq) AS sum_diseq,
SUM(tb_raw_materials.raw_total_eq) AS sum_total,
tb_month.mon_name
FROM
tb_raw_materials,tb_month
WHERE
tb_raw_materials.raw_month =  tb_month.mon_id AND tb_raw_materials.raw_month >= $sql1 AND tb_raw_materials.raw_month <= $sql2 AND tb_raw_materials.raw_yaer = $sql3 AND tb_raw_materials.raw_company_origin = $sql4
GROUP BY
tb_raw_materials.raw_month
ORDER BY
tb_raw_materials.raw_month ASC");

$data3["data"] = array();
while ($row = mysqli_fetch_array($queryResult3)) {
    array_push(
        $data3["data"],
        array(
            "label" => $row["mon_name"],
            "y" => $row["sum_dis"]
        )
    );
}

$queryResult4 = $conn->query("SELECT DISTINCT
(tb_raw_materials.raw_month),
SUM(tb_raw_materials.raw_weight) AS sumweight,
SUM(tb_raw_materials.raw_weight_eq) AS sumweight_eq,
SUM(tb_raw_materials.raw_distance) AS sum_dis,
SUM(tb_raw_materials.raw_distance_eq) AS sum_diseq,
SUM(tb_raw_materials.raw_total_eq) AS sum_total,
tb_month.mon_name
FROM
tb_raw_materials,tb_month
WHERE
tb_raw_materials.raw_month =  tb_month.mon_id AND tb_raw_materials.raw_month >= $sql1 AND tb_raw_materials.raw_month <= $sql2 AND tb_raw_materials.raw_yaer = $sql3 AND tb_raw_materials.raw_company_origin = $sql4
GROUP BY
tb_raw_materials.raw_month
ORDER BY
tb_raw_materials.raw_month ASC");

$data4["data"] = array();
while ($row = mysqli_fetch_array($queryResult4)) {
    array_push(
        $data4["data"],
        array(
            "label" => $row["mon_name"],
            "y" => $row["sum_diseq"]
        )
    );
}
$queryResult5 = $conn->query("SELECT DISTINCT
(tb_raw_materials.raw_month),
SUM(tb_raw_materials.raw_weight) AS sumweight,
SUM(tb_raw_materials.raw_weight_eq) AS sumweight_eq,
SUM(tb_raw_materials.raw_distance) AS sum_dis,
SUM(tb_raw_materials.raw_distance_eq) AS sum_diseq,
SUM(tb_raw_materials.raw_total_eq) AS sum_total,
tb_month.mon_name
FROM
tb_raw_materials,tb_month
WHERE
tb_raw_materials.raw_month =  tb_month.mon_id AND tb_raw_materials.raw_month >= $sql1 AND tb_raw_materials.raw_month <= $sql2 AND tb_raw_materials.raw_yaer = $sql3 AND tb_raw_materials.raw_company_origin = $sql4
GROUP BY
tb_raw_materials.raw_month
ORDER BY
tb_raw_materials.raw_month ASC");

$data5["data"] = array();
while ($row = mysqli_fetch_array($queryResult5)) {
    array_push(
        $data5["data"],
        array(
            "label" => $row["mon_name"],
            "y" => $row["sum_total"]
        )
    );
}
// $result = array();

// while ($fetchData = $queryResult->fetch_assoc()) {
// 	$result[] = $fetchData;
// }
// echo json_encode($result);

// while($row = mysqli_fetch_array($queryResult)) {
// echo $row['raw_month'];
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
//         array("label" => $data['raw_month'], "y" =>$data['sumweight']),
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
                    text: "กราฟข้อมูลวัตถุดิบ"
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
                        name: "น้ำหนัก",
                        indexLabel: "{y}",
                        showInLegend: true,
                        dataPoints: <?php echo json_encode($data1["data"], JSON_NUMERIC_CHECK); ?>
                    }, {
                        type: "column",
                        name: "น้ำหนักEQ",
                        indexLabel: "{y}",
                        showInLegend: true,
                        dataPoints: <?php echo json_encode($data2['data'], JSON_NUMERIC_CHECK); ?>
                    },
                    {
                        type: "column",
                        name: "ระยะทางEQ",
                        indexLabel: "{y}",
                        showInLegend: true,
                        dataPoints: <?php echo json_encode($data3["data"], JSON_NUMERIC_CHECK); ?>
                    },
                    {
                        type: "column",
                        name: "ระยะทาง",
                        indexLabel: "{y}",
                        showInLegend: true,
                        dataPoints: <?php echo json_encode($data4["data"], JSON_NUMERIC_CHECK); ?>
                    },
                    {
                        type: "column",
                        name: "ผลรวม",
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