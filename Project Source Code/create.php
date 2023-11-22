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
        <title>Registration page</title>
    </head>
<body>
<section class="h-200 h-custom text-info bgimg">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-8 col-xl-6">
        <div class="card rounded-3">
          <img src="notice.jpg" class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;" alt="lost & found">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-3 px-md-2"><i class="bi bi-people"></i>Create a Notice</h3>
            <form class="px-md-4 needs-validation" action="notice_uplode.php" method="post" enctype="multipart/form-data" novalidate>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-2 pb-1">Type</i></div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="losttype" value="lost" checked />
                            <label class="form-check-label" for="losttype">Lost</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="foundtype" value="found" />
                            <label class="form-check-label" for="foundtype">Found</label>
                        </div>
                    </div>

                    <script>
                        $(function(){
	                        var date_now = new Date();
	                        var year = date_now.getFullYear();
	                        var month = date_now.getMonth()+1 < 10 ? "0"+(date_now.getMonth()+1) : (date_now.getMonth()+1);
	                        var date = date_now.getDate() < 10 ? "0"+date_now.getDate() : date_now.getDate();
	                        $("#link02").attr("max",year+"-"+month+"-"+date);
                        })
                    </script>
                    <div class="col-md-6">
                        <label for="link02" class="form-label">Date <i class="bi bi-calendar"></i></label>
                        <input type="date" class="form-control" id="link02" name="date" max="" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Date is invalid.</div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <label for="link03" class="form-label">Venue <i class="bi bi-geo-alt"></i></label>
                        <input type="text" class="form-control" id="link03" placeholder="Enter venue" name="venue" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>

                    <div class="col-md-6">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <label for="link04" class="form-label">Contact <i class="bi bi-person-lines-fill"></i></label>
                        <input type="text" class="form-control" id="link04" placeholder="Enter contact" name="contact" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <label for="link05" class="form-label">Description <i class="bi bi-file-earmark-font"></i></label>
                        <textarea id="link05" name="descr" rows="4" cols="50"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <label for="link06" class="form-label">Image of object <i class="bi bi-card-image"></i></label>
                        <input type="file" class="form-control" id="link06" name="oimg">
                    </div>
                </div>

                <input type="hidden" name="age" value="<?php echo $_SESSION['age']?>">

                <br><a href="function_home.php">Back to home page</a>
                <button type="submit" class="btn btn-success float-right">Submit <i class="bi bi-caret-right"></i></button>
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