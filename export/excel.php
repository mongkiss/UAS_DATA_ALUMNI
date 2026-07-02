<?php

require_once "../model/Alumni.php";

$model = new Alumni();
$data = $model->tampil();

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=laporan_alumni.xls");

?>

<table border="1">

<tr>
    <th>No</th>
    <th>NIM</th>
    <th>Nama</th>
    <th>Program Studi</th>
    <th>Status</th>
</tr>

<?php

$no = 1;

while($row = mysqli_fetch_assoc($data))
{

?>

<tr>

<td><?= $no++; ?></td>

<td><?= $row['nim']; ?></td>

<td><?= $row['nama']; ?></td>

<td><?= $row['prodi']; ?></td>

<td><?= $row['status']; ?></td>

</tr>

<?php } ?>

</table>