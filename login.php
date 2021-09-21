<?php 
  include "includes/header.php"; 
?>
<?php 
  if(isset($_POST['signup'])){
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phone_number'];
    $gender = $_POST['gender'];
    $birthdate = $_POST['birthdate'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $region = $_POST['region'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $conformPassword = $_POST['conform_password'];
if($firstName != '' && $lastName != '' && $username != '' && $email != '' && $phoneNumber != '' && $gender != '' && $birthdate != '' && 
    $address != '' && $country != '' && $region != '' && $country != '' && $password != ''){
      $query = "INSERT INTO user(first_name, last_name, address, email, username, password, phone, country, region, sex, birthdate, role) ";
      $query .= "VALUES('$firstName', '$lastName', '$address', '$email', '$username', '$password', '$phoneNumber', '$country', '$region', '$gender', '$birthdate', 'customer')";
      $insert_user = mysqli_query($connection, $query);
      check_query_success($insert_user);
    }else{
      ?>
      <style>
        .signup-error{
          display: block;
        }
      </style>
    <?php
    }
      
  }


  if(isset($_POST['signin'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $flag = false;
    $query = "SELECT * FROM user WHERE email='$email'";  
    $userVerify = mysqli_query($connection, $query);
    check_query_success($userVerify);
    while($row = mysqli_fetch_assoc($userVerify)){ 
      if($row['email'] == $email && password_verify($password, $row['password'])){
        $_SESSION['user-id'] = $row['id'];
        
        if(!isset($_COOKIE['user'])){
          setcookie('user', $row['id'], time() + (86400 * 365));
        }
        
        header('location:index.php');
        $flag = true;
      }
    } 
    if(!$flag){
      ?>
        <style>
          .hidden{
            display: block;
          }
        </style>
      <?php
    }
  } 
?>
<section id="register">
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form class="needs-validation" id="singup" novalidate method="post">
                <h1>Create Account</h1>
                <div class="form-row">

                  <div class="col-md-6 mb-2">
                    <div class="form-group">
                      <input type="text" class="form-control" id="firstName" placeholder="First Name" name="first_name" required>
                      <i class="fa fa-check-circle check check-signup" ></i>
                      <i class="fa fa-exclamation-circle exclamation exclamation-signup"></i>
                      <!-- <div class="valid-feedback">
                        <p class="text-left pl-1 m-0">Looks good!</p>
                      </div>
                      <div class="invalid-feedback">
                        <p class="text-left pl-1 m-0">firstname cannot be blank</p>
                      </div> -->
                      <small>Error Message</small>
                    </div>
                  </div>

                  <div class="col-md-6 mb-2">
                    <div class="form-group">
                      <input type="text" class="form-control" id="lastName" placeholder="Last Name" name="last_name" required>
                      <i class="fa fa-check-circle check check-signup"></i>
                      <i class="fa fa-exclamation-circle exclamation exclamation-signup"></i>
                      <!-- <div class="valid-feedback">
                        <p class="text-left pl-1 m-0">Looks good!</p>
                      </div>
                      <div class="invalid-feedback">
                        <p class="text-left pl-1 m-0">Lastname cannot be blank.</p>
                      </div> -->
                      <small>Error Message</small>
                    </div>
                  </div>
                </div>

                <div class="form-row">

                  <div class="col-md-6 mb-2">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="username" name="username" id="username" required>
                      <i class="fa fa-check-circle check check-signup"></i>
                      <i class="fa fa-exclamation-circle exclamation exclamation-signup"></i>
                      <!-- <div class="valid-feedback">
                        <p class="text-left pl-1 m-0">Looks good!</p>
                      </div>
                      <div class="invalid-feedback">
                        <p class="text-left pl-1 m-0">username cannot be blank</p>
                      </div> -->
                      <small>Error Message</small>
                    </div>
                  </div>

                  <div class="col-md-6 mb-2">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Email" name="email" id="emailSignup" required>
                      <i class="fa fa-check-circle check check-signup"></i>
                      <i class="fa fa-exclamation-circle exclamation exclamation-signup"></i>
                      <!-- <div class="valid-feedback">
                        <p class="text-left pl-1 m-0">Looks good!</p>
                      </div>
                      <div class="invalid-feedback">
                        <p class="text-left pl-1 m-0">Email cannot be blank</p>
                      </div> -->
                      <small>Error Message</small>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-2">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="phone-number" name="phone_number" id="phoneNumber" required>
                        <i class="fa fa-check-circle check check-signup"></i>
                        <i class="fa fa-exclamation-circle exclamation exclamation-signup"></i>
                        <!-- <div class="valid-feedback">
                          <p class="text-left pl-1 m-0">Looks good!</p>
                        </div>
                        <div class="invalid-feedback">
                          <p class="text-left pl-1 m-0">phone number cannot be blank</p>
                        </div> -->
                      <small>Error Message</small>
                      </div>
                    </div>
                    
                    <div class="col-md-6 mb-2 mt-2" style="width: 100%;">
                        <select class="custom-select" name="gender" required>
                          <option value="Male">Male</option>
                          <option value="famale">Female</option>
                        </select>
                        <div class="valid-feedback">
                      <p class="text-left pl-1 m-0">Looks good!</p>
                    </div>
                    <div class="invalid-feedback">
                      <p class="text-left pl-1 m-0">Gender cannot be blank</p>
                    </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-2">
                      <input type="date" class="form-control" name="birthdate" id="validationCustom03" required>
                      <div class="valid-feedback">
                        <p class="text-left pl-1 m-0">Looks good!</p>
                      </div>
                      <div class="invalid-feedback">
                        <p class="text-left pl-1 m-0">birthdate cannot be blank</p>
                      </div>
                    </div>
                    
                    <div class="col-md-6 mb-2">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="address" name="address" id="address" required>
                        <i class="fa fa-check-circle check check-signup"></i>
                        <i class="fa fa-exclamation-circle exclamation exclamation-signup"></i>
                        <!-- <div class="valid-feedback">
                          <p class="text-left pl-1 m-0">Looks good!</p>
                        </div>
                        <div class="invalid-feedback">
                          <p class="text-left pl-1 m-0">Address cannot be blank</p>
                        </div> -->
                        <small>Error Message</small>
                      </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-2 mt-2" style="width: 100%;">
                        <select class="custom-select" id="validationCustom04" name="country" required>
                          <option value="Ethiopia">Ethiopia</option>
                          <option value="USA">USA</option>
                        </select>
                        <div class="valid-feedback">
                          <p class="text-left pl-1 m-0">Looks good!</p>
                        </div>
                        <div class="invalid-feedback">
                          <p class="text-left pl-1 m-0">Country cannot be blank</p>
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-2">
                      <div class="form-group">
                          <input type="text" class="form-control" placeholder="region" name="region" id="region" required>
                          <i class="fa fa-check-circle check check-signup"></i>
                          <i class="fa fa-exclamation-circle exclamation exclamation-signup"></i>
                          <!-- <div class="valid-feedback">
                            <p class="text-left pl-1 m-0">Looks good!</p>
                          </div>
                          <div class="invalid-feedback">
                            <p class="text-left pl-1 m-0">Region cannot be blank</p>
                          </div> -->
                        <small>Error Message</small>
                      </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-2">
                      <div class="form-group">
                          <input type="password" class="form-control" placeholder="password" name="password" id="passwordSignup" required>
                          <i class="fa fa-check-circle check check-signup"></i>
                          <i class="fa fa-exclamation-circle exclamation exclamation-signup"></i>
                          <!-- <div class="valid-feedback">
                            <p class="text-left pl-1 m-0">Looks good!</p>
                          </div>
                          <div class="invalid-feedback">
                            <p class="text-left pl-1 m-0">password cannot be blank</p>
                          </div> -->
                          <p class="p-0 m-0" id="passwordStrengthLabel">checking strength...</p>
                          <small id="passwordError">Error Message</small>
                        </div>
                      </div>
                    
                      <div class="col-md-6 mb-2">
                        <div class="form-group">
                          <input type="password" class="form-control" placeholder="Confirm Password" name="conform_password" id="passwordConfirm" required>
                          <i class="fa fa-check-circle check check-signup"></i>
                          <i class="fa fa-exclamation-circle exclamation exclamation-signup"></i>
                          <!-- <div class="valid-feedback">
                            <p class="text-left pl-1 m-0">Looks good!</p>
                          </div>
                          <div class="invalid-feedback">
                            <p class="text-left pl-1 m-0">password cannot be blank</p>
                          </div> -->
                          <small>Error Message</small>
                        </div>
                        <p class="text-left p-1 m-0 test" id="test">Password not match</p>
                      </div>
                      
                </div>
                <p class="text-center text-danger signup-error p-0 m-0 pb-2">Please fill all inputs</p>
                <button type="submit" name="signup">Sign up</button>
                <a href="#">Aleary have an account?</a>
              </form>
        </div>
        <div class="form-container sign-in-container">
            <h1 class="text-center mb-4">Sign in</h1>
            <form class="needs-validation mb-5" id="login" novalidate method="post">
              <p class="text-left text-danger p-0 m-0 hidden" >Please enter correct email and password</p>
                <div class="form-group">
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" aria-describedby="emailHelp" required>
                    <i class="fa fa-check-circle check check-login"></i>
                    <i class="fa fa-exclamation-circle exclamation exclamation-login"></i>
                    <small>Error Message</small>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="password" name="password" id="password" required>
                    <i class="fa fa-check-circle check check-login"></i>
                    <i class="fa fa-exclamation-circle exclamation exclamation-login"></i>
                    <small>Error Message</small>
                </div>
                <a href="#" class="text-right" id="d">Forget your password?</a>
                <div class="btn-parent d-flex justify-content-center">
                    <button type="submit" name="signin">Signin</button>
                </div>
              </form>     
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>
                        To Keep Connected with us please login with your personal info
                    </p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, There!</h1>
                    <p>Enter your personal details and start shopping</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
echo "<script>";
include "js/validation.js"; 
echo "</script>";
include "includes/footer.php"; 
ob_end_flush();
?>
