<?php
isset($_POST['submit']);
    require('conn.php');
        $sql = "UPDATE tb_factors Set factor_value =:factor_value
        where factor_id=:factor_id";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':factor_id', $_POST['factor_id']);
$stmt->bindParam(':factor_value', $_POST['factor_value']);


if( $stmt->execute()):
$message = 'Successfully add new customer';
header('location: emision.php');
 else:
    $message = 'Fail to add new customer';
endif;
$conn = null;
?>