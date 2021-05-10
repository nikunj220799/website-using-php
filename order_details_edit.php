<?php
include('security1.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> EDIT Order Details </h6>
  </div>
  <div class="card-body">
<?php

$connection = mysqli_connect("localhost","u274592685_root","Reset@123","u274592685_birthdaybash");

if(isset($_POST['edit_btn']))
{
    $order_id = $_POST['edit_id'];
    
    $query = "SELECT * FROM customer_details WHERE order_uid = '$order_id' ";
    $query_run = mysqli_query($connection,$query);

    foreach($query_run as $row)
    {
        ?>

          <form action="codeorder.php" method="POST">
                
              <input type="hidden" name="edit_id" value="<?php echo $row['order_uid'] ?>" >
              
              <div class="form-group">
                  <label> First Name </label>
                  <input type="text" name="edit_fname" value="<?php echo $row['fname'] ?>" class="form-control" placeholder="Enter First Name">
              </div>
              <div class="form-group">
                  <label> Last Name </label>
                  <input type="text" name="edit_lname" value="<?php echo $row['lname'] ?>" class="form-control" placeholder="Enter Last Name">
              </div>
              <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="edit_email" value="<?php echo $row['email'] ?>" class="form-control" placeholder="Enter Email">
              </div>
              <div class="form-group">
                  <label> Address </label>
                  <input type="text" name="edit_address" value="<?php echo $row['address'] ?>" class="form-control" placeholder="Enter Address">
              </div>
              <div class="form-group">
                  <label> City </label>
                  <input type="text" name="edit_city" value="<?php echo $row['city'] ?>" class="form-control" placeholder="Enter City">
              </div>
              <div class="form-group">
                  <label> State </label>
                  <input type="text" name="edit_state" value="<?php echo $row['state'] ?>" class="form-control" placeholder="Enter State">
              </div>
              <div class="form-group">
                  <label> Zipcode </label>
                  <input type="text" name="edit_zipcode" value="<?php echo $row['zipcode'] ?>" class="form-control" placeholder="Enter Zipcode">
              </div>
              <div class="form-group">
                  <label> Phone </label>
                  <input type="text" name="edit_phone" value="<?php echo $row['phone'] ?>" class="form-control" placeholder="Enter Phone">
              </div>

              <a href="register.php" class="btn btn-danger" > CANCEL  </a>
              <button type="submit" name="updatebtn" class="btn btn-primary"> Update </button>

          </form>
    <?php
    }
}
?>
  </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/script.php');
include('includes/footer.php');
?>
