<?php 
include('includes/header.php');
include('includes/navbar.php');
?>


  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

  
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
      <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Registered Admin</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

                <?php
                 
                  $connection = mysqli_connect("localhost","u274592685_admin","Reset@123","u274592685_adminpanel");
                  $query = "SELECT id FROM register ORDER BY id";  
                  $query_run = mysqli_query($connection, $query);

                  $row = mysqli_num_rows($query_run);

                  echo '<h4>Admin: '.$row.'</h4>';
                ?>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                 $total_price = '0';
                 $connection = mysqli_connect("localhost","u274592685_root","Reset@123","u274592685_birthdaybash");
                 $query = "SELECT price FROM order_detail order by price";  
                 $query_run = mysqli_query($connection, $query);
                  foreach($query_run as $row){
                  $total_price = $total_price + $row['price'];
                  }
                 echo '<h4> ₹ '.$total_price.'</h4>';
               ?>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-rupee-sign fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Order</div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                    <?php
                 
                      $connection = mysqli_connect("localhost","u274592685_root","Reset@123","u274592685_birthdaybash");
                      $query = "SELECT id FROM customer_details ORDER BY id";  
                      $query_run = mysqli_query($connection, $query);

                      $row = mysqli_num_rows($query_run);

                      echo '<h4>Orders: '.$row.'</h4>';
                    ?>
                    </div>
                  </div>
                  <div class="col">
                    <div class="progress progress-sm mr-2">
                      <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Pending Requests Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Customer Query</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                 
                 $connection = mysqli_connect("localhost","u274592685_root","Reset@123","u274592685_birthdaybash");
                 $query = "SELECT id FROM contact_us ORDER BY id";  
                 $query_run = mysqli_query($connection, $query);

                 $row = mysqli_num_rows($query_run);

                 echo '<h4> Mails: '.$row.'</h4>';
               ?>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-comments fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Content Row -->


  </div>
  <!-- /.container-fluid -->


  </div>
  <!-- End of Main Content -->
  




<?php
include('includes/script.php');
include('includes/footer.php');

?>






