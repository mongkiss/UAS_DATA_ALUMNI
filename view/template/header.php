<?php
require_once "../config/Session.php";
Session::checkLogin();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Alumni</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container-fluid">

        <a class="navbar-brand d-flex align-items-center" href="dashboard.php">
            
    <span>Alumni Waskito</span>

</a>

        <div class="text-white">
            Selamat Datang,
            <strong><?= $_SESSION['nama']; ?></strong>
        </div>

    </div>
</nav>

<div class="container-fluid mt-4">
    <div class="row">