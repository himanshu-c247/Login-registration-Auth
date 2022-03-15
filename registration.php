
<?php
include 'header.php';
if (isset($_SESSION["user_name"])) {
    header('location:home.php');
  }
include 'conn.php';

if (isset($_POST['submit'])) {
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $mobile_no = $_POST['mobile_no'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    // $pass = password_hash($password, PASSWORD_BCRYPT);
    // $cpass = password_hash($cpassword, PASSWORD_BCRYPT);


    $emailquery = "select * from users where email='$email'";
    $query = mysqli_query($conn, $emailquery);
    $emailcount = mysqli_num_rows($query);
    if ($emailcount > 0) {
?>

        <script>
            alert("email already exists!")
        </script>
        <?php
    } else {
        if ($password === $cpassword) {
            $insertquery = mysqli_query($conn, "INSERT INTO `users`( `user_name`, `email`, `mobile_no`, `password`,`cpassword`) VALUES('$user_name','$email','$mobile_no','$password ',' $cpassword')");



            if ($insertquery) {
        ?>
                <script>
                    alert("Inserted Successful!")
                    location.replace("login.php");
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert("not Inserted Successful!")
                </script>
            <?php

            }
        } else {
            ?>
            <script>
                alert("password are not matching!")
            </script>
<?php
        }
    }
}

?>
<div class="container mt-5 ">
    <div class="row">
        <div class="container col-lg-3"></div>
        <div class="container col-lg-6" style="border: double;padding: 27px;">
            <center>
                <h2> <b>Sign Up</b></h2>
            </center>
            <form class="form-horizontal" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <label class="control-label col-sm-5" for="Name">User Name:</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="user_name" pattern="[a-zA-Z\s]+" id="user_name" placeholder="Enter User Name" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-5" for="email">Email:</label>
                    <div class="col-sm-12">
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-5" for="mobile_no">Mobile No:</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="mobile_no" placeholder="Enter email" name="mobile_no" pattern="[7-9]{1}[0-9]{9}" title="Phone number with 7-9 and remaing 9 digit with 0-9" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-5" for="password">Password:</label>
                    <div class="col-sm-12">
                        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-5" for="cpassword">Confirm Password:</label>
                    <div class="col-sm-12">
                        <input type="password" class="form-control" id="pwd" placeholder="Re-Enter Your password" name="cpassword" required>
                    </div>
                </div>


                <div class="form-group mt-4">
                    <div class="col-sm-offset-2 col-sm-12">
                        <center> <button type="submit" name="submit" class="btn btn-primary">Submit</button></center>
                    </div>
                    <div class="p-t-15 mt-4">
                        <center>
                            <p>Have an account? &nbsp;<a href="login.php" style="color: blue;"><b> Login </b></a> </p>
                        </center>
                    </div>

                </div>
            </form>
        </div>
        <div class="container col-lg-3"></div>
    </div>
</div>



<?php include 'footer.php' ?>