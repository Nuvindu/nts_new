<?php


namespace gallery;

include_once('db-connection.php'); // file that contains ConnectionHandler Class
/***
 * @param mixed $connection - connection to the database
 * @param mixed $stmt - Allocates and initializes a statement object suitable for mysqli_stmt_prepare().Any subsequent calls to any mysqli_stmt function will fail until mysqli_stmt_prepare() was called.
 */
class DatabaseHandler
{
    private $connection;
    private $stmt;
    public function __construct()
    {
        $connection = new ConnectionHandler('localhost', 'root', '', 'userdb'); // object that handle the connection
        $this->connection = $connection->getConnection(); // connection to database
        $this->stmt = mysqli_stmt_init($this->connection); //
    }
    public function getConnection()
    {
        return $this->connection;
    }





















    public function disconnectFromDatabase()
    {
        $link = mysqli_close($this->connection);
    }
    public function getAllEntries()
    {
        $sql = "SELECT * from `gallery` ORDER BY `gallery`.`time_stamp` DESC";
        if (!mysqli_stmt_prepare($this->stmt, $sql)) {
            $errorList = mysqli_stmt_error_list($this->stmt);

            printf("Error no %d - %s", $errorList[0]['errno'], $errorList[0]['error']);













            exit();
        } else {
            mysqli_stmt_prepare($this->stmt, $sql);
            mysqli_stmt_execute($this->stmt);

            $result = mysqli_stmt_get_result($this->stmt);
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);


            if (mysqli_num_rows($result) == 0) {
                return false;
            } else {
                return $rows;
            }
        }
    }
}