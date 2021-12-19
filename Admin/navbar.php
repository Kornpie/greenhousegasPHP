<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./emision.php">Emission-Factors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./approve.php">Approve-Company</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li> -->
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                     
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="logout.php">ออกจากระบบ</a></a>
                        </li>
                       
                    </ul>
                </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li> -->
            </ul>


            <?php if (isset($_SESSION['admin_user'])) { ?><h5 class="me-2"><?php echo  $_SESSION['admin_user']; ?></h5>
            <?php } ?>
            <?php if (isset($_SESSION['admin_user']) != null) {  ?><a class="btn btn-danger" href="logout.php">ออกจากระบบ</a> <?php } else { ?> <a class="btn btn-success" href="login.php" role="button">เข้าสู่ระบบ</a> <?php } ?>


        </div>
    </div>
</nav>