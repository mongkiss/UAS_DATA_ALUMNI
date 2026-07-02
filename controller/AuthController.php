<?php

require_once "../model/User.php";
require_once "../config/Session.php";

class AuthController
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    // =========================
    // LOGIN
    // =========================
    public function login()
    {

        if(isset($_POST['login']))
        {

            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            if(empty($username) || empty($password))
            {
                echo "<script>
                        alert('Username dan Password wajib diisi!');
                        history.back();
                      </script>";
                exit;
            }

            $user = $this->user->login($username,$password);

            if($user)
            {
                Session::login($user['id'],$user['nama']);

                header("Location: ../view/dashboard.php");
                exit;
            }
            else
            {
                echo "<script>
                        alert('Username atau Password salah!');
                        history.back();
                      </script>";
            }

        }

    }

    // =========================
    // REGISTER
    // =========================
    public function register()
    {

        if(isset($_POST['register']))
        {

            $nama = trim($_POST['nama']);
            $username = trim($_POST['username']);
            $password = $_POST['password'];
            $konfirmasi = $_POST['konfirmasi'];

            if(empty($nama) || empty($username) || empty($password))
            {
                echo "<script>
                alert('Semua field wajib diisi');
                history.back();
                </script>";

                exit;
            }

            if($password != $konfirmasi)
            {
                echo "<script>
                alert('Konfirmasi Password tidak sama');
                history.back();
                </script>";

                exit;
            }

            $simpan = $this->user->register(
                $nama,
                $username,
                $password
            );

            if($simpan)
            {

                echo "<script>
                alert('Registrasi Berhasil');
                window.location='../index.php';
                </script>";

            }
            else
            {

                echo "<script>
                alert('Username sudah digunakan');
                history.back();
                </script>";

            }

        }

    }

}

$auth = new AuthController();

if(isset($_POST['login']))
{
    $auth->login();
}

if(isset($_POST['register']))
{
    $auth->register();
}