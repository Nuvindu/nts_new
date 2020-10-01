<?php
include_once('db-connection.php'); // file that contains ConnectionHandler Class

/***
 * @param mixed $connection - connection to the database
 * @param mixed $stmt - Allocates and initializes a statement object suitable for mysqli_stmt_prepare().Any subsequent calls to any mysqli_stmt function will fail until mysqli_stmt_prepare() was called.
 */
class DatabaseHandler
{

    private $connection;
    private $stmt;
    function __construct()
    {
        $connection = new gallery\ConnectionHandler('localhost', 'root', '', 'userdb'); // objects that handle the connection
        $this->connection = $connection->getConnection(); // connection to database
        $this->stmt = mysqli_stmt_init($this->connection); // 
    }

    public function createTable($firstRow)
    {
        //checking the table
        $isResultTableExist = "SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_NAME = ?";
        $tablename = "result";

        if (!mysqli_stmt_prepare($this->stmt, $isResultTableExist)) {
            // print_r(mysqli_stmt_error_list($this->stmt));
            $errorList = mysqli_stmt_error_list($this->stmt);
            printf("Error no %d - %s", $errorList[0]['errno'], $errorList[0]['error']);
            exit();
        } else {

            mysqli_stmt_prepare($this->stmt, $isResultTableExist);
            mysqli_stmt_bind_param($this->stmt, 's', $tablename);
            mysqli_stmt_execute($this->stmt);

            $result = mysqli_stmt_get_result($this->stmt);

            if (mysqli_num_rows($result) == 1) {

                echo "result table exist ";
                return true;
            } else {

                // table doesn't exist
                echo 'creating table' . ' name - result ';
                $rownames = "";
                foreach ($firstRow as $name) {
                    if ($name == "index_no") {
                        $rownames .= str_replace(' ', '', $name) . " VARCHAR(100) PRIMARY KEY,";
                        continue;
                    }

                    $rownames .= str_replace(' ', '', $name) . " VARCHAR(100),";
                }
                $rownames = substr($rownames, 0, strlen($rownames) - 1);
                // echo $rownames;
                $sql = "CREATE TABLE ";
                $sql .= "result ({$rownames})";
                // echo "coloumns" . $sql . "\r\n";
                if (!mysqli_stmt_prepare($this->stmt, $sql)) {
                    $errorList = mysqli_stmt_error_list($this->stmt);
                    printf("Error no %d - %s", $errorList[0]['errno'], $errorList[0]['error']);
                    exit();
                } else {
                    mysqli_stmt_prepare($this->stmt, $sql);
                    mysqli_stmt_execute($this->stmt);
                }
            }
        }
    }

    public function insertDataToTable($Row, $columnNames)
    {
        $Row = array_map('strval', $Row);
        $rowData = "";
        $isEntryexist = $this->checkEntry($Row[0]);
        $columnNames = explode(",", $columnNames);















        for ($column = 0; $column < sizeof($columnNames); $column++) {
            $rowData .= "`" . $columnNames[$column] . "`='" . $Row[$column] . "',";
        }




        if ($isEntryexist) {

            $rowData = substr($rowData, 0, strlen($rowData) - 1);

            $sql = "UPDATE `result` ";
            $sql .= "SET {$rowData} ";
            $sql .= "WHERE `index_no`='{$Row[0]}'";

            echo $sql;

            // echo "row Data" . $sql . "\r\n";
            if (!mysqli_stmt_prepare($this->stmt, $sql)) {
                echo "sql statement error ";
                printf("fatal error.please contact Admin immideately.pop up while inserting data to table");
                exit();
            } else {

                // sending statement to dtatabase as (Values = ? ? ?)
                mysqli_stmt_prepare($this->stmt, $sql);
                mysqli_stmt_execute($this->stmt);
            }
        } else {
            $rowData = "";

            foreach ($Row as $data) {
                $rowData .= "'" . $data . "',";
            }

            $rowData = substr($rowData, 0, strlen($rowData) - 1);

            $sql = "INSERT INTO ";
            $sql .= "result ({$columnNames}) ";
            $sql .= "VALUES ({$rowData})";

            // echo "row Data" . $sql . "\r\n";
            if (!mysqli_stmt_prepare($this->stmt, $sql)) {
                $errorList = mysqli_stmt_error_list($this->stmt);

                printf("Error no %d - %s", $errorList[0]['errno'], $errorList[0]['error']);

                exit();
            } else {

                // sending statement to dtatabase as (Values = ? ? ?)
                mysqli_stmt_prepare($this->stmt, $sql);
                // sending values for ? ? ? and executing them
                mysqli_stmt_execute($this->stmt);
            }
        }
    }

    private function checkEntry($index_no)
    {
        $sql = "SELECT EXISTS(SELECT * from `user` WHERE index_no=?)";
        if (!mysqli_stmt_prepare($this->stmt, $sql)) {

            $errorList = mysqli_stmt_error_list($this->stmt);

            printf("Error no %d - %s", $errorList[0]['errno'], $errorList[0]['error']);

            exit();
        } else {

            mysqli_stmt_prepare($this->stmt, $sql);
            mysqli_stmt_bind_param($this->stmt, 's', $index_no);
            mysqli_stmt_execute($this->stmt);

            $result = mysqli_stmt_get_result($this->stmt);

            if (mysqli_num_rows($result) == 0) {
                return false;
            } else {
                return true;
            }
        }
    }

    public function __destruct()
    {
        $link = mysqli_close($this->connection);
        echo ' disconnected from database ';
        // print_r($link);
    }
}