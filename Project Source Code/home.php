<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="main.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <title>Lost & Found System</title>
    </head>

    <body class="bgimg">
        <div class="container">
            <div class="nav flex-column justify-content-center text-center text-primary background p-4 mt-3 border rounded" style="height:500px;">
                <form action="login_check.php" method="post" class="needs-validation" novalidate>
                    <h2><strong>Welcome to Lost & Found System</strong></h2>
                    <div class="form-group">
                      <label>UserID</label>
                      <input type="text" class="form-control" placeholder="Enter UserID" name="userid" required>
                      <div class="valid-feedback">Valid.</div>
                      <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" placeholder="Enter Password" name="pswd" required>
                      <div class="valid-feedback">Valid.</div>
                      <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                    <br><a href="sign.php">New to Lost & Found? Create an account.</a>
                    <br><a href="reset.php">Forget your password?</a>
                </form>
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
    </body>
</html>