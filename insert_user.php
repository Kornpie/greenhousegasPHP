<?php 

    include 'conn.php';

    $fullname = $_POST['fullname'];
    $companyname = $_POST['companyname'];
    $email = $_POST['email'];
    $taxpayer = $_POST['taxpayer'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type'];
    $company_id = $_POST['company_id'];


	if($user_type == '4'){
        
    $conn->query("INSERT INTO tb_company (company_name) VALUES ('".$companyname."')");
    
    $queryResult=$conn -> query("SELECT * FROM tb_company WHERE company_name ='".$companyname."'");
        $fetchData = $queryResult->fetch_assoc();
            $company_id=$fetchData['company_id'];

    $conn->query("INSERT INTO tb_users (user_fullname,company_id,user_email,user_password,user_taxpayer,user_telephone,user_type) VALUES ('".$fullname."','".$company_id."','".$email."','".$password."','".$taxpayer."','".$phone."','".$user_type."')");
    { 
        $queryResult=$conn -> query("SELECT * FROM tb_users WHERE user_email ='".$email."'");
        while ($fetchData = $queryResult->fetch_assoc()){
            $user_email=$fetchData['user_email'];
        }
       
    }

    }else{
    //ตรวจสอบ

        if($conn
        ->query("INSERT INTO tb_users (user_fullname,company_id,user_email,user_telephone,user_password,user_type) VALUES ('".$fullname."','".$company_id."','".$email."','".$phone."','".$password."','".$user_type."')"))
        { 
            $queryResult=$conn -> query("SELECT * FROM tb_users WHERE user_email ='".$email."'");
            while ($fetchData = $queryResult->fetch_assoc()){
                $user_email=$fetchData['user_email'];
            }
           
        }


    }
    

?>