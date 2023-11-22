<?php
    session_start();
?>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="main.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <title>Lost & Found System</title>
    </head>
    <body class="bgimg">
        <h2 class="row d-flex justify-content-center h-10"><strong>Lost & Found System</strong></h2>
        <nav class="navbar navbar-expand-lg navbar-light background">
            <a class="navbar-brand" href="function_home.php">Home</a>
            <ul class="navbar-nav mr-auto mt-4 mt-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarlink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Notice
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarlink">
                    <a class="dropdown-item" href="update.php">Update Profile Information</a>
                    <a class="dropdown-item" href="create.php">Create a Notice</a>
                    <a class="dropdown-item" href="pending.php">View Pending Notice</a>
                    <a class="dropdown-item" href="my.php">View My Notice</a>
                    <a class="dropdown-item" href="viewdetail.php">View Notice Details</a>
                    </div>
                </li>
            </ul>
            <p style="width:22%; margin:0 auto; font-size: larger;"><strong>Home</strong></p>
            <span class="form-inline my-2 my-lg-0">
                <a style="color:black;" class="nav-link" href="logout.php">Dear <strong><?php echo $_SESSION['nickname']?></strong>, Logout <i class="bi bi-box-arrow-right"></i></a>
            </span>
        </nav>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="container py-5 h-75">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-8 col-xl-8">
                        <div class="row d-flex justify-content-center h-25"><p><h2>The photo of latest lost property</h2></p></div>
                        <p class="d-flex justify-content-center" style="color:black;">You can view pictures of the items in the latest three notices</p>
                        <div class="carousel-inner">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleControls" data-slide-to="1"></li>
                                <li data-target="#carouselExampleControls" data-slide-to="2"></li>
                            </ol>
                        <?php
                        $server = "localhost";
                        $user = "landf";
                        $pw = "landf123";
                        $db = "lostnfound";
                        $connect = mysqli_connect($server, $user, $pw, $db);
                        if(!$connect) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $sql1 = "SELECT * FROM notice ORDER BY object_id DESC LIMIT 0,1";
                        $sql2 = "SELECT * FROM notice ORDER BY object_id DESC LIMIT 1,1";
                        $sql3 = "SELECT * FROM notice ORDER BY object_id DESC LIMIT 2,1";
                        
                        $result1=mysqli_query($connect, $sql1);
                        $result2=mysqli_query($connect, $sql2);
                        $result3=mysqli_query($connect, $sql3);

                        $row1 = mysqli_fetch_assoc($result1);
                        $row2 = mysqli_fetch_assoc($result2);
                        $row3 = mysqli_fetch_assoc($result3);

                        if($row1==null){
                            print '<div class="carousel-item active">
                            <img type="image"  class="d-block w-100 change" src="space.jpg" alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 change" src="space.jpg" alt="Second slide">
                            <div class="carousel-caption d-none d-md-block">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 change" src="space.jpg" alt="Third slide">
                            <div class="carousel-caption d-none d-md-block">
                            </div>
                        </div>
                        </div>'
                            ;}
                        
                        else if($row2==null){
                            print '<div class="carousel-item active">
                            <form action="detail.php" method="post">
                            <input type="hidden" name="index" value="'.$row1['object_id'].'">
                            <input type="image"  class="d-block w-100 change" src="'.$row1['img'].'" alt="First slide">
                            </form>
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="text-info">First ('.$row1['tp'].')</h5>
                                <p class="text-info">'.$row1['descr'].'</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 change" src="space.jpg" alt="Second slide">
                            <div class="carousel-caption d-none d-md-block">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 change" src="space.jpg" alt="Third slide">
                            <div class="carousel-caption d-none d-md-block">
                            </div>
                        </div>
                        </div>'
                        ;}

                        else if($row3==null){
                            print '<div class="carousel-item active">
                            <form action="detail.php" method="post">
                            <input type="hidden" name="index" value="' . $row1['object_id'] . '">
                            <input type="image"  class="d-block w-100 change" src="' . $row1['img'] . '" alt="First slide">
                            </form>
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="text-info">First (' . $row1['tp'] . ')</h5>
                                <p class="text-info">' . $row1['descr'] . '</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                        <form action="detail.php" method="post">
                        <input type="hidden" name="index" value="' . $row2['object_id'] . '">
                        <input type="image"  class="d-block w-100 change" src="' . $row2['img'] . '" alt="First slide">
                        </form>
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="text-info">Second (' . $row2['tp'] . ')</h5>
                            <p class="text-info">' . $row2['descr'] . '</p>
                        </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 change" src="space.jpg" alt="Third slide">
                            <div class="carousel-caption d-none d-md-block">
                            </div>
                        </div>
                        </div>'
                            ;}

                        else {
                            print '<div class="carousel-item active">
                            <form action="detail.php" method="post">
                            <input type="hidden" name="index" value="' . $row1['object_id'] . '">
                            <input type="image"  class="d-block w-100 change" src="' . $row1['img'] . '" alt="First slide">
                            </form>
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="text-info">First (' . $row1['tp'] . ')</h5>
                                <p class="text-info">' . $row1['descr'] . '</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                        <form action="detail.php" method="post">
                        <input type="hidden" name="index" value="' . $row2['object_id'] . '">
                        <input type="image"  class="d-block w-100 change" src="' . $row2['img'] . '" alt="First slide">
                        </form>
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="text-info">Second (' . $row2['tp'] . ')</h5>
                            <p class="text-info">' . $row2['descr'] . '</p>
                        </div>
                        </div>
                        <div class="carousel-item">
                        <form action="detail.php" method="post">
                        <input type="hidden" name="index" value="' . $row3['object_id'] . '">
                        <input type="image"  class="d-block w-100 change" src="' . $row3['img'] . '" alt="First slide">
                        </form>
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="text-info">Third (' . $row3['tp'] . ')</h5>
                            <p class="text-info">' . $row3['descr'] . '</p>
                        </div>
                        </div>';}
                        ?>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>