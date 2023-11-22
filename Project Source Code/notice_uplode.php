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
            $type = $_POST['type'];
            $date = $_POST['date'];
            $venue = $_POST['venue'];
            $contact = $_POST['contact'];
            $descr = $_POST['descr'];
            $file = $_FILES["oimg"];
            if ($file['error'] <= 0) {
                $filename = $_FILES["oimg"]["name"];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                $filepath = md5(uniqid(mt_rand())) . "." . $ext;
                move_uploaded_file($_FILES["oimg"]["tmp_name"], "uploads/".$filepath);
            }
            $state = "Pending";
            $age = $_POST['age'];
            $connect = mysqli_connect($server, $user, $pw, $db);
            if(!$connect) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $oimg = "./uploads/" . $filepath;
            $userquery="INSERT INTO notice (userid_c,nickname_c,tp,dt,venue,contact,descr,img,st,age) VALUES ('$uid','$nn','$type','$date','$venue','$contact','$descr','$oimg','$state','$age')";
            mysqli_query($connect, $userquery);
            print "<script>alert('You create a notice successfully!')</script>";
            print "<meta http-equiv='refresh' content='0.5;url=my.php'>";
            mysqli_close($connect);
        ?>
    </body>
</html>
