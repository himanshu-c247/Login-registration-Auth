<?php
include 'header.php';
if (!isset($_SESSION["user_name"])) {
    header('location:login.php');
}
include 'conn.php';
$id = $_GET['id'];
// print_r($id);die;
$uid = $_SESSION["id"];
$qry = mysqli_query($conn, "SELECT * FROM product WHERE id='$id'");
$data = mysqli_fetch_array($qry);
// select query
// print_r($id);die;
if (isset($_POST['submit'])) {
    $product_name = $_POST['product_name'];
    // print_r($id);die;
    // print_r( $product_name );die; 
    $files = $_FILES['file'];
    // print_r($product_name);
    $filename = $files['name'];
    // echo "<br>";
    // print_r($filename);
    $fileerror = $files['error'];
    $filetemp = $files['tmp_name'];
    $fileext = explode('.', $filename);
    $filecheck = strtolower(end($fileext));
    $fileextstored = array('png', 'jpg', 'jpeg');

    if (in_array($filecheck, $fileextstored)) {
        $destinationfile = 'upload/' . $filename;
        move_uploaded_file($filetemp, $destinationfile);
        // $q ="UPDATE `product` SET `product_name`='$product_name', `image`='$destinationfile',`user_id`='$uid' WHERE `id`='$id'";
        // print_r($id);
        // die;
        $query = mysqli_query($conn, "UPDATE `product` SET `product_name`='$product_name', `image`='$destinationfile',`user_id`='$uid' WHERE `id`='$id'");
        header("location:productlist.php");
    }
}

?>
<div class="container mt-5 ">
    <div class="row">
        <div class="container col-lg-3"></div>
        <div class="container col-lg-6" style="border: double;padding: 27px;">
            <a href="productlist.php" style="float: right;"><i class="fa fa-list"></i></a>
            <center>
                <h2> <b>Add Product</b></h2>
            </center>

            <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="">
                <div class="form-group">
                    <label class="control-label col-sm-5" for="product_name">Product Name:</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="product_name" pattern="[a-zA-Z\s]+" id="product_name" placeholder="Enter Product Name" value="<?php echo $data['product_name'] ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-5" for="email">Product Image:</label>
                    <div class="col-sm-12">
                        <input type="file
                        " class="form-control" value="<?php echo $data['image'] ?>" style="padding: 0.4rem 1rem;" id="file" name="file">
                        <!-- <img src="<?php echo $data['image'] ?>" width="70" height="50" alt=""> -->
                    </div>
                </div>
                <div class="form-group mt-4">
                    <div class="col-sm-offset-2 col-sm-12">
                        <center> <button type="submit" name="submit" class="btn btn-primary">Submit</button></center>
                    </div>
                </div>

            </form>
        </div>
        <div class="container col-lg-3"></div>
    </div>
</div>



<?php include 'footer.php' ?>