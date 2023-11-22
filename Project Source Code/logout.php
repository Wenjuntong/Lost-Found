<?php
    session_start();
?>

<html>
    <head>
        <title>Lost & Found System</title>
    </head>
</html>
<?php
    setcookie("userid", $userid, time() - 3600);
    setcookie("pswd", $pswd, time() - 3600);
    session_unset();
    session_destroy();
    header('location:home.php');
?>