<?php
include('security1.php');


if(isset($_POST['discountbtn']))
{
    $discount_code = $_POST['discount_code'];
    $discount_price = $_POST['discount_price'];
   
    $connection = mysqli_connect("localhost","u274592685_root","Reset@123","u274592685_birthdaybash");

    $query = "INSERT INTO discount_coupon (discount_code,discount_price) VALUES ('$discount_code','$discount_price')";
    $query_run = mysqli_query($connection, $query);
    
    if($query_run)
    {
        // echo "Saved";
        $_SESSION['status'] = "Discount Coupon Added";
        $_SESSION['status_code'] = "success";
        header('Location: discount.php');
    }
    else 
    {
        $_SESSION['status'] = "Discount Coupon Not Added";
        $_SESSION['status_code'] = "error";
        header('Location: discount.php');  
    }
}
        

if(isset($_POST['updatebtn']))
{   
    $id = $_POST['edit_id'];
    $discount_code = $_POST['edit_discount_code'];
    $discount_price = $_POST['edit_discount_price'];

    $connection = mysqli_connect("localhost","u274592685_root","Reset@123","u274592685_birthdaybash");

    $query = "UPDATE discount_coupon SET discount_code='$discount_code', discount_price='$discount_price' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: discount.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: discount.php'); 
    }
}


if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM discount_coupon WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Coupon has been succefully Removed";
        $_SESSION['status_code'] = "success";
        header('Location: discount.php'); 
    }
    else
    {
        $_SESSION['status'] = "Coupon is not Removed";
        $_SESSION['status_code'] = "error";
        header('Location: discount.php'); 
    }
}


?>
