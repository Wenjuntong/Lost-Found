<html>
    <head>
        <title>Lost & Found System</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <?php
            $server = "localhost";
            $user = "landf";
            $pw = "landf123";
            $db = "lostnfound";
            $uid = $_POST['uid'];
            $pwd = $_POST['pwd'];
            $email = $_POST['email'];
            $bd = $_POST['bd'];
            $age = $_POST['age'];
            $nn = $_POST['nn'];
            $sex = $_POST['sex'];
            $file = $_FILES["pimg"];
            if ($file['error'] <= 0) {
                $filename = $_FILES["pimg"]["name"];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                $filepath = md5(uniqid(mt_rand())) . "." . $ext;
                move_uploaded_file($_FILES["pimg"]["tmp_name"], "uploads/".$filepath);
            }
          
            $connect = mysqli_connect($server, $user, $pw, $db);
            if(!$connect) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $sql1 = "SELECT * FROM personal";
            $check = mysqli_query($connect, $sql1);
            while ( $row = mysqli_fetch_assoc($check) ){
                if($uid==$row['userid']){
                    print "<script>alert('The account has existed, please create another one!')</script>";
                    print "<meta http-equiv='refresh' content='0.5;url=sign.php'>";
                    die();
                }
                if($uid=='admin'){
                    print "<script>alert('Invalid registration')</script>";
                    print "<meta http-equiv='refresh' content='0.5;url=home.php'>";
                    die();
                }
            }
            $pimg = "./uploads/" . $filepath;
            $userquery="INSERT INTO personal (userid,pswd,email,birthday,age,nickname,gender,profileimage) VALUES ('$uid','$pwd','$email','$bd','$age','$nn','$sex','$pimg')";
            mysqli_query($connect, $userquery);
            print "<script>alert('Register successfully!')</script>";
            print "<meta http-equiv='refresh' content='0.5;url=home.php'>";
            mysqli_close($connect);
        ?>
    </body>
</html>