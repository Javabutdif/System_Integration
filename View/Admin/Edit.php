<?php

include '../../Controller/api_admin.php';
require_once '../asset/navbar_admin.html';

$user = retrieve_edit_student($_SESSION["editNum"]);


if ($user["id_number"] != null) {

  $_SESSION['id_number'] = $user["id_number"];
  $_SESSION['name'] =  $user["firstName"] . " " . $user["middleName"] . " " . $user["lastName"];
  $_SESSION['fname'] = $user["firstName"];
  $_SESSION['lname'] = $user["lastName"];
  $_SESSION['mname'] = $user["middleName"];
  $_SESSION['yearLevel'] = $user["yearLevel"];
  $_SESSION['course'] = $user["course"];
  $_SESSION['email'] = $user["email"];
  $_SESSION['address'] = $user["address"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>



  <form action="Edit.php" method="post">
    <section class="vh-100 pt-4">

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

                          <select value="<?php echo $_SESSION["yearLevel"]; ?>" name="level" id="level" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>

                          </select>
                          <label class="form-label" for="level">Course Level</label>

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

                          <select name="course" value="<?php echo $_SESSION["course"]; ?>" id="course" class="form-control">
                            <option value="BSIT">BSIT</option>
                            <option value="BSCS">BSCS</option>
                            <option value="ACT">ACT</option>


                          </select>


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




                      <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4 gap-3">
                        <button class="btn btn-primary btn-lg" type="submit" name="submitEdit">Save</button>
                        <a class="btn btn-danger btn-lg" type="button" href="Reset.php">Reset Password</a>
                      </div>

                    </form>

                  </div>
                  <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                    <img src="../../images/sign.webp" class="img-fluid" alt="Sample image">

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