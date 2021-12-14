<?php
    include('conn.php');
    $email=$_POST['email'];
    $password=$_POST['password'];

    $sql = "SELECT * from tb_users where user_email='$email' AND user_password='$password'";
    $result=$conn->query($sql);
    $resultt = array();
    if($result->num_rows>0){

        while($row=mysqli_fetch_assoc($result)){
            $resultt[]=$row;
        }
        echo json_encode($resultt);
    }
    else
    {
        echo json_encode("Error");
    }
?>