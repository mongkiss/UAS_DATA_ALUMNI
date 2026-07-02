<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "../controller/AlumniController.php";
require_once "../model/Alumni.php";

include "template/header.php";
include "template/sidebar.php";

$controller = new AlumniController();

$data = $controller->cari();

$model = new Alumni();

$total = $model->total()['total'];
$bekerja = $model->totalStatus('Bekerja')['total'];
$kuliah = $model->totalStatus('Kuliah')['total'];
$wirausaha = $model->totalStatus('Wirausaha')['total'];

?>

<h2>Dashboard</h2>

<div class="row mb-4">

<div class="col">

<div class="card bg-primary text-white">

<div class="card-body">

<h5>Total Alumni</h5>

<h2><?= $total ?></h2>

</div>

</div>

</div>

<div class="col">

<div class="card bg-success text-white">

<div class="card-body">

<h5>Bekerja</h5>

<h2><?= $bekerja ?></h2>

</div>

</div>

</div>

<div class="col">

<div class="card bg-warning">

<div class="card-body">

<h5>Kuliah</h5>

<h2><?= $kuliah ?></h2>

</div>

</div>

</div>

<div class="col">

<div class="card bg-info text-white">

<div class="card-body">

<h5>Wirausaha</h5>

<h2><?= $wirausaha ?></h2>

</div>

</div>

</div>

</div>

<form method="GET">

<div class="input-group mb-3">

<input
type="text"
name="keyword"
class="form-control"
placeholder="Cari nama, NIM, atau prodi">

<button
class="btn btn-primary">

Cari

</button>

</div>

</form>

<div class="mb-3">

<a
href="../export/pdf.php"
class="btn btn-danger">

PDF

</a>

<a
href="../export/excel.php"
class="btn btn-success">

Excel

</a>

<a
href="laporan.php"
class="btn btn-primary">

Laporan

</a>

</div>

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>Foto</th>

<th>NIM</th>

<th>Nama</th>

<th>Prodi</th>

<th>Status</th>

<th>Aksi</th>

</tr>

</thead>

<tbody>

<?php while($row=mysqli_fetch_assoc($data)){ ?>

<tr>

<td>

<img
src="../assets/uploads/<?= $row['foto']?>"
width="70">

</td>

<td><?= $row['nim']?></td>

<td><?= $row['nama']?></td>

<td><?= $row['prodi']?></td>

<td><?= $row['status']?></td>

<td>

<a
href="edit.php?id=<?= $row['id']?>"
class="btn btn-warning btn-sm">

Edit

</a>

<a
href="../controller/AlumniController.php?hapus=<?= $row['id']?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Hapus data?')">

Hapus

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

<?php include "template/footer.php"; ?>