<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>

<body>

  
    <?php

    require("conn.php");
    if (isset($_POST['submit'])) {
        $username = $_POST['admin_user'];
        $password = $_POST['admin_pass'];

        $sql = "SELECT * FROM `tb_admin` WHERE `admin_user` = '" . $username . "' AND `admin_pass` = '" . $password . "' ";
        $result = $conn->query($sql);

        if ($result->rowCount() > 0) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $_SESSION['admin_id'] = $row['admin_id'];
            $_SESSION['admin_user'] = $row['admin_user'];
            $_SESSION['admin_pass'] = $row['address'];
          


            Header("Location:index.php"); //user & password incorrect back to login again
        } else {
            echo '<script>
            alert("user/pass")
            </script>';
        }
    }

    ?>
    
   
    
    <div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card" style="width: 500px;">
			<div class="card-header">
				<h3>เข้าสู่ระบบแก๊สเรือนกระจก(ผู้ดูแลระบบ)</h3>
			
			</div>
			<div class="card-body" >
				<form action="" method="POST">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="ชื่อผู้ใช้" name="admin_user" required>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="รหัสผ่าน" name="admin_pass" required>
					</div>
					<center>
					<div class="form-group">
                    <input type="submit" class="btn center login_btn" name="submit" value="เข้าสู่ระบบ" >
					
					</div>
                    </center>
				</form>
			</div>
		
		</div>
	</div>
</div>
</body>

</html>