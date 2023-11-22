<?php
    session_start();
?>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="main.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>    
        <title>Update page</title>
    </head>
<body>
<section class="h-200 h-custom text-info bgimg">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-8 col-xl-8">
        <div class="card rounded-3">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-3 px-md-2 text-center">Update Profile Infomation</h3>
            <img src="<?php echo $_SESSION['profileimage']?>" class="w-25 rounded-circle mx-auto d-block" alt="profile image">
            <form class="px-md-4 needs-validation" action="update_check.php" method="post" enctype="multipart/form-data" novalidate>
                <div>
                    <p class="text-center"><?php echo $_SESSION['age']?> years old, <?php echo $_SESSION['gender']?></p>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <label for="link01" class="form-label">UserID <i class="bi bi-person-add"></i></label>
                        <input type="text" class="form-control" id="link01" name="uid" value="<?php echo $_COOKIE["userid"]?>" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>

                    <div class="col-md-6">
                        <label for="link02" class="form-label">Password <i class="bi bi-key"></i></label>
                        <input type="password" class="form-control" id="link02" value="<?php echo $_COOKIE["pswd"]?>" name="pwd" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <label for="link03" class="form-label">Email <i class="bi bi-envelope-at"></i></label>
                        <input type="email" class="form-control" id="link03" name="email" value="<?php echo $_SESSION["email"]?>" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>

                    <div class="col-md-6">
                        <label for="link04" class="form-label">Nick Name <i class="bi bi-pencil"></i></label>
                        <input type="text" class="form-control" id="link04" name="nn" value="<?php echo $_SESSION["nickname"]?>" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="link05" class="form-label">New Profile Image <i class="bi bi-person-circle"></i></label>
                        <input type="file" class="form-control" id="link05" name="npimg" accept="image/jpg, image/png" >
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Image is invalid.</div>
                    </div>
                </div>
                <br><a href="function_home.php">Back to Home page</a>
                <button type="submit" class="btn btn-success float-right">Update <i class="bi bi-caret-right"></i></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
            }, false);
        });
        }, false);
    })();
    </script>
</section>
</body>
</html>

