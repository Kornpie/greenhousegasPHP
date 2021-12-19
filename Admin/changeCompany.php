<?php
isset($_POST['submit']);
    require('conn.php');
        $sql = "UPDATE tb_company Set status =:status
        where company_id=:company_id";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':company_id', $_POST['company_id']);
$stmt->bindParam(':status', $_POST['status']);


if( $stmt->execute()):
$message = 'Successfully add new customer';
header('location: approve.php');
 else:
    $message = 'Fail to add new customer';
endif;
$conn = null;
?>