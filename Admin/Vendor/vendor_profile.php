<?php
    include "includes/header.php";
    //session_start();
    if(isset($_SESSION['user-id'])){
        // echo "hello " . $_SESSION['user-id'] . "<br>";
        // echo "<a href='logout.php?logout'>Logout</a>";
        //cho "profile";
        $user_id = $_SESSION['user-id'];
        $query = "SELECT * FROM user WHERE id = $user_id";
        $query_result = mysqli_query($connection, $query);
        check_query_success($query_result);
        $row = mysqli_fetch_assoc($query_result);
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
        </style>
        <h1 class="text-center pt-3">Customer Profile</h1>
    <div id="profile-box">
        <div class="py-2">
            <div class="clearfix mb-3 cell px-3 py-2">
                <div class="float-left">
                    <span class="title">First Name:</span><br>
                <span><?php echo $row['first_name'];?></span>
                </div>
               <a href="./Edit_Profile.php?attribute=first_name"> <button class="btn btn-primary float-right save-btn">Edit</button></a>
            </div>

            <div class="clearfix mb-3 cell px-3 py-2">
                <div class="float-left">
                    <span class="title">Last Name:</span><br>
                <span><?php echo $row['last_name'];?></span>
                </div>
                 <a href="./Edit_Profile.php?attribute=last_name"><button class="btn btn-primary float-right save-btn">Edit</button></a>
            </div>

            <div class="clearfix mb-3 cell px-3 py-2">
                <div class="float-left">
                    <span class="title">Email:</span><br>
                <span><?php echo $row['email'];?></span>
                </div>
                <a href="./Edit_Profile.php?attribute=email"><button class="btn btn-primary float-right save-btn">Edit</button></a>
            </div>

            <div class="clearfix mb-3 cell px-3 py-2">
                <div class="float-left">
                    <span class="title">Username:</span><br>
                <span><?php echo $row['username'];?></span>
                </div>
                <a href="./Edit_Profile.php?attribute=username"><button class="btn btn-primary float-right save-btn">Edit</button></a>
            </div>

            <div class="clearfix mb-3 cell px-3 py-2">
                <div class="float-left">
                    <span class="title">Mobile Phone Number:</span><br>
                <span><?php echo $row['phone'];?></span>
                </div>
                <a href="./Edit_Profile.php?attribute=phone_number"><button class="btn btn-primary float-right save-btn">Edit</button></a>
            </div>

            <div class="clearfix mb-3 cell px-3 py-2" style="border:0;">
                <div class="float-left">
                    <span class="title">Password: </span><br>
                <span>********</span>
                </div>
                <a href="./Edit_Profile.php?attribute=password"><button class="btn btn-primary float-right save-btn">Edit</button></a>
            </div>
        </div>
    </div>
        <?php
    }else{
        header('location:index.php');
    }
?>
<?php include "includes/footer.php"; ?>