<?php
session_start();
include('database/dbconfig1.php');
if($connection)
{
    // echo "Database Connected";
}
else
{
    header("Location: database/dbconfig1.php");
}

if(!$_SESSION['username'])
{
    header('Location: login.php');
}
?>