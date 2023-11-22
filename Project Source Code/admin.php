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
                        <h2>Registered Users Table</h2>
                        <p>You can view the detail notices of all users.</p>        
                        <table class="table table-hover justify-content-center ">
                            <thead>
                            <tr>
                                <th>UserID</th>
                                <th>Nick Name</th>
                                <th>Email</th>
                                <th>Birthday</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>No. of Created Notices</th>
                                <th>No. of Responded Notices</th>
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
                                $userquery = "SELECT * FROM personal ORDER BY nickname asc";
                                $result=mysqli_query($connect, $userquery);
                                while ( $row = mysqli_fetch_assoc($result) ){
                                    $user = $row['userid'];
                                    $sql1 = "SELECT COUNT(object_id) AS nofc FROM notice WHERE userid_c = '$user'";
                                    $result1 = mysqli_query($connect, $sql1);
                                    $row1 = mysqli_fetch_assoc($result1);
                                    $sql2 = "SELECT COUNT(object_id) AS nofr FROM notice WHERE userid_r = '$user'";
                                    $result2 = mysqli_query($connect, $sql2);
                                    $row2 = mysqli_fetch_assoc($result2);
                                    print "<form action='nofuser.php' method='post'><tr><td>".$row['userid']."</td><td>".$row['nickname']."</td><td>".$row['email']."</td><td>".$row['birthday']."</td><td>".$row['age']."</td><td>".$row['gender']."</td><td>".$row1['nofc']."</td><td>".$row2['nofr']."</td><input type='hidden' name='userid' value='".$row['userid']."'><td><input type='submit' class='button1' value='View Details'></td></tr></form>";
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