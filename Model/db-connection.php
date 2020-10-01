<?php



namespace gallery;

class ConnectionHandler
{
    private $host;
    private $user;
    private $name;
    private $password;
    private $connection;

    function __construct($host, $user, $password, $name)
    {
        $this->host = $host;
        $this->user = $user;
        $this->name = $name;
        $this->password = $password;

        $this->connection = mysqli_connect($this->host, $this->user, $this->password, $this->name);
        // echo "connected";
        // print_r($this->connection);
        if (mysqli_connect_errno()) {
            die('Database connection failed ' . mysqli_connect_error());
        }
    }

    function getConnection()
    {
        return $this->connection;
    }
}