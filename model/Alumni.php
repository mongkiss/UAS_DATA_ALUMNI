<?php

require_once "../config/Database.php";

class Alumni extends Database
{

    public function tampil()
    {
        $conn = $this->getConnection();

        return mysqli_query($conn,
        "SELECT * FROM alumni ORDER BY nama ASC");
    }

    public function cari($keyword)
    {
        $conn = $this->getConnection();

        $keyword = mysqli_real_escape_string($conn,$keyword);

        $sql = "
        SELECT *
        FROM alumni
        WHERE
        nama LIKE '%$keyword%'
        OR nim LIKE '%$keyword%'
        OR prodi LIKE '%$keyword%'
        ORDER BY nama
        ";

        return mysqli_query($conn,$sql);
    }

    public function detail($id)
    {
        $conn = $this->getConnection();

        $sql = mysqli_query($conn,
        "SELECT * FROM alumni WHERE id='$id'");

        return mysqli_fetch_assoc($sql);
    }

    public function tambah($data,$foto)
    {

        $conn = $this->getConnection();

        $id = $data['id'];
        $nim = $data['nim'];
        $nama = $data['nama'];
        $jk = $data['jenis_kelamin'];
        $prodi = $data['prodi'];
        $angkatan = $data['angkatan'];
        $tahun = $data['tahun_lulus'];
        $email = $data['email'];
        $telepon = $data['telepon'];
        $alamat = $data['alamat'];
        $pekerjaan = $data['pekerjaan'];
        $status = $data['status'];

        $sql = "
        INSERT INTO alumni
        (
        id,
        nim,
        nama,
        jenis_kelamin,
        prodi,
        angkatan,
        tahun_lulus,
        email,
        telepon,
        alamat,
        pekerjaan,
        status,
        foto
        )
        VALUES
        (
        '$id',
        '$nim',
        '$nama',
        '$jk',
        '$prodi',
        '$angkatan',
        '$tahun',
        '$email',
        '$telepon',
        '$alamat',
        '$pekerjaan',
        '$status',
        '$foto'
        )
        ";

        return mysqli_query($conn,$sql);

    }

    public function edit($data,$foto)
    {

        $conn = $this->getConnection();

        $id = $data['id'];

        if($foto==""){

            $queryFoto="";

        }else{

            $queryFoto=",foto='$foto'";

        }

        $sql="
        UPDATE alumni SET

        nim='".$data['nim']."',
        nama='".$data['nama']."',
        jenis_kelamin='".$data['jenis_kelamin']."',
        prodi='".$data['prodi']."',
        angkatan='".$data['angkatan']."',
        tahun_lulus='".$data['tahun_lulus']."',
        email='".$data['email']."',
        telepon='".$data['telepon']."',
        alamat='".$data['alamat']."',
        pekerjaan='".$data['pekerjaan']."',
        status='".$data['status']."'
        $queryFoto

        WHERE id='$id'
        ";

        return mysqli_query($conn,$sql);

    }

    public function hapus($id)
    {

        $conn = $this->getConnection();

        return mysqli_query($conn,
        "DELETE FROM alumni WHERE id='$id'");

    }

    public function total()
    {
        $conn = $this->getConnection();

        $sql=mysqli_query($conn,
        "SELECT COUNT(*) AS total FROM alumni");

        return mysqli_fetch_assoc($sql);
    }

    public function totalStatus($status)
    {

        $conn = $this->getConnection();

        $sql=mysqli_query($conn,
        "SELECT COUNT(*) AS total
        FROM alumni
        WHERE status='$status'");

        return mysqli_fetch_assoc($sql);

    }

    public function filterStatus($status)
{
    $conn = $this->getConnection();

    return mysqli_query(
        $conn,
        "SELECT * FROM alumni
         WHERE status='$status'
         ORDER BY nama ASC"
    );
}

}