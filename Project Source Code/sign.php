<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="main.css">
        <script src="calculate.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>    
        <title>Registration page</title>
    </head>
<body>
<section class="h-200 h-custom text-info bgimg">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-8 col-xl-6">
        <div class="card rounded-3">
          <img src="lf.webp" class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;" alt="lost & found">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-3 px-md-2"><i class="bi bi-people"></i>Registration Infomation</h3>
            <form class="px-md-4 needs-validation" action="register_check.php" method="post" enctype="multipart/form-data" novalidate>
                <div class="row">
                    <div class="col-md-6">
                        <label for="link01" class="form-label">UserID <i class="bi bi-person-add"></i></label>
                        <input type="text" class="form-control" id="link01" placeholder="Enter UserID" name="uid" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>

                    <div class="col-md-6">
                        <label for="link02" class="form-label">Password <i class="bi bi-key"></i></label>
                        <input type="password" class="form-control" id="link02" placeholder="Enter Password" name="pwd" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <label for="link03" class="form-label">Email <i class="bi bi-envelope-at"></i></label>
                        <input type="email" class="form-control" id="link03" placeholder="Enter email" name="email" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>

                    <script>
                        $(function(){
	                        var date_now = new Date();
	                        var year = date_now.getFullYear();
	                        var month = date_now.getMonth()+1 < 10 ? "0"+(date_now.getMonth()+1) : (date_now.getMonth()+1);
	                        var date = date_now.getDate() < 10 ? "0"+date_now.getDate() : date_now.getDate();
	                        $("#link04").attr("max",year+"-"+month+"-"+date);
                        })
                    </script>
                    <div class="col-md-6">
                        <label for="link04" class="form-label">Birthday <i class="bi bi-calendar"></i></label>
                        <input type="date" class="form-control" id="link04" name="bd" max="" required>
                        <input type="hidden" id="years" name="age">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Birthday is invalid.</div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="link05" class="form-label">Nick Name <i class="bi bi-pencil"></i></label>
                        <input type="text" class="form-control" id="link05" placeholder="Enter Password" name="nn" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                
                    <div class="col-md-6">
                        <div class="mb-2 pb-1">Gender <i class="bi bi-gender-ambiguous"></i></div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sex" id="femaleGender" value="female" checked />
                            <label class="form-check-label" for="femaleGender">Female</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sex" id="maleGender" value="male" />
                            <label class="form-check-label" for="maleGender">Male</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <label for="link06" class="form-label">Profile Image <i class="bi bi-person-circle"></i></label>
                        <input type="file" class="form-control" id="link06" name="pimg" accept="image/jpg, image/png">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Image is invalid.</div>
                    </div>
                </div>

                <br><a href="home.php">Already have an account?</a>
                    <button type="submit" class="btn btn-success float-right" onclick="ageCalculate()">Next <i class="bi bi-caret-right"></i></button>
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

