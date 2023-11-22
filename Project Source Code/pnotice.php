<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="main.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <title>Administrator System</title>
    </head>
    <body class="admin">
        <h2 class="row d-flex justify-content-center h-10"><strong>Administrator System</strong></h2>
        <nav class="navbar navbar-expand-lg navbar-light justify-content-center background">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="admin.php">View List of Registered Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pnotice.php">View List of Pending Notices</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cnotice.php">View List of Completed Notices</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="statistic.php">System Statistics</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </nav>
        
        <div class="container py-5 h-75">
            <div class="row d-flex justify-content-center h-100">
                <div class="col-lg-8 col-xl-10">
                    <div class="container">
                        <h2>Pending Notices Table</h2>
                        <p>You can view all pending notices.</p>        
                        <table class="table table-hover justify-content-center ">
                            <thead>
                            <tr>
                                <th>UserID of creator</th>
                                <th>UserID of replier</th>
                                <th>Nickname of creator</th>
                                <th>Nickname of replier</th>
                                <th>Type</th>
                                <th>Date</th>
                                <th>Venue</th>
                                <th>Contact</th>
                                <th>State</th>
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
                                $userquery = "SELECT * FROM notice WHERE st = 'Pending'";
                                $result=mysqli_query($connect, $userquery);
                                while ( $row = mysqli_fetch_assoc($result) ){
                                    print "<tr><td>".$row['userid_c']."</td><td>".$row['userid_r']."</td><td>".$row['nickname_c']."</td><td>".$row['nickname_r']."</td><td>".$row['tp']."</td><td>".$row['dt']."</td><td>".$row['venue']."</td><td>".$row['contact']."</td><td>".$row['st']."</td></tr>";
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