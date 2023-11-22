<?php
  session_start();
  $server = "localhost";
  $user = "landf";
  $pw = "landf123";
  $db = "lostnfound";
  $userid = $_POST['userid'];
  $pswd = $_POST['pswd'];
  $connect = mysqli_connect($server, $user, $pw, $db);
  if(!$connect) {
    die("Connection failed: " . mysqli_connect_error());
  }
  $sql1 = "SELECT * FROM personal";
  $check1 = mysqli_query($connect, $sql1);
  while ( $row = mysqli_fetch_assoc($check1) ){
    if($row['userid']==$userid & $row['pswd']==$pswd){
      if(!isset($_COOKIE["userid"])){
        setcookie("userid", $userid, time() + (60 * 60 * 24));
        setcookie("pswd", $pswd , time() + (60 * 60 * 24));
        $_SESSION['email']=$row['email'];
        $_SESSION['nickname']=$row['nickname'];
        $_SESSION['profileimage']=$row['profileimage'];
        $_SESSION['gender']=$row['gender'];
        $_SESSION['age']=$row['age'];
        header('location:function_home.php');
        }else{
        if($userid==$_COOKIE["userid"] and $pswd==$_COOKIE["pswd"]){
        $_SESSION['email']=$row['email'];
        $_SESSION['nickname']=$row['nickname'];
        $_SESSION['profileimage']=$row['profileimage'];
        $_SESSION['gender']=$row['gender'];
        $_SESSION['age']=$row['age'];
        header('location:function_home.php');
        }else {
        setcookie("userid", $userid, time() - 3600);
        setcookie("pswd", $pswd, time() - 3600);
        header('location:home.php');
        }
        }
    }
  }
  if($userid=='admin' & $pswd=='adminpass'){
    setcookie("userid", $userid, time() + (60 * 60 * 24));
    setcookie("pswd", $pswd , time() + (60 * 60 * 24));
    header('location:admin.php');
  }
  mysqli_close($connect);
?>
<html>
  <head>
    <title>Lost & Found System</title>
    <script>alert("Invalid Username and/or Password. Please try again!")</script>
    <meta http-equiv="refresh" content="0.2;url=home.php">
  </head>  
</html>