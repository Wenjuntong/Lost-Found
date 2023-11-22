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
            <p style="width:23%; margin:0 auto; font-size: larger;"><strong>All Notice</strong></p>
            <span class="form-inline my-2 my-lg-0">
                <a style="color:black;" class="nav-link" href="logout.php">Dear <strong><?php echo $_SESSION['nickname']?></strong>, Logout <i class="bi bi-box-arrow-right"></i></a>
            </span>
        </nav>

        <div class="container py-5 h-75">
            <div class="row d-flex justify-content-center h-100">
                <div class="col-lg-8 col-xl-8">
                    <div class="container">
                        <h2>All Notice Table</h2>
                        <p>You can view the details of all notices, including that are pending and completed.</p>        
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Nick Name</th>
                                <th>Type</th>
                                <th>Date</th>
                                <th>Venue</th>
                                <th>Contact</th>
                                <th>State</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $server = "localhost";
                                $user = "landf";
                                $pw = "landf123";
                                $db = "lostnfound";
                                $connect = mysqli_connect($server, $user, $pw, $db);
                                if(!$connect) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }
                                $userquery = "SELECT * FROM notice";
                                $result=mysqli_query($connect, $userquery);
                                while ( $row = mysqli_fetch_assoc($result) ){
                                    print "<form action='detail.php' method='post'><tr><td>".$row['nickname_c']."</td><td>".$row['tp']."</td><td>".$row['dt']."</td><td>".$row['venue']."</td><td>".$row['contact']."</td><td>".$row['st']."</td><input type='hidden' name='index' value='".$row['object_id']."'><td><input type='submit' class='button' value='View Details'></td></tr></form>";
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>                           