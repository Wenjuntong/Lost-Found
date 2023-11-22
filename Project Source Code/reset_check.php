<html>
    <head>
        <title>Lost & Found System</title>
    </head>
    <body>
        <?php
            $server = "localhost";
            $user = "landf";
            $pw = "landf123";
            $db = "lostnfound";
            $uid = $_POST['uid'];
            $pwd = $_POST['pwd'];
            $connect = mysqli_connect($server, $user, $pw, $db);
            if(!$connect) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $sql1 = "SELECT * FROM personal WHERE userid = '$uid'";
            $check = mysqli_query($connect, $sql1);
            if (mysqli_num_rows($check) == 0) {
                print "<script>alert('No records were found.')</script>";
                print "<meta http-equiv='refresh' content='0.5;url=home.php'>";
                die();
            }else {
            $userquery = "UPDATE personal SET pswd = '$pwd' WHERE userid = '$uid'";
            mysqli_query($connect, $userquery);
            print "<script>alert('Reset successfully!')</script>";
            print "<meta http-equiv='refresh' content='0.5;url=home.php'>";
            }
            mysqli_close($connect);
        ?>
    </body>
</html>