<?php
include('security1.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> Edit Product Details </h6>
  </div>
  <div class="card-body">
<?php


if(isset($_POST['edit_btn']))
{
    $product_id = $_POST['edit_product_id'];
    
    $query = "SELECT * FROM product WHERE product_id = '$product_id' ";
    $query_run = mysqli_query($connection,$query);

    foreach($query_run as $row)
    {
        ?>

          <form action="codeproduct.php" method="POST" enctype="multipart/form-data">
                
              <input type="hidden" name="edit_product_id" value="<?php echo $row['product_id'] ?>" >
              
              <div class="form-group">
                  <label> Product Name </label>
                  <input type="text" name="edit_name" value="<?php echo $row['product_name'] ?>" class="form-control" placeholder="Enter Product Name">
              </div>
              <div class="form-group">
                  <label>Brand</label>
                  <input type="text" name="edit_brand" value="<?php echo $row['product_brand'] ?>" class="form-control" placeholder="Enter Brand">
              </div>
              <div class="form-group">
                  <label>Price</label>
                  <input type="text" name="edit_price" value="<?php echo $row['product_price'] ?>" class="form-control" placeholder="Enter Price">
              </div> 
              <div class="form-group">
                  <label>Discounted Price</label>
                  <input type="text" name="edit_discount_price" value="<?php echo $row['discount_price'] ?>" class="form-control" placeholder="Enter Discounted Price">
              </div>
              <div class="form-group">
                  <label>Upload Image</label>
                  <input type="file" name="edit_image" id="product_image" value="<?php echo $row['product_image'] ?>" class="form-control" placeholder="Change Image">
              </div>
              <div class="form-group">
                  <label>Enter Link</label>
                  <input type="text" name="edit_link" value="<?php echo $row['link'] ?>" class="form-control" placeholder="Enter Link to Video">
              </div>
              <div class="form-group">
                  <label>Quantity</label>
                  <input type="text" name="edit_quantity" value="<?php echo $row['product_quantity'] ?>" class="form-control" placeholder="Enter Quantity">
              </div>
              
              <label>Product Category </label>
                <select class="form-control" name="edit_category"> 
                  <option value="<?php echo $row['product_category'] ?>"><?php echo $row['product_category'] ?></option>
                  <option value="Gifts">Gifts</option>
                  <option value="Return Gifts  ">Return Gifts</option>
                  <option value="Board Games">Board Games</option>
                  <option value="Decorations">Decorations</option>
                  <option value="Accessories">Accessories</option>
                  <option value="Education">Education</option>
                </select>
                <br>

                <label>Product Sub-Category </label>
                <input type="text" name="edit_sub_category" class="form-control " value="<?php echo $row['product_sub_category'] ?>" placeholder="Enter sub-category">
                <br>

                <label>Best Seller </label>
                <select class="form-control" name="edit_best_seller">
                  <option value="<?php echo $row['best_seller'] ?>"><?php echo $row['best_seller'] ?></option>
                  <option value="0">No</option>
                  <option value="1">Yes</option>
                </select>
                <br>
            
              <a href="add_products.php" class="btn btn-danger" > CANCEL  </a>
              <button type="submit" name="updatebtn" class="btn btn-primary float-right"> Update </button>

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
