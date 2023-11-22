<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="main.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>    
        <title>Reset page</title>
    </head>
<body>
<section class="h-200 h-custom text-info bgimg">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-8 col-xl-6">
        <div class="card rounded-3">
          <img src="reset.png" class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;" alt="lost & found">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-3 px-md-2"><i class="bi bi-people"></i>Reset your Information</h3>
            <form class="px-md-4 needs-validation" action="reset_check.php" method="post" novalidate>
                <div class="row">
                    <div class="col-md-6">
                        <label for="link01" class="form-label">UserID <i class="bi bi-person-add"></i></label>
                        <input type="text" class="form-control" id="link01" placeholder="Enter UserID" name="uid" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>

                    <div class="col-md-6">
                        <label for="link02" class="form-label">New Password <i class="bi bi-key"></i></label>
                        <input type="password" class="form-control" id="link02" placeholder="Enter Password" name="pwd" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                </div>

                <br><a href="home.php">Back to Login page</a>
                    <button type="submit" class="btn btn-success float-right">Next <i class="bi bi-caret-right"></i></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
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
</body>
</html>