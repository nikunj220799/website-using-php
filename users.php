<?php
include('security1.php');
include('includes/header.php');
include('includes/navbar.php');
$connection = mysqli_connect("localhost","u274592685_root","Reset@123","u274592685_birthdaybash");

if(isset($_POST['submit']))
{
  $id = $_POST['delete_id'];

  $query = "DELETE FROM users WHERE id='$id' ";
  $query_run = mysqli_query($connection, $query);
  if($query_run)
    {
      ?>
      <div class="mes">
      <?php
      echo "Data has been deleted.";
      ?>
      </div>
      <?php    }
}

?>


<div class="container-fluid">

<!-- DataTables Example-->

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">USER PROFILE
       
    </h6>
  </div>
  <div class="card-body">

    <div class="table-responsive">

    <?php
        $connection = mysqli_connect("localhost","u274592685_root","Reset@123","u274592685_birthdaybash");
        
        $query = "SELECT * FROM users ORDER BY id ASC";
        $query_run = mysqli_query($connection, $query);

    ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID </th>
            <th>NAME </th>
            <th>EMAIL </th>
            <th>MOBILE NO.</th>
            <th>DATE </th>
            <th>DELETE </th>
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
            <td><?php echo $row['fname']; ?> <?php echo $row['lname']; ?>  </td>
            <td><?php echo $row['email']; ?>  </td>
            <td><?php echo $row['mobile']; ?>  </td>
            <td><?php echo $row['added_on']; ?>  </td>
            <td>
                <form method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                  <button type="submit" name="submit" class="btn btn-danger"> DELETE</button>
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
