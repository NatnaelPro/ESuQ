<?php include "includes/header.php"; 
    if(isset($_POST['submit'])){
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phone_number'];
        $gender = $_POST['gender'];
        $birthdate = $_POST['birthdate'];
        $address = $_POST['address'];
        $region = $_POST['region'];
        $country = $_POST['country'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $conformPassword = $_POST['conform_password'];

        if($firstName != '' && $lastName != '' && $username != '' && $email != '' && $phoneNumber != '' && $gender != '' && $birthdate != '' && 
          $address != '' && $country != '' && $region != '' && $country != '' && $password != ''){
            $query = "INSERT INTO user(first_name, last_name, email, username, phone, address, country, region, sex, birthdate, role, password) ";
            $query .= "VALUES('$firstName', '$lastName', '$email', '$username', '$phoneNumber', '$address', '$country', '$region', '$gender', '$birthdate', 'vendor', '$password')";
            $query_result = mysqli_query($connection, $query);
            check_query_success($query_result);
        }
    }
?>
    <h1 class="text-center my-3 header-1" style='font-family: serif;'>Sign up</h1>
        <div class="container">
            <div class="form">
                <form class="needs-validation" novalidate method='post'>
                    <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="validationCustom01">First name</label>
                        <input type="text" class="form-control" name="first_name" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="validationCustom02">Last name</label>
                        <input type="text" class="form-control" name="last_name" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="validationCustomUsername">Username</label>
                        <div class="input-group">
                          <input type="text" class="form-control" name="username" required>
                          <div class="invalid-feedback">
                            Please choose a username.
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="validationCustom01">Email</label>
                        <input type="text" class="form-control" name="email" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="validationCustom01">Phone number</label>
                        <input type="text" class="form-control" name="phone_number" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="validationCustom01">Gender</label>
                        <select class="custom-select" name="gender" required>
                          <option value="Male">Male</option>
                          <option value="famale">Female</option>
                        </select>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="validationCustom01">Birth Date</label>
                        <input type="date" class="form-control" name="birthdate" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="validationCustom01">address</label>
                        <input type="text" class="form-control" name="address" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="validationCustom01">country</label>
                        <select class="custom-select" name="country" required>
                          <option value="ethiopia">Ethiopia</option>
                          <option value="usa">USA</option>
                        </select>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="validationCustom01">Region</label>
                        <input type="text" class="form-control" name="region" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="validationCustom01">Password</label>
                        <input type="password" class="form-control" name="password" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="validationCustom01">Conform Password</label>
                        <input type="password" class="form-control" name="conform_password" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                      <button class="btn btn-primary" name="submit" type="submit">Sign Up</button>
                    </div>
                  </form>
            </div>
        </div>
<?php include "includes/footer.php"; ?>