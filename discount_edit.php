<?php
include('security1.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  
  <div class="card-body">
<?php

$connection = mysqli_connect("localhost","u274592685_root","Reset@123","u274592685_birthdaybash");

if(isset($_POST['edit_btn']))
{
    $id = $_POST['edit_id'];
    
    $query = "SELECT * FROM discount_coupon WHERE id = '$id' ";
    $query_run = mysqli_query($connection,$query);

    foreach($query_run as $row)
    {
        ?>

          <form action="codediscount.php" method="POST">
                
              <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>" >
              
              <div class="form-group">
                  <label> Discount Code </label>
                  <input type="text" name="edit_discount_code" value="<?php echo $row['discount_code'] ?>" class="form-control" placeholder="Enter Discount Code">
              </div>
              <div class="form-group">
                  <label>Discount Price</label>
                  <input type="text" name="edit_discount_price" value="<?php echo $row['discount_price'] ?>" class="form-control" placeholder="Enter Discount Price">
              </div>
           

              <a href="discount.php" class="btn btn-danger" > CANCEL  </a>
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
