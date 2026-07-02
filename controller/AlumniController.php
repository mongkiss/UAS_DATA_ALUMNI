<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "../model/Alumni.php";

class AlumniController
{

    private $alumni;

    public function __construct()
    {
        $this->alumni = new Alumni();
    }

    // =====================
    // TAMPIL DATA
    // =====================

    public function tampil()
    {
        return $this->alumni->tampil();
    }

    // =====================
    // SEARCH
    // =====================

    public function cari()
    {

        if(isset($_GET['keyword']))
        {
            return $this->alumni->cari($_GET['keyword']);
        }

        return $this->alumni->tampil();

    }

    // =====================
    // DETAIL
    // =====================

    public function detail($id)
    {
        return $this->alumni->detail($id);
    }

    // =====================
    // TAMBAH
    // =====================

    public function tambah()
    {

        if(isset($_POST['simpan']))
        {

            $foto = "default.png";

            if($_FILES['foto']['name'] != "")
            {

                $namaFile = time()."_".$_FILES['foto']['name'];

                move_uploaded_file(
                    $_FILES['foto']['tmp_name'],
                    "../assets/uploads/".$namaFile
                );

                $foto = $namaFile;

            }

            if($this->alumni->tambah($_POST,$foto))
            {

                echo "<script>

                alert('Data berhasil ditambahkan');

                window.location='../view/dashboard.php';

                </script>";

            }

        }

    }

    // =====================
    // EDIT
    // =====================

    public function edit()
{
    if(isset($_POST['update']))
    {
        $foto = "";

        if($_FILES['foto']['error'] == 0)
        {
            $namaFile = time() . "_" . $_FILES['foto']['name'];

            move_uploaded_file(
                $_FILES['foto']['tmp_name'],
                "../assets/uploads/" . $namaFile
            );

            $foto = $namaFile;
        }

        if($this->alumni->edit($_POST, $foto))
        {
            header("Location: ../view/dashboard.php");
            exit;
        }
        else
        {
            die("Update gagal.");
        }
    }
}

    // =====================
    // DELETE
    // =====================

    public function hapus()
    {

        if(isset($_GET['hapus']))
        {

            $this->alumni->hapus($_GET['hapus']);

            echo "<script>

            alert('Data berhasil dihapus');

            window.location='../view/dashboard.php';

            </script>";

        }

    }

}

$controller = new AlumniController();

if (isset($_POST['simpan'])) {
    $controller->tambah();
}

if (isset($_POST['update'])) {
    $controller->edit();
}

if (isset($_GET['hapus'])) {
    $controller->hapus();
}