<?php
include('security1.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="modal fade" id="discount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      
      <form action="codediscount.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> ID </label>
                <input type="text" name="id" class="form-control" placeholder="Enter Discount ID">
            </div>
            <div class="form-group">
                <label> Discount Code </label>
                <input type="text" name="discount_code" class="form-control" placeholder="Enter Discount Code">
            </div>
            <div class="form-group">
                <label>Discount Price</label>
                <input type="text" name="discount_price" class="form-control" placeholder="Enter Discount Price">
            </div>
            

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="discountbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>

<div class="container-fluid">

<!-- DataTables Example-->

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">DISCOUNT COUPON
       
    </h6>
  </div>
  <div class="card-body">

  <?php
    if(isset($_SESSION['success']) && $_SESSION['sucess']!='')
    {
        echo '<h2> '.$_SESSION['success'].' </h2>';
        unset($_SESSION['success']);
    }
    if(isset($_SESSION['status']) && $_SESSION['status']!='')
    {
        echo '<h2 class="bg-info"> '.$_SESSION['status'].' </h2>';
        unset($_SESSION['status']);
    }
  ?>
    <div class="table-responsive">

    <?php
        $connection = mysqli_connect("localhost","u274592685_root","Reset@123","u274592685_birthdaybash");
        
        $query = "SELECT * FROM discount_coupon ORDER BY id ASC";
        $query_run = mysqli_query($connection, $query);

    ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID </th>
            <th>DISCOUNT CODE </th>
            <th>DISCOUNT PRICE </th>
            <th>EDIT</th>
            <th>DELETE</th>
          </tr>
        </thead>
        <tbody>
        <?php
          if(mysqli_num_rows($query_run) > 0)
          {
            while($row = mysqli_fetch_assoc($query_run))
            {
                ?>

          <tr>
            <td><?php echo $row['id']; ?> </td>
            <td><?php echo $row['discount_code']; ?>  </td>
            <td><?php echo $row['discount_price']; ?>  </td>
            <td>
              <form action="discount_edit.php" method="post">
                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?> ">
                <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
              </form>
            </td>
            <td>
                <form action="codediscount.php" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
          </tr>

          <?php
            }
          }
          else{
            echo "No Record Found";
          }
          ?>

        </tbody>
      </table>
    </div>
  <div>
</div>

<?php
include('includes/script.php');
include('includes/footer.php');
?>
