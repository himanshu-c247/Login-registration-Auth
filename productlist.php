<?php


include "conn.php";
include 'header.php';
if (!isset($_SESSION["user_name"])) {
    header('location:login.php');
}
?>
<div class="container mt-5 ">
    <div class="row">
       
        <div class="container col-lg-12" style="border: double;padding: 27px;">
        <a href="addproduct.php" style="float: right;"><i class="fa fa-plus">Add</i></a>
            <center>
                <h2> <b>Products</b></h2>
            </center>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Image</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $id = $_SESSION["id"];
                $query= "SELECT * FROM product WHERE user_id = $id"; 
                // print_r( $query);


$records = mysqli_query($conn, $query);

while ($data = mysqli_fetch_array($records)) {
?>
                   <center> <tr>
                        <th scope="row"><?php echo $data['id'];?></th>
                        <td><?php echo $data['product_name']; ?></td>
                        <td><img src="<?php echo $data['image']; ?>" alt="" width="70" height="50"></td>
                        <td style="color:green"><a href="edit.php?id=<?php echo $data['id']; ?>">Edit</a></td>
                        <td style="color:green"><a href="delete.php?id=<?php echo $data['id']; ?>">Delete</a></td>
                    </tr></center>
                    <?php } ?>
                  
                </tbody>
            </table>
        </div>
        
    </div>
</div>