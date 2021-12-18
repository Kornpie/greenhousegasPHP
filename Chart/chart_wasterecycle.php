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


$queryResult = $conn->query("SELECT DISTINCT(tb_waste_recycle.waste_month) ,(tb_month.mon_name),
SUM(waste_weight) as sumweight 
    FROM tb_waste_recycle,tb_month where tb_waste_recycle.waste_month = tb_month.mon_id AND tb_waste_recycle.waste_month >= $sql1 AND tb_waste_recycle.waste_month <= $sql2 AND tb_waste_recycle.waste_year = $sql3 
      GROUP BY tb_waste_recycle.waste_month ASC  ");

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

$queryResult2 = $conn->query("SELECT DISTINCT(tb_waste_recycle.waste_month) ,(tb_month.mon_name),
SUM(waste_eq) as sumweight_eq   
    FROM tb_waste_recycle,tb_month where tb_waste_recycle.waste_month = tb_month.mon_id AND tb_waste_recycle.waste_month >= $sql1 AND tb_waste_recycle.waste_month <= $sql2 AND tb_waste_recycle.waste_year = $sql3 
      GROUP BY tb_waste_recycle.waste_month ASC  ");


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

$queryResult3 = $conn->query("SELECT DISTINCT(tb_waste_recycle.waste_month) ,(tb_month.mon_name),
SUM(waste_distance) as sum_dis  
    FROM tb_waste_recycle,tb_month where tb_waste_recycle.waste_month = tb_month.mon_id AND tb_waste_recycle.waste_month >= $sql1 AND tb_waste_recycle.waste_month <= $sql2 AND tb_waste_recycle.waste_year = $sql3 
      GROUP BY tb_waste_recycle.waste_month ASC  ");

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

$queryResult4 = $conn->query("SELECT DISTINCT(tb_waste_recycle.waste_month) ,(tb_month.mon_name),
SUM(waste_distance_eq) as sum_diseq  
    FROM tb_waste_recycle,tb_month where tb_waste_recycle.waste_month = tb_month.mon_id AND tb_waste_recycle.waste_month >= $sql1 AND tb_waste_recycle.waste_month <= $sql2 AND tb_waste_recycle.waste_year = $sql3 
      GROUP BY tb_waste_recycle.waste_month ASC  ");

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
$queryResult5 = $conn->query("SELECT DISTINCT(tb_waste_recycle.waste_month) ,(tb_month.mon_name),
SUM(tb_waste_recycle.waste_total_eq) as sum_total 
    FROM tb_waste_recycle,tb_month where tb_waste_recycle.waste_month = tb_month.mon_id AND tb_waste_recycle.waste_month >= $sql1 AND tb_waste_recycle.waste_month <= $sql2 AND tb_waste_recycle.waste_year = $sql3 
      GROUP BY tb_waste_recycle.waste_month ASC  ");

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
                    text: "กราฟข้อมูลของเสียรีไซเคิล"
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