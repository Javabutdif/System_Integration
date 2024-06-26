<?php
require_once '../asset/navbar_student.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

</head>
<body>


	
<form action="Profile.php"method="POST">
	<section class="vh-100 py-5 px-5" >
		
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
	
                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Edit Profile</p>

                <form class="mx-1 mx-md-4">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" value="<?php echo $_SESSION["id_number"]; ?>" id="idNumber" class="form-control" name="idNumber" readonly />
                      <label class="form-label" for="idNumber">ID Number</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" value="<?php echo $_SESSION["lname"]; ?>" id="lName" class="form-control" name="lName" required />
                      <label class="form-label" for="lName">Last Name</label>
                    </div>
                  </div>

				  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" value="<?php echo $_SESSION["fname"]; ?>" id="fName" class="form-control" name="fName" required />
                      <label class="form-label" for="fName">First Name</label>
                    </div>
                  </div>

				  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" value="<?php echo $_SESSION["mname"]; ?>" id="mName" class="form-control" name="mName" required />
                      <label class="form-label" for="mName">Middle Name</label>
                    </div>
                  </div>

				  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" value="<?php echo $_SESSION["yearLevel"]; ?>" id="courseLevel" class="form-control" name="courseLevel" required />
                      <label class="form-label" for="courseLevel">Course Level</label>
                    </div>
                  </div>

                  

				  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" value="<?php echo $_SESSION["email"]; ?>" id="email" class="form-control" name="email" required />
                      <label class="form-label" for="email">Email</label>
                    </div>
                  </div>

				  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0"> 
                      <input type="text" value="<?php echo $_SESSION["course"]; ?>" id="course" class="form-control" name="course" required />
                      <label class="form-label" for="course">Course</label>
                    </div>
                  </div>

				  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" value="<?php echo $_SESSION["address"]; ?>" id="address" class="form-control" name="address" required />
                      <label class="form-label" for="address">Address</label>
                    </div>
                  </div>

				  


                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button class="btn btn-primary btn-lg"  type="submit" name="submit">Save</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="../../images/sign.webp"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
	</form>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

