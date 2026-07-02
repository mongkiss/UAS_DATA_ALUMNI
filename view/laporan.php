<?php

require_once "../controller/AlumniController.php";
require_once "../model/Alumni.php";

include "template/header.php";
include "template/sidebar.php";

$model = new Alumni();

if(isset($_GET['status']) && $_GET['status']!="")
{
    $data = $model->filterStatus($_GET['status']);
}
else
{
    $data = $model->tampil();
}

$total = $model->total()['total'];
$bekerja = $model->totalStatus("Bekerja")['total'];
$kuliah = $model->totalStatus("Kuliah")['total'];
$wirausaha = $model->totalStatus("Wirausaha")['total'];
$belum = $model->totalStatus("Belum Bekerja")['total'];

?>

<div class="container-fluid">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h3 class="mb-0">

Laporan Data Alumni

</h3>

</div>

<div class="card-body">

<div class="row mb-4">

<div class="col">

<div class="alert alert-primary">

<b>Total Alumni</b>

<h4><?= $total ?></h4>

</div>

</div>

<div class="col">

<div class="alert alert-success">

<b>Bekerja</b>

<h4><?= $bekerja ?></h4>

</div>

</div>

<div class="col">

<div class="alert alert-warning">

<b>Kuliah</b>

<h4><?= $kuliah ?></h4>

</div>

</div>

<div class="col">

<div class="alert alert-info">

<b>Wirausaha</b>

<h4><?= $wirausaha ?></h4>

</div>

</div>

<div class="col">

<div class="alert alert-danger">

<b>Belum Bekerja</b>

<h4><?= $belum ?></h4>

</div>

</div>

</div>

<form method="GET">

<div class="row">

<div class="col-md-4">

<select
name="status"
class="form-control">

<option value="">

Semua Status

</option>

<option value="Bekerja">

Bekerja

</option>

<option value="Kuliah">

Kuliah

</option>

<option value="Wirausaha">

Wirausaha

</option>

<option value="Belum Bekerja">

Belum Bekerja

</option>

</select>

</div>

<div class="col-md-8">

<button
class="btn btn-primary">

Filter

</button>

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

<button
type="button"
onclick="window.print()"
class="btn btn-dark">

Print

</button>

</div>

</div>

</form>

<hr>

<table class="table table-bordered table-striped">

<thead class="table-dark">

<tr>

<th>No</th>

<th>Foto</th>

<th>NIM</th>

<th>Nama</th>

<th>Program Studi</th>

<th>Status</th>

<th>Email</th>

<th>Telepon</th>

</tr>

</thead>

<tbody>

<?php

$no = 1;

while($row = mysqli_fetch_assoc($data))
{

?>

<tr>

<td><?= $no++ ?></td>

<td>

<img
src="../assets/uploads/<?= $row['foto']; ?>"
width="60">

</td>

<td><?= $row['nim']; ?></td>

<td><?= $row['nama']; ?></td>

<td><?= $row['prodi']; ?></td>

<td><?= $row['status']; ?></td>

<td><?= $row['email']; ?></td>

<td><?= $row['telepon']; ?></td>

</tr>

<?php

}

?>

</tbody>

</table>

</div>

</div>

</div>

<?php

include "template/footer.php";

?>