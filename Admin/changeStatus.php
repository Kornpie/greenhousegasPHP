<?php
isset($_POST['submit']);
    require('conn.php');
        $sql = "UPDATE tb_users Set user_status =:user_status
        where user_id=:user_id";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $_POST['user_id']);
$stmt->bindParam(':user_status', $_POST['user_status']);


if( $stmt->execute()):
$message = 'Successfully add new customer';
header('location: index.php');
 else:
    $message = 'Fail to add new customer';
endif;
$conn = null;
?>