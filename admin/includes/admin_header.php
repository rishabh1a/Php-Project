<?php ob_start(); ?>

<?php session_start(); ?>

<?php 

if(!isset($_SESSION['user_role'])){
    header("location: ../index.php");
}

?>

<?php 
    include "../includes/db.php"; 
    include "functions.php"; 
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="gstatic/loader.js"></script>
    <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
    <script src="js/script.js"></script>


</head>

<body>