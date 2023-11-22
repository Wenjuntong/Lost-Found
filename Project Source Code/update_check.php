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
            $uid = $_COOKIE["userid"];
            $pwd = $_POST['pwd'];
            $email = $_POST['email'];
            $nn = $_POST['nn'];
            $connect = mysqli_connect($server, $user, $pw, $db);
            $_SESSION['email']=$email;
            $_SESSION['nickname']=$nn;
            setcookie("pswd", $pwd , time() + (60 * 60 * 24));
            if(!$connect) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            if($_FILES["npimg"]['name']==""){
                $userquery="UPDATE personal SET pswd = '$pwd',email = '$email',nickname = '$nn' WHERE userid = '$uid'";
            }else{
                $file = $_FILES["npimg"];
                if ($file['error'] <= 0) {
                    $filename = $_FILES["npimg"]["name"];
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    $filepath = md5(uniqid(mt_rand())) . "." . $ext;
                    move_uploaded_file($_FILES["npimg"]["tmp_name"], "uploads/".$filepath);
                    $npimg = "./uploads/" . $filepath;
                    $_SESSION['profileimage'] = $npimg;
                }
            $userquery="UPDATE personal SET pswd = '$pwd',email = '$email',nickname = '$nn', profileimage = '$npimg' WHERE userid = '$uid'";}
            mysqli_query($connect, $userquery);
            print "<script>alert('Update successfully!')</script>";
            print "<meta http-equiv='refresh' content='0.5;url=function_home.php'>";
            mysqli_close($connect);
        ?>
    </body>
</html>