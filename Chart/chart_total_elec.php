<?php
include 'conn.php';

$year = $_GET['year'];
$mon_Start = $_GET['mon_start'];
$mon_End = $_GET['mon_end'];

// $year = 2021;
// $mon_Start = 1;
// $mon_End = 12;

$eg_name = "การใช้ไฟฟ้า";

$sql1 =  "'" . $mon_Start . "' ";
$sql2 =  "'" . $mon_End . "' ";
$sql3 =  "'" . $year . "' ";
$sql4 =  "'" . $eg_name . "' ";


$queryResult2 = $conn->query("SELECT DISTINCT (tb_energy_touse.eg_month),(tb_energy_touse.eg_unit_eq), (tb_month.mon_name) FROM tb_energy_touse, tb_month WHERE tb_energy_touse.eg_month = tb_month.mon_id AND tb_energy_touse.eg_month >= $sql1 AND tb_energy_touse.eg_month <= $sql2 AND tb_energy_touse.eg_year = $sql3 AND tb_energy_touse.eg_name = $sql4 ORDER BY tb_energy_touse.eg_month ASC ");

$data2["data"] = array();
while ($row = mysqli_fetch_array($queryResult2)) {
    array_push(
        $data2["data"],
        array(
            "label" => $row["mon_name"],
            "y" => $row["eg_unit_eq"]
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
                        name: "ใช้ไฟฟ้าEQ",
                        indexLabel: "{y}",
                        showInLegend: false,
                        dataPoints: <?php echo json_encode($data2['data'], JSON_NUMERIC_CHECK); ?>
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