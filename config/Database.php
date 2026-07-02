<?php

require_once "Config.php";

class Database
{
    private $host;
    private $user;
    private $pass;
    private $database;

    protected $conn;

    public function __construct()
    {
        $this->host = Config::$host;
        $this->user = Config::$user;
        $this->pass = Config::$pass;
        $this->database = Config::$database;

        $this->connect();
    }

    protected function connect()
    {
        $this->conn = mysqli_connect(
            $this->host,
            $this->user,
            $this->pass,
            $this->database
        );

        if (!$this->conn) {
            die("Koneksi Database Gagal : " . mysqli_connect_error());
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}