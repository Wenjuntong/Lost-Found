<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="main.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>    
        <title>Registration page</title>
    </head>
<body>
<section class="h-100 bgimg">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card card-registration my-4">
          <div class="row g-0">
            <div class="col-xl-6 d-none d-xl-block">
                
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
                alt="lost property" class="img-fluid py-5 change"
                 />
            </div>
            <div class="col-xl-6">
              <div class="card-body p-md-5 text-black background">';
                
              print '<form class="px-md-4 needs-validation" action="respond_uplode.php" method="post" novalidate>
          <div class="row">
              <div class="col-12">
                  <label for="link01" class="form-label">Respond <i class="bi bi-file-earmark-font"></i></label>
                  <textarea id="link01" name="resp" rows="6" cols="50"></textarea>
              </div>
          </div>
          
          <input type="hidden" name="index" value="'.$index.'">

          <br><a href="pending.php">Back to Pending Notice Table</a>
          <button type="submit" class="btn btn-success float-right">Submit <i class="bi bi-caret-right"></i></button>
          </form>
          <script>
    (function() {
        "use strict";
        window.addEventListener("load", function() {
        var forms = document.getElementsByClassName("needs-validation");
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener("submit", function(event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add("was-validated");
            }, false);
        });
        }, false);
    })();
</script>';
              ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>