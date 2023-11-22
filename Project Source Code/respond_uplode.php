<?php
    session_start();
?>
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
            $uid = $_COOKIE['userid'];
            $nn = $_SESSION['nickname'];
            $resp = $_POST['resp'];
            $index = $_POST['index'];
            $connect = mysqli_connect($server, $user, $pw, $db);
            if(!$connect) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $userquery="UPDATE notice SET userid_r = '$uid', nickname_r = '$nn', resp = '$resp' WHERE object_id = '$index'";
            mysqli_query($connect, $userquery);
            $userquery1 = "UPDATE notice SET st = 'Completed' WHERE object_id = '$index'";
            mysqli_query($connect, $userquery1);
            print "<script>alert('You respond a notice successfully!')</script>";
            print "<meta http-equiv='refresh' content='0.5;url=pending.php'>";
            mysqli_close($connect);
        ?>
    </body>
</html>