<?php
require 'vendor/autoload.php';
require 'update-db.php';

$file_tmp = $_FILES['docTypeFile']['tmp_name']; // directory that file store temporary "xampp/tmp"
$fileName = basename($_FILES['docTypeFile']['name']);
$isFileStored = move_uploaded_file($file_tmp, './files/' . $fileName);

$dbhandler = new DatabaseHandler();

$inputFileName = './files/' . $fileName;
$inputFileType =
    \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
/**  Create a new Reader of the type that has been identified  **/
$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
/**  Advise the Reader that we only want to load cell data  **/
$reader->setReadDataOnly(true);
/**  Load $inputFileName to a Spreadsheet Object  **/
$spreadsheet = $reader->load($inputFileName);
$sheet = $spreadsheet->getActiveSheet();

// get heighst row number
$heigestRow = $sheet->getHighestRow();
// get heighst coloumn number
$heigestColumn = $sheet->getHighestColumn();
// get coloumn by number
$highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($heigestColumn);

// iterating through every cell
// iterating through every cell
for ($row = 1; $row <= $heigestRow; $row++) {
    // store a row
    $wholeRow = array();
    for ($col = 1; $col <= $highestColumnIndex; $col++) {
        // store a cell value
        $cellvalue = $sheet->getCellByColumnAndRow($col, $row)->getValue();

        // if ($cellvalue != null)
        // insert into the array
        array_push($wholeRow, $cellvalue);
    }
    if ($row == 1) {
        $dbhandler->createTable($wholeRow); //creating Table
        $firstRow = implode(",", $wholeRow); // remember coloumn names for add data to sql table(for sql satatement)
    } else {
        $dbhandler->insertDataToTable($wholeRow, $firstRow); // insert data into row in sql table
    }
}




















































echo "result uploaded to the database";