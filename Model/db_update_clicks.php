<?php


namespace gallery;

require_once('DatabaseHandler.php');

class UpdateClicks
{

    private $name;
    private $connection;
    private $stmt;
    private $dbHandler;

    public function __construct($name)
    {
        $this->dbHandler = new DatabaseHandler();
        $this->connection = $this->dbHandler->getConnection();
        $this->stmt = mysqli_stmt_init($this->connection);
        $this->name = $name;
    }

    public function getCurrentCount()
    {
        $sql = "SELECT clicks FROM gallery";
        $sql .= " WHERE";
        $sql .= " name=? ";

        if (!mysqli_stmt_prepare($this->stmt, $sql)) {
            $errorList = mysqli_stmt_error_list($this->stmt);
            print_r($errorList);
            printf("Error no %d - %s", $errorList[0]['errno'], $errorList[0]['error']);
            echo $sql;
            exit();
        } else {
            mysqli_stmt_prepare($this->stmt, $sql);
            mysqli_stmt_bind_param($this->stmt, 's', $this->name);
            mysqli_stmt_execute($this->stmt);
            $result = mysqli_stmt_get_result($this->stmt);
            $row = mysqli_fetch_array($result);
        }

        $this->incrementCount($row[0]);
    }

    public function incrementCount($currentCount)
    {
        $currentCount++;
        $sql = "UPDATE gallery";
        $sql .= " SET clicks=? ";
        $sql .= " WHERE name=? ";

        if (!mysqli_stmt_prepare($this->stmt, $sql)) {
            $errorList = mysqli_stmt_error_list($this->stmt);
            print_r($errorList);
            printf("Error no %d - %s", $errorList[0]['errno'], $errorList[0]['error']);
            echo $sql;
            exit();
        } else {
            mysqli_stmt_prepare($this->stmt, $sql);
            mysqli_stmt_bind_param($this->stmt, 'ss', $currentCount, $this->name);
            mysqli_stmt_execute($this->stmt);
            // $result = mysqli_stmt_get_result($this->stmt);
            // $row = mysqli_fetch_array($result);
        }
        echo json_encode($currentCount);
    }

    public function __destruct()
    {
        $this->dbHandler->disconnectFromDatabase();
    }
}
$name = $_POST['name'];
$updateClicks = new UpdateClicks($name);
$updateClicks->getCurrentCount();
// echo json_encode('hi');