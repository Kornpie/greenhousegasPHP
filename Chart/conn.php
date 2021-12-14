<?php
    $conn = mysqli_connect("localhost","root","","db_emissions");
    if(!$conn){
        echo"Error!";
    }
    else{
        echo "connect Success";
    }
?>