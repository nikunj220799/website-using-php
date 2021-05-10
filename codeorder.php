<?php
include('security1.php');

if(isset($_POST['updatebtn']))
{
    $order_id = $_POST['edit_id'];
    $fname = $_POST['edit_fname'];
    $lname = $_POST['edit_lname'];
    $email = $_POST['edit_email'];
    $address = $_POST['edit_address'];
    $city = $_POST['edit_city'];
    $state = $_POST['edit_state'];
    $zipcode = $_POST['edit_zipcode'];
    $phone = $_POST['edit_phone'];

    $connection = mysqli_connect("localhost","u274592685_root","Reset@123","u274592685_birthdaybash");

    $query = "UPDATE customer_details SET fname='$fname', lname='$lname', email='$email', address='$address', city='$city', state='$state', zipcode='$zipcode', phone='$phone' WHERE order_uid='$order_id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: order.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: order.php'); 
    }
}

?>
