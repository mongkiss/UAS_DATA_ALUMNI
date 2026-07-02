<?php

include "template/header.php";
include "template/sidebar.php";

?>

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">
                Tambah Data Alumni
            </h4>

        </div>

        <div class="card-body">

            <form
                action="../controller/AlumniController.php?action=tambah"
                method="POST"
                enctype="multipart/form-data">

                <div class="row">

                    <div class="col-md-6">

                        <label>ID</label>

                        <input
                            type="number"
                            name="id"
                            class="form-control"
                            required>

                    </div>

                    <div class="col-md-6">

                        <label>NIM</label>

                        <input
                            type="text"
                            name="nim"
                            class="form-control"
                            required>

                    </div>

                </div>

                <br>

                <label>Nama Alumni</label>

                <input
                    type="text"
                    name="nama"
                    class="form-control"
                    required>

                <br>

                <div class="row">

                    <div class="col-md-6">

                        <label>Jenis Kelamin</label>

                        <select
                            name="jenis_kelamin"
                            class="form-control"
                            required>

                            <option value="">-- Pilih --</option>

                            <option value="Laki-laki">
                                Laki-laki
                            </option>

                            <option value="Perempuan">
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
                            required>

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
                            required>

                    </div>

                    <div class="col-md-6">

                        <label>Tahun Lulus</label>

                        <input
                            type="number"
                            name="tahun_lulus"
                            class="form-control"
                            required>

                    </div>

                </div>

                <br>

                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    required>

                <br>

                <label>Nomor Telepon</label>

                <input
                    type="text"
                    name="telepon"
                    class="form-control"
                    required>

                <br>

                <label>Alamat</label>

                <textarea
                    name="alamat"
                    class="form-control"
                    rows="3"
                    required></textarea>

                <br>

                <label>Pekerjaan</label>

                <input
                    type="text"
                    name="pekerjaan"
                    class="form-control">

                <br>

                <label>Status Alumni</label>

                <select
                    name="status"
                    class="form-control"
                    required>

                    <option value="">-- Pilih --</option>

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

                <br>

                <label>Foto Alumni</label>

                <input
                    type="file"
                    name="foto"
                    class="form-control"
                    accept=".jpg,.jpeg,.png">

                <br>

                <button
                    type="submit"
                    name="simpan"
                    class="btn btn-success">

                    <i class="bi bi-check-circle"></i>

                    Simpan

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

<?php

include "template/footer.php";

?>