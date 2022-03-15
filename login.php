<?php

include 'header.php';
if (isset($_SESSION["user_name"])) {
    header('location:home.php');
  }
include 'conn.php';
// if (isset($_POST['submit'])) {
//     $email = $_POST['email'];
//     $password = md5($_POST['password']);
//     $emailquery = " select * from users where email = '$email' && password ='$password'";
//     // print_r($emailquery);
//     $query = mysqli_query($conn, $emailquery);
//     $email_count = mysqli_num_rows($query);

// if ($email_count) {
//     $email_pass = mysqli_fetch_assoc($query);
//     $db_pass = $email_pass['password'] ;
//     $db_name = $email_pass['user_name'];
//     print_r($db_name);
//     $pass_decode = password_verify($password,$db_pass);
//     if ($pass_decode) {
//         echo "login successful!";
//             // header("Location: welcome.php");
//         } else {
//             echo "password Incorrect!";
//         }
//     } else {
//         echo "Invalid Email";
//     }
// }
if (isset($_POST["email"], $_POST["password"])) {

    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    $result1 = mysqli_query($conn, "SELECT * FROM users WHERE email = '" . $email . "' AND  password = '" . $password . "'");
    $email_count = mysqli_num_rows($result1);

    if ($email_count > 0) {
        $email_pass = mysqli_fetch_assoc($result1);
        $_SESSION["logged_in"] = true;
        $_SESSION["email"] = $email_pass['email'];
        $_SESSION["user_name"] = $email_pass['user_name'];
        $_SESSION["id"] = $email_pass['id'];
        // print_r( $_SESSION["id"]);die;

        header("location: home.php");
    } else {

        echo '<script>alert("The Email or Password are incorrect!")</script>';
    }
}

?>
<div class="container mt-5 ">
    <div class="row">
        <div class="container col-lg-3"></div>
        <div class="container col-lg-6" style="border: double;padding: 27px;">
            <center>
                <h2> <b>Login</b></h2>
            </center>
            <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email:</label>
                    <div class="col-sm-12">
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="password">Password:</label>
                    <div class="col-sm-12">
                        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                    </div>
                </div>


                <div class="form-group mt-4">
                    <div class="col-sm-offset-2 col-sm-12">
                        <center> <button type="submit" class="btn btn-primary">Submit</button></center>
                    </div>
                </div>
                <div class="p-t-15 mt-4">
                        <center>
                            <p>Don't Have an Account? &nbsp;<a href="registration.php" style="color: blue;"><b> SignUp </b></a> </p>
                        </center>
                    </div>
            </form>
        </div>
        <div class="container col-lg-3"></div>
    </div>
</div>



<?php include 'footer.php' ?>