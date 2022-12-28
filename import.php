<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e";

$conn = mysqli_connect($servername, $username, $password, $dbname);

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_POST['save_excel'])) {
    # code...
    $fileName = $_FILES["import_file"]["name"];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls', 'csv', 'xlsx'];

    if(in_array($file_ext, $allowed_ext)){
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        /** Load $inputFileName to a Spreadsheet object **/
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();


        $count = "0";
        foreach($data as $row)
        {

            /**if(empty($data)){
                continue;
            }**/
            if($count > 0)
            {
                $parts_code = $row['0'];
                $parts_name = $row['1'];
                $quantity = $row['2'];
                $unit_price = $row['3'];
                $unit_price= str_replace('$','', $unit_price);
                $supplier = $row['4'];
                $moq = $row['5'];
                $yield_item = $row['6'];
                $yield_process = $row['7'];
                $time_per_piece = $row['8'];
                $landed_cost = $row['9'];
                $landed_cost= str_replace('$','',$landed_cost);
                    
                if ($parts_code != null && $parts_name != null && $quantity != null && $unit_price != null && $supplier != null && $moq != null && $yield_item != null && $yield_process != null
                && $time_per_piece != null && $landed_cost != null){
                $userQuery = "INSERT INTO `parts`(`parts_id`, `parts_code`, `parts_name`, `quantity`, `unit_price`, `supplier`, `moq`, `yield_item`, `yield_process`, `time_per_piece`, `landed_cost`)
                 VALUES (NULL,'$parts_code','$parts_name','$quantity','$unit_price', '$supplier', '$moq', '$yield_item', '$yield_process', '$time_per_piece', '$landed_cost')";

                $result = mysqli_query($conn, $userQuery);
                $msg = true;  
                }

            }
            else { 
                $count="1";
            }

            $krystel = "DELETE FROM parts WHERE parts_code IS NULL";
            $krystel_run = mysqli_query($conn, $krystel);

            }

            
        }

        if(isset($msg))
        {
            $_SESSION['message'] = "Successfully Imported";
            header('Location: index.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Imported";
            header('Location: index.php');
            exit(0);
        }

    }
    else
    {
        $_SESSION['message'] = "Invalid";
        header('Location: index.php');
        exit(0);
    }



?>
