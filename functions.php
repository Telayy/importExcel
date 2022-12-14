<?php
include "db_conn.php";

    if(isset($_POST['Import'])){
        $filename=$_FILES["file"]["tmp_name"];    
        if($_FILES["file"]["size"] > 0){
            $file = fopen($filename, "r");
            while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE){
                $sql = "INSERT INTO `parts`(`parts_id`, `parts_code`, `parts_name`, `quantity`, `unit_price`, 
                `supplier`, `moq`, `yield_item`, `yield_process`, `time_per_piece`, `landed_cost`)
                VALUES (NULL, '$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]''$emapData[7]','$emapData[8]','$emapData[9]')";
                $result = mysqli_query($conn, $sql);
                
                if(!isset($result)){
                echo "<script type=\"text/javascript\">
                    alert(\"Invalid File:Please Upload CSV File.\");
                    window.location = \"index.php\"
                    </script>";    
                }
                else{
                    echo "<script type=\"text/javascript\">
                    alert(\"CSV File has been successfully Imported.\");
                    window.location = \"index.php\"
                </script>";
                }
            }
        
            fclose($file);  
        }
    } 
 ?>

 <?php
    function get_all_records(){
        $con = getdb();
        $Sql = "SELECT * FROM parts";
        $result = mysqli_query($conn, $Sql);  
        if (mysqli_num_rows($result) > 0) {
        echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>
                <thead><tr><th>Parts Code</th>
                    <th>Parts Name</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Supplier</th>
                    <th>MOQ</th>
                    <th>Yield(Item)</th>
                    <th>Yield(Process)</th>
                    <th>Time Per Piece</th>
                    <th>Landed Cost</th>
                    </tr></thead><tbody>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row['parts_code']."</td>
                    <td>" . $row['parts_name']."</td>
                    <td>" . $row['quantity']."</td>
                    <td>" . $row['unit_price']."</td>
                    <td>" . $row['supplier']."</td>
                    <td>" . $row['moq']."</td>
                    <td>" . $row['yield_item']."</td>
                    <td>" . $row['yield_process']."</td>
                    <td>" . $row['time_per_piece']."</td>
                    <td>" . $row['landed_cost']."</td></tr>";        
        }
    
     echo "</tbody></table></div>";
     
} else {
     echo "you have no records";
}
}
 ?>
 

 