<?php

require_once "../config/Database.php";

class User extends Database
{
    public function register($nama, $username, $password)
    {
        $conn = $this->getConnection();

        $nama = mysqli_real_escape_string($conn, $nama);
        $username = mysqli_real_escape_string($conn, $username);

        // Cek username
        $cek = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");

        if(mysqli_num_rows($cek) > 0){
            return false;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users(nama,username,password)
                VALUES('$nama','$username','$password')";

        return mysqli_query($conn, $sql);
    }

    public function login($username,$password)
    {
        $conn = $this->getConnection();

        $username = mysqli_real_escape_string($conn,$username);

        $sql = mysqli_query($conn,"SELECT * FROM users WHERE username='$username'");

        if(mysqli_num_rows($sql)==1){

            $user = mysqli_fetch_assoc($sql);

            if(password_verify($password,$user['password'])){
                return $user;
            }

        }

        return false;
    }
}