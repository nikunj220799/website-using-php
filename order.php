<?php
include('security1.php');
include('includes/header.php');
include('includes/navbar.php');
$connection = mysqli_connect("localhost","u274592685_root","Reset@123","u274592685_birthdaybash");

?>


<div class="container-fluid">

<!-- DataTables Example-->

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">ORDER MASTER
       
    </h6>
  </div>
  <div class="card-body">
  <?php
    if(isset($_SESSION['status']) && $_SESSION['status']!='')
    {
        echo '<h2 class="bg-primary text-white"> '.$_SESSION['status'].' </h2>';
        unset($_SESSION['status']);
    }
    if(isset($_SESSION['status']) && $_SESSION['status']!='')
    {
        echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
        unset($_SESSION['status']);
    }
  ?>
    <div class="table-responsive">

    <?php
        $connection = mysqli_connect("localhost","u274592685_root","Reset@123","u274592685_birthdaybash");
        
        $query = "SELECT * FROM order_detail ORDER BY id ASC";
        $query_run = mysqli_query($connection, $query);

    ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID </th>
            <th>ORDER ID </th>
            <th>PRODUCT ID </th>
            <th>PRODUCT </th>
            <th>QUANTITY </th>
            <th>PRICE </th>
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
            <td><a href="order_details.php?order_id=<?php echo $row['order_id']?>">
            <?php echo $row['order_id']; ?></a> </td>
            <td><?php echo $row['product_id']; ?>  </td>
            <td><?php echo $row['product_name']; ?>  </td>
            <td><?php echo $row['quantity']; ?>  </td>
            <td>₹ <?php echo $row['price']; ?>  </td>
          
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

<style>
.mes{
    font-size:24px;
    margin-top:20px;
    text-align:center;
}
</style>

<?php
include('includes/script.php');
include('includes/footer.php');
?>
