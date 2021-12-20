<?php

session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;1,100&display=swap" rel="stylesheet">
    <style>
        body{
            font-family: 'Prompt', sans-serif;
        }
    </style>
</head>

<body>
    <?php include "navbar.php" ?>
    <br><br>
    <center><h4>รายชื่อผู้ใช้</h4></center>
    <?php if (isset($_SESSION['admin_user'])) { ?>
        <?php
        include('conn.php');
        $sql = "SELECT * FROM `tb_users` 
        join tb_company on tb_company.company_id = tb_users.company_id
        
        ";
        $stmt = $conn->query($sql); ?>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr class="table-danger">
                                <th scope="col">#</th>
                                <th scope="col">ชื้อผู้ใช้</th>
                                <th scope="col">บริษัท</th>
                                <th scope="col">ทะเบียนผู้เสียภาษี</th>
                                <th scope="col">อีเมล</th>
                                <th scope="col">เบอร์โทรศัพท์</th>
                                <th scope="col">ประเภท</th>
                                <th scope="col">สถานะ</th>
                                <th scope="col">เปลี่ยนสถานะ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                                <tr>
                                    <th  scope="row"><?php echo $result['user_id']; ?></th>
                                    <th  scope="row"><?php echo $result['user_fullname']; ?></th>
                                    <th scope="row"><?php echo $result['company_name']; ?></th>
                                    <th scope="row"><?php
                                    if($result['user_taxpayer']){
                                        echo "<p style='color:green'>",$result['user_taxpayer'],"</p>"; 
                                    }
                                    else{
                                        echo " ";
                                    }
                                        ?></th>
                                    <th  scope="row"><?php echo $result['user_email']; ?></th>
                                    <th scope="row"><?php echo $result['user_telephone']; ?></th>
                                    
                                    <th  scope="row">
                                
                                    <?php if($result['user_type'] == "1"){
                                        echo "<p>Manager</p>";
                                    }
                                   else if($result['user_type'] == "2"){
                                        echo "<p>Superior</p>";
                                    }
                                    else if($result['user_type'] == "3"){
                                        echo "<p>Recorder</p>";
                                    }
                                    else if($result['user_type'] == "4"){
                                        echo "<p>Owner</p>";
                                    }
                                   ?>
                                
                                
                                </th>
                                <th scope="row"><?php 
                                if($result['user_status'] == "1"){
                                        echo "<p style='color:green'>ใช้งานได้</p>";
                                    } else{
                                        echo "<p style='color:red'>ใช้งานไม่ได้</p>";
                                    }
                                    ?>
                                    </th>
                                    <th  scope="row"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#id_id<?php echo $result['user_id']; ?>">
                                            เปลี่ยนสถานะ
                                        </button></th>
                                </tr>
                                <div class="modal fade" id="id_id<?php echo $result['user_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">เปลี่ยนสถานะ</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>


                                            <form action="changeStatus.php" method="POST">
                                                <div class="modal-body">
                                                    <input type="text" value="<?php echo $result['user_id']; ?> " name="user_id"  hidden>
                                                    <label for="select" style="font-size: large; ">สถานะ</label><br />
                                                    <select class="form-select" aria-label="Default select example" name="user_status">
                                                        <!-- <option selected>Open this select menu</option> -->
                                                        <option value="1">ใช้งานได้</option>
                                                        <option value="0">ใช้งานไม่ได้</option>

                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                    <input type="submit" value="บันทึก" class="btn btn-primary btn-auto active" role="button" aria-pressed="true" />

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </tbody>
                    </table>
                    <!-- Modal -->


                    <!-- Modal -->
                </div>
            </div>

        </div>
    <?php } else {
        header('Location: login.php ');
    }
    ?>

</body>

</html>