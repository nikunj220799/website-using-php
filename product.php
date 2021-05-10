<?php
include('security1.php');
include('includes/header.php');
include('includes/navbar.php');
?>



<div class="container-fluid">

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> PRODUCT DETAILS </h6>
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
    <form action="codeproduct.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
        
            <div class="form-group">
                <label>Product Name </label>
                <input type="text" name="product_name" class="form-control" placeholder="Enter product name" required >
            </div>
            <div class="form-group">
                <label>Product Brand </label>
                <input type="text" name="product_brand" class="form-control " placeholder="Enter brand name" required>
            </div>
            <div class="form-group">
                <label>Product Price </label>
                <input type="text" name="product_price" class="form-control" placeholder="Enter price" required>
            </div><div class="form-group">
                <label>Discount Price </label>
                <input type="text" name="discount_price" class="form-control" placeholder="Enter discounted price">
            </div>
            <div class="form-group">
                <label>Product Image </label>
                <input type="file" name="product_image" id="product_image" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Product Quantity </label>
                <input type="text" name="product_quantity" class="form-control" placeholder="Enter quantity" required>
            </div>
            <div class="form-group">
                <label>How To Play[VIDEO LINK] </label>
                <input type="text" name="link" class="form-control" placeholder="Paste Link">
            </div>
            <div class="form-group">
                <label>Product Category </label><tab>
                <select class="form-control" name="product_category">
                <option value="">-- Select --</option>
                <option value="Gifts">Gifts</option>
                <option value="Return Gifts">Return Gifts</option>
                <option value="Board Games">Board Games</option>
                <option value="Decorations">Decorations</option>
                <option value="Accessories">Accessories</option>
                <option value="Education">Education</option>

                </select>
            </div>
            <div class="form-group">
                <label>Product Sub-Category </label>
                <input type="text" name="product_sub_category" class="form-control " placeholder="Enter sub-category" required>
            </div>
            <div class="form-group">
                <label>Best Seller</label>
                <select class="form-control" name="best_seller">
                <option value="">-- Select --</option>
                <option value="0">No</option>
                <option value="1">Yes</option>
               </select>
            </div>

        <div class="modal-footer">
            <button type="submit" name="productbtn" class="btn btn-primary">Save</button>
        </div>
        </div>
    </form>
  <div>
</div>

<?php
include('includes/script.php');
include('includes/footer.php');
?>
