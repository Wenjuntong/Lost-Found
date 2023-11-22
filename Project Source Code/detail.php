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
<body>
<section class="h-100 bgimg">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card card-registration my-4">
          <div class="row g-0">
            <div class="col-xl-6 d-none d-md-block">
              <?php
                $server = "localhost";
                $user = "landf";
                $pw = "landf123";
                $db = "lostnfound";
                $index = $_POST['index'];
                $connect = mysqli_connect($server, $user, $pw, $db);
                if(!$connect) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $userquery = "SELECT * FROM notice WHERE object_id = '$index'";
                $result=mysqli_query($connect, $userquery);
                $row = mysqli_fetch_assoc($result);
                print '<img src="'.$row['img'].'"
                alt="lost property" class="img-fluid py-5 float-left rounded-circle change"
                 />
            </div>
            <div class="col-xl-6">
              <div class="card-body p-md-5 text-black background ">
                <h3 class="mb-5 text-uppercase">Deatils of object</h3>
                <h4 class="mb-7">(State: '.$row['st'].')</h4>
                <div class="row">
                  <div class="col-12 mb-4">
                    <div class="form-outline">
                      <p><strong>Creater of Nick Name</strong>: '.$row['nickname_c'].'</p>
                    </div>
                  </div>
                </div>';
                
                if ($row['resp'] != ""){
                print '<div class="row">
                  <div class="col-12 mb-4">
                    <div class="form-outline">
                      <p><strong>Replier of Nick Name</strong>: '.$row['nickname_r'].'</p>
                    </div>
                  </div>
                </div>';}

                print '<div class="row">
                  <div class="col-12 mb-4">
                    <div class="form-outline">
                      <p><strong>Venue</strong>: '.$row['venue'].'</p>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <p><strong>Date</strong>: '.$row['dt'].'</p>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <p><strong>Contact</strong>: '.$row['contact'].'</p>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12 mb-4">
                    <div class="form-outline">
                      <p><strong>Description</strong>: '.$row['descr'].'</p>
                    </div>
                  </div>
                </div>';

                if ($row['resp'] != ""){
                print '<div class="row">
                  <div class="col-12 mb-4">
                    <div class="form-outline">
                      <p><strong>Respond</strong>: ' . $row['resp'] . '</p>
                    </div>
                  </div>
                </div>';}

              print '<a href="function_home.php">Back to home page</a>';
              ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>