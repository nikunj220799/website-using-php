<?php
include('security1.php');

if(isset($_POST['search_data']))
{
    $product_id = $_POST['product_id'];
    $visible = $_POST['visible'];

    $query = "UPDATE product SET visible ='$visible' WHERE product_id = '$product_id' ";
    $query_run = mysqli_query($connection,$query);

}

if(isset($_POST['delete_multiple_data']))
{
    $product_id = "1";

    $check_query = "SELECT * FROM product WHERE visible='$product_id' ";
    $check_query_run = mysqli_query($connection, $check_query);
    
    foreach($check_query_run as $rows)
    {
        if($img_path = "upload/".$rows['product_image'])
        {
            $query = "DELETE FROM product WHERE visible='$product_id' ";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                unlink($img_path);
                $_SESSION['status'] = "Your Data is Deleted";
                header('Location: add_products.php'); 
            }
            else
            {
                $_SESSION['status'] = "Your Data is NOT DELETED";       
                header('Location: add_products.php'); 
            }
        }
    }
}


if(isset($_POST['productbtn']))
{
    $product_name = $_POST['product_name'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $discount_price = $_POST['discount_price'];
    $product_image = $_FILES["product_image"]['name'];
    $link = $_POST['link'];
    $product_category = $_POST['product_category'];
    $product_sub_category = $_POST['product_sub_category'];
    $product_quantity = $_POST['product_quantity'];
    $best_seller = $_POST['best_seller'];
    
    if(file_exists("upload/" .$_FILES["product_image"]["name"]))
    {
        $target = "upload/".basename($_FILES["product_image"]["name"]);
        $product_image = $_FILES['product_image']['name'];
        $_SESSION['status'] = "Image Already Exists. ' .$target.'";
        header('Location: add_products.php');
    }
    
    else
    {    
        if($discount_price == NULL){
            $discount_status = '0';
        }
        else{
            $discount_status = '1';
        }
        
        $query = "INSERT INTO product (product_name,product_brand,product_price,discount_price,product_image,link,product_category,product_sub_category,product_quantity,discount_status,best_seller) VALUES ('$product_name','$product_brand','$product_price','$discount_price','$product_image','$link','$product_category','$product_sub_category','$product_quantity','$discount_status','$best_seller') ";
        $query_run = mysqli_query($connection, $query);
        
        if($query_run)
        {
            move_uploaded_file($_FILES["product_image"]["tmp_name"], "upload/".$_FILES["product_image"]["name"]);
            // echo "Saved";
            $_SESSION['status'] = "Product Details Successfully Added";
            $_SESSION['status_code'] = "success";
            header('Location: add_products.php');
        }
        else 
        {
            $_SESSION['status'] = "Product Details Not Added";
            $_SESSION['status_code'] = "error";
            header('Location: add_products.php');  
        }
        
    }
    
}

if(isset($_POST['updatebtn']))
{
    $product_id = $_POST['edit_product_id'];
    $product_name = $_POST['edit_name'];
    $product_brand = $_POST['edit_brand'];
    $product_price = $_POST['edit_price'];
    $discount_price = $_POST['edit_discount_price'];
    $link = $_POST['edit_link'];
    $product_category = $_POST['edit_category'];
    $product_sub_category = $_POST['edit_sub_category'];
    $product_quantity = $_POST['edit_quantity'];
    $best_seller = $_POST['edit_best_seller'];
    
    $product_image = $_FILES['edit_image']['name'];

    $product_query = "SELECT * FROM product where product_id='$product_id' ";
    $product_query_run = mysqli_query($connection,$product_query);
    foreach($product_query_run as $p_row) 
    {
        //echo $p_row['product_image'];
        if($product_image == NULL)
        {
            //update with existing image
            $image_data = $p_row['product_image'];
        }
        else
        {
            //update new image and delete old image
            if($img_path = "upload/".$p_row['product_image'])
            {
                unlink($img_path);
                $image_data = $product_image;
            }
        }
    }
    if($discount_price == NULL){
        $discount_status = '0';
    }
    else{
        $discount_status = '1';
    }

        $query = "UPDATE product SET product_name='$product_name', product_brand='$product_brand', product_price='$product_price', discount_price='$discount_price', product_image='$image_data',link='$link',product_category='$product_category',product_sub_category='$product_sub_category',product_quantity='$product_quantity',discount_status='$discount_status',best_seller='$best_seller' WHERE product_id='$product_id' ";
        $query_run = mysqli_query($connection, $query);
        

        if($query_run)
        {
            if($product_image == NULL)
            {
                //update with existing image
                $_SESSION['status'] = "Data Updated with existing image";
                header('Location: add_products.php'); 
            }
            else
            {
                //update new image and delete old image
                move_uploaded_file($_FILES["edit_image"]["tmp_name"], "upload/".$_FILES["edit_image"]["name"]);
                $_SESSION['status'] = "Data Updated";
                header('Location: add_products.php');
            
            }
        }
        else
        {
            $_SESSION['status'] = "Your Data is NOT Updated";
            $_SESSION['status_code'] = "error";
            header('Location: add_products.php'); 
        }
}


if(isset($_POST['delete_btn']))
{
    $product_id = $_POST['delete_product_id'];

    $check_query = "SELECT * FROM product WHERE product_id='$product_id' ";
    $check_query_run = mysqli_query($connection, $check_query);
    foreach($check_query_run as $rows)
    {
        if($img_path = "upload/".$rows['product_image'])
        {
            $query = "DELETE FROM product WHERE product_id='$product_id' ";
            $query_run = mysqli_query($connection, $query);
        
            if($query_run)
            {
                unlink($img_path);
                $_SESSION['status'] = "Your Data is Deleted";
                header('Location: add_products.php'); 
            }
            else
            {
                $_SESSION['status'] = "Your Data is NOT DELETED";       
                header('Location: add_products.php'); 
            }
        }

    }
}

?>

