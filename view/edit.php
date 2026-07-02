<?php

require_once "../controller/AlumniController.php";

$controller = new AlumniController();

if (!isset($_GET['id'])) {
    header("Location: dashboard.php");
    exit;
}

$data = $controller->detail($_GET['id']);

include "template/header.php";
include "template/sidebar.php";

?>

<div class="container-fluid">

<div class="card shadow">

<div class="card-header bg-warning">

<h4>Edit Data Alumni</h4>

</div>

<div class="card-body">

<form
action="../controller/AlumniController.php?action=edit"
method="POST"
enctype="multipart/form-data">

<input
type="hidden"
name="id"
value="<?= $data['id']; ?>">

<div class="row">

<div class="col-md-6">

<label>NIM</label>

<input
type="text"
name="nim"
class="form-control"
value="<?= $data['nim']; ?>"
required>

</div>

<div class="col-md-6">

<label>Nama</label>

<input
type="text"
name="nama"
class="form-control"
value="<?= $data['nama']; ?>"
required>

</div>

</div>

<br>

<div class="row">

<div class="col-md-6">

<label>Jenis Kelamin</label>

<select
name="jenis_kelamin"
class="form-control">

<option
value="Laki-laki"
<?= $data['jenis_kelamin']=="Laki-laki" ? "selected" : ""; ?>>

Laki-laki

</option>

<option
value="Perempuan"
<?= $data['jenis_kelamin']=="Perempuan" ? "selected" : ""; ?>>

Perempuan

</option>

</select>

</div>

<div class="col-md-6">

<label>Program Studi</label>

<input
type="text"
name="prodi"
class="form-control"
value="<?= $data['prodi']; ?>">

</div>

</div>

<br>

<div class="row">

<div class="col-md-6">

<label>Angkatan</label>

<input
type="number"
name="angkatan"
class="form-control"
value="<?= $data['angkatan']; ?>">

</div>

<div class="col-md-6">

<label>Tahun Lulus</label>

<input
type="number"
name="tahun_lulus"
class="form-control"
value="<?= $data['tahun_lulus']; ?>">

</div>

</div>

<br>

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
value="<?= $data['email']; ?>">

<br>

<label>Telepon</label>

<input
type="text"
name="telepon"
class="form-control"
value="<?= $data['telepon']; ?>">

<br>

<label>Alamat</label>

<textarea
name="alamat"
class="form-control"
rows="3"><?= $data['alamat']; ?></textarea>

<br>

<label>Pekerjaan</label>

<input
type="text"
name="pekerjaan"
class="form-control"
value="<?= $data['pekerjaan']; ?>">

<br>

<label>Status</label>

<select
name="status"
class="form-control">

<?php

$status = [
"Bekerja",
"Kuliah",
"Wirausaha",
"Belum Bekerja"
];

foreach($status as $s){

?>

<option
value="<?= $s;?>"
<?= $data['status']==$s ? "selected" : ""; ?>>

<?= $s;?>

</option>

<?php } ?>

</select>

<br>

<label>Foto Lama</label>

<br>

<img
src="../uploads/<?= $data['foto'];?>"
width="120"
class="mb-3">

<br>

<label>Ganti Foto</label>

<input
type="file"
name="foto"
class="form-control"
accept=".jpg,.jpeg,.png">

<br>

<button
class="btn btn-warning"
name="update">

Update

</button>

<a
href="dashboard.php"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

</div>

<?php include "template/footer.php"; ?>