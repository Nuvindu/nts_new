<?php
class DBConnection
{

    private $dbhost = 'localhost';
	private $dbuser = 'root';
	private $dbpass = '';
	private $dbname = 'userdb'; 
    public static $instance=null;

    private $connection;

    private function __construct(){
        $this->connection = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
        if (mysqli_connect_error()) {
            trigger_error("Failed to connect to Mysql:".mysql_connect_error(),E_USER_ERROR);

        }
    }
    public static function getInstance(){
        if (self::$instance==null){
            self::$instance= new DBConnection();}
        return self::$instance;

    }
    public function getConnection(){
        return $this->connection;
    }
    private function clone(){}

}
$instance = DBConnection::getInstance();
$connection=$instance->getConnection();

?>
