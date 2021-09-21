<?php include "includes/header.php"; 
    if(isset($_POST['signin'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        if($email != '' && $password != ''){
            $query = "SELECT * FROM user WHERE email = '$email'";
            $query_result = mysqli_query($connection, $query);
            check_query_success($query_result);
            while($row = mysqli_fetch_assoc($query_result)){ 
                if($row['email'] == $email && password_verify($password, $row['password'])){
                    $_SESSION['vendor-id'] = $row['id'];
        
                    if(!isset($_COOKIE['vendor'])){
                    setcookie('vendor', $row['id'], time() + (86400 * 365));
                    }
                    if($row['role'] == "vendor")
                    header('location:Admin/vendor/dashboard.php');
                    $flag = true;
                }
            }
        }
    }
?>
    <div class="container vendor-container mt-5">
        <div class="form-container">
            <h1 class="text-center mb-4">Sign in</h1>
            <form class="needs-validation mb-5" id="login" novalidate method="post">
              <p class="text-left text-danger pb-3 m-0 hidden" >Please enter correct email and password</p>
                <div class="form-group">
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" aria-describedby="emailHelp" required>
                    <i class="fa fa-check-circle text-success check-vendor"></i>
                    <i class="fa fa-exclamation-circle text-danger exclamation-vendor"></i>
                    <small class='text-danger'>Error Message</small>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="password" name="password" id="password" required>
                    <i class="fa fa-check-circle text-success check-vendor"></i>
                    <i class="fa fa-exclamation-circle text-danger exclamation-vendor"></i>
                    <small class='text-danger'>Error Message</small>
                </div>
                <a href="#" class="text-right" id="d">Forget your password?</a>
                <div class="btn-parent d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary" name="signin">Signin</button>
                </div>
                <a href="vendor_signup.php" class="text-center">Create new Account</a>
              </form>     
        </div>
    </div>
    
<?php include "includes/footer.php"; ?>