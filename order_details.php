<?php
include('security1.php');
include('includes/header.php');
include('includes/navbar.php');
$connection = mysqli_connect("localhost","u274592685_root","Reset@123","u274592685_birthdaybash");
$order_id = $_GET['order_id'];
?>


<div class="container-fluid">

<!-- DataTables Example-->

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">ORDER MASTER
       
    </h6>
  </div>
  <div class="card-body">

    <div class="table-responsive">

    <?php
        $connection = mysqli_connect("localhost","u274592685_root","Reset@123","u274592685_birthdaybash");
        
        $query = "SELECT * FROM customer_details where order_uid='$order_id' ORDER BY id ASC";
        $query_run = mysqli_query($connection, $query);

    ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ORDER ID </th>
            <th>NAME </th>
            <th>EMAIL </th>
            <th>ADDRESS </th>
            <th>PHONE </th>
            <th>PAYMENT </th>
            <th>SHIPPING </th>
            <th>EDIT </th>
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
            <td><?php echo $row['order_uid']?></td>
            <td><?php echo $row['fname']; ?><br><?php echo $row['lname']; ?> </td>
            <td><?php echo $row['email']; ?>  </td>
            <td><?php echo $row['address']; ?><br>
                <?php echo $row['city']; ?><br>
                <?php echo $row['state']; ?><br>
                <?php echo $row['zipcode']; ?></td>
            <td><?php echo $row['phone']; ?>  </td>
            <td><?php echo $row['payments']; ?>  </td>
            <td><?php echo $row['shipping']; ?>  </td>
            <td>
              <form action="order_details_edit.php" method="post">
                <input type="hidden" name="edit_id" value="<?php echo $row['order_uid']; ?> ">
                <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
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
