<?php

class Session
{
    public static function start()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function checkLogin()
    {
        self::start();

        if (!isset($_SESSION['login'])) {
            header("Location: index.php");
            exit;
        }
    }

    public static function login($id, $nama)
    {
        self::start();

        $_SESSION['login'] = true;
        $_SESSION['id'] = $id;
        $_SESSION['nama'] = $nama;
    }

    public static function logout()
    {
        self::start();

        session_destroy();

        header("Location: index.php");
        exit;
    }
}