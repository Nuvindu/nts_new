<?php

namespace gallery;

require_once('DatabaseHandler.php');
class Upload
{

    private $name;
    private $description;
    private $folder_name;
    private $clicks;
    private $image;
    private $connection;
    private $stmt;
    private $dbHandler;

    public function __construct()
    {
        $this->dbHandler = new DatabaseHandler();
        $this->connection = $this->dbHandler->getConnection();
        $this->stmt = mysqli_stmt_init($this->connection);
    }
    public function uploadToDatabase($name, $description, $folder_name, $clicks, $imageID)
    {

        $this->name = $name;
        $this->description = $description;
        $this->folder_name = $folder_name;
        $this->clicks = $clicks;
        $this->image = $name . '/' . $imageID;


        $sql = "SELECT clicks FROM gallery";
        $sql .= " WHERE";
        $sql .= " name=? ";
        if (!mysqli_stmt_prepare($this->stmt, $sql)) {
            $errorList = mysqli_stmt_error_list($this->stmt);
            print_r($errorList);
            printf("Error no %d - %s", $errorList[0]['errno'], $errorList[0]['error']);
            exit();
        } else {
            mysqli_stmt_prepare($this->stmt, $sql);
            mysqli_stmt_bind_param($this->stmt, 's', $this->name);
            mysqli_stmt_execute($this->stmt);
            $result = mysqli_stmt_get_result($this->stmt);
            $numrows = mysqli_num_rows($result);
            if ($numrows == 0) {
                $sql = "INSERT INTO gallery (name,description,folder_name,clicks,imageID)";
                $sql .= " VALUES";
                $sql .= " (?,?,?,?,?) ";

                if (!mysqli_stmt_prepare($this->stmt, $sql)) {
                    $errorList = mysqli_stmt_error_list($this->stmt);
                    print_r($errorList);
                    printf("Error no %d - %s", $errorList[0]['errno'], $errorList[0]['error']);
                    echo $sql;
                    exit();
                } else {
                    mysqli_stmt_prepare($this->stmt, $sql);
                    mysqli_stmt_bind_param($this->stmt, 'sssss', $this->name, $this->description, $this->folder_name, $this->clicks, $this->image);
                    mysqli_stmt_execute($this->stmt);
                    // making a directory for accept photos
                    if (mkdir('../gallery/' . $folder_name))
                        echo json_encode(array('nameExist' => false, 'mkdir' => true));
                    else

                        echo json_encode(array('nameExist' => false, 'mkdir' => false));
                }
            } else {
                echo json_encode(array('nameExist' => true));
            }
        }
    }

    public function UpdateDatabase($name, $description, $clicks)
    {
        $this->name = $name;
        $this->description = $description;
        $this->clicks = $clicks;

        $sql = "UPDATE gallery";
        $sql .= " SET name=?,description=?,clicks=? ";
        $sql .= " WHERE folder_name=? ";

        if (!mysqli_stmt_prepare($this->stmt, $sql)) {
            $errorList = mysqli_stmt_error_list($this->stmt);
            print_r($errorList);
            printf("Error no %d - %s", $errorList[0]['errno'], $errorList[0]['error']);
            echo $sql;
            exit();
        } else {
            mysqli_stmt_prepare($this->stmt, $sql);
            mysqli_stmt_bind_param($this->stmt, 'ssss', $this->name, $this->description,  $this->clicks, $this->folder_name);
            mysqli_stmt_execute($this->stmt);
            // $result = mysqli_stmt_get_result($this->stmt);
            // $row = mysqli_fetch_array($result);
        }
    }


    public function UploadToDirectory($array, $dir)
    {
        // print_r($array);
        // get how many files in input
        $numOfFiles = sizeof($array['name']);
        // echo $numOfFiles;

        // loop through each file
        for ($fileIndex = 0; $fileIndex < $numOfFiles; $fileIndex++) {
            // check file type is image
            // move files to dir
            if (substr($array['type'][$fileIndex], 0, 5) == 'image') {
                $fileName = $array['name'][$fileIndex];
                $tmp_name = $array['tmp_name'][$fileIndex];
                move_uploaded_file($tmp_name, '../gallery/' . $dir . '/' . $fileName);
                echo json_encode(array("success" => true, 'format' => 'image', 'url' => $fileName));
            } else {
                continue;
            }
        }
    }

    public function __destruct()
    {
        $this->dbHandler->disconnectFromDatabase();
    }
}