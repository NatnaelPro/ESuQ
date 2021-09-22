<?php
    include "includes/header.php";
    $user_id = $_SESSION['user-id'];
    // SESSION_START();
?>
<style>
    h1{
        font-family: sans-serif;
    }
    #profile-box{
  width: 50%;
  margin: auto;
  border: 1px solid rgb(222, 224, 224);
}

#profile-box .title{
  font-weight: bold;
}

#profile-box .save-btn{
  width: 80px;
  background-color: rgb(222, 224, 224);
  color: black;
  border-color: rgb(222, 224, 224);
}

#profile-box .cell{
  border-bottom: 1px solid rgb(222, 224, 224);
}
#profile-box a{
    color: black;
    text-decoration: none;
}

#profile-box #error-messages1{
    display: none;
}

#profile-box #error-messages2{
    display: none;
}
</style>

<?php
if(isset($_GET['attribute'])){
    if($_GET['attribute'] == "first_name"){
        ?>
        <h1 class="text-center mt-3">Change Your First Name</h1>
<div id="profile-box" class="mt-3 p-5">
    <p>Make sure to click <span class="title">save changes </span>button when you're done</p>
    <form action="" method="post">
        <label for="name"> <span class="title">New Name</span></label> <br>
        <input type="text" class="mb-3" name="first_name"> <br>
        <button class="save-changes-btn btn btn-success" type="submit" name="save_change">Save Changes</button>
    </form>
</div>
        <?php
        if(isset($_POST['save_change'])){
            $first_name = $_POST['first_name'];
            $query = "UPDATE user SET first_name = '$first_name' WHERE id = $user_id";
            $query_result = mysqli_query($connection, $query);
            check_query_success($query_result);
            header('location:vendor_profile.php');
        }
    }
    if($_GET['attribute'] == "last_name"){
        ?>
        <h1 class="text-center mt-3">Change Your last Name</h1>
    <div id="profile-box" class="mt-3 p-5">
        <p>Make sure to click <span class="title">save changes </span>button when you're done</p>
        <form action="" method="post">
            <label for="name"> <span class="title">New Name</span></label> <br>
            <input type="text" class="mb-3" name="last_name"> <br>
            <button class="save-changes-btn btn btn-success" name="save_change">Save Changes</button>
        </form>
    </div>
        <?php
         if(isset($_POST['save_change'])){
            $last_name = $_POST['last_name'];
            $query = "UPDATE user SET last_name = '$last_name' WHERE id = $user_id";
            $query_result = mysqli_query($connection, $query);
            check_query_success($query_result);
            header('location:vendor_profile.php');
        }
    }

    if($_GET['attribute'] == "email"){
        ?>
            <h1 class="text-center mt-3">Change Your Email address</h1>
            <div id="profile-box" class="mt-3 p-5">
                <p> <span class="title"> Current email address : </span> <span>NatnaelSmith@gmail.com</span> </p>
                <p>Enter the new email address you would like change</p>
                <form action="" method="post">
                    <label for="name"> <span class="title">New email address</span></label> <br>
                    <input type="text" class="mb-3" name="email"> <br>
                    <button class="save-changes-btn btn btn-success" name="save_change">Save Changes</button>
                </form>
            </div>
        <?php
        if(isset($_POST['save_change'])){
            $email = $_POST['email'];
            $query = "UPDATE user SET email = '$email' WHERE id = $user_id";
            $query_result = mysqli_query($connection, $query);
            check_query_success($query_result);
            header('location:vendor_profile.php');
        }
    }

    if($_GET['attribute'] == "username"){
        ?>
        <h1 class="text-center mt-3">Change Your username</h1>
    <div id="profile-box" class="mt-3 p-5">
        <p>Make sure to click <span class="title">save changes </span>button when you're done</p>
        <form action="" method="post">
            <label for="name"> <span class="title">New username</span></label> <br>
            <input type="text" class="mb-3" name="username"> <br>
            <button class="save-changes-btn btn btn-success" name="save_change">Save Changes</button>
        </form>
    </div>
        <?php
        if(isset($_POST['save_change'])){
            $username = $_POST['username'];
            $query = "UPDATE user SET username = '$username' WHERE id = $user_id";
            $query_result = mysqli_query($connection, $query);
            check_query_success($query_result);
            header('location:vendor_profile.php');
        }
    }

    if($_GET['attribute'] == "phone_number"){
        ?>
        <h1 class="text-center mt-3">Change Your mobile phone number</h1>
    <div id="profile-box" class="mt-3 p-5">
        <p>Make sure to click <span class="title">save changes </span>button when you're done</p>
        <form action="" method="post">
            <label for="name"> <span class="title">New mobile phone number</span></label> <br>
            <input type="text" class="mb-3" name="phone_number"> <br>
            <button class="save-changes-btn btn btn-success" name="save_change">Save Changes</button>
        </form>
    </div>
        <?php
        if(isset($_POST['save_change'])){
            $phone_number = $_POST['phone_number'];
            $query = "UPDATE user SET phone = '$phone_number' WHERE id = $user_id";
            $query_result = mysqli_query($connection, $query);
            check_query_success($query_result);
            header('location:vendor_profile.php');
        }
    }

    if($_GET['attribute'] == "password"){
        ?>
        <h1 class="text-center mt-3">Change password</h1>
        <div id="profile-box" class="mt-3 p-5">
            <p>Make sure to click <span class="title">save changes </span>button when you're done</p>
            <form action="" method="post">
                <label for="name"> <span class="title">Current password:</span></label> <br>
                <input type="password" class="" name="current_password"> <br>
                <span class="text-danger" id="error-messages1">incorrect password</span> <br>
                <label for="name"> <span class="title">New password</span></label> <br>
                <input type="password" class="mb-3" name="new_password"> <br>
                <label for="name"> <span class="title">Reenter new password</span></label> <br>
                <input type="password" name="reenter_new_password"> <br>
                <span class="text-danger" id="error-messages2">The password aren't the same</span> <br>
                <button class="save-changes-btn btn btn-success mt-3" name="save_change">Save Changes</button>
            </form>
        </div>
        <?php
        if(isset($_POST['save_change'])){
            $current_password = $_POST['current_password'];
            $query = "SELECT password FROM user WHERE id = $user_id";
            $query_result = mysqli_query($connection, $query);
            check_query_success($query_result);
            $row = mysqli_fetch_assoc($query_result);
            if(password_verify($current_password, $row['password'])){
                $new_password = $_POST['new_password'];
                $reenter_new_password = $_POST['reenter_new_password'];
                if($new_password == $reenter_new_password){
                    $password = password_hash($new_password, PASSWORD_DEFAULT);
                    $query = "UPDATE user SET password = '$password' WHERE id = $user_id";
                    $query_result = mysqli_query($connection, $query);
                    check_query_success($query_result);
                    header('location:vendor_profile.php');
                }else{
                    ?>
                    <script>
                        document.getElementById('error-messages2').style.display = 'block';
                    </script>
                    <?php
                }
            }else{
                ?>
                <script>
                    document.getElementById('error-messages1').style.display = 'block';
                </script>
                <?php
            }
        }
    }
}
?>
<?php include "includes/footer.php"; ?>