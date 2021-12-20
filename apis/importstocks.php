<?php include "connect_input.php"; ?> 
<?php
if(isset($_POST["submit"]))
{
          $file = $_FILES['file']['tmp_name'];
          $handle = fopen($file, "r");
          $c = 0;
          while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
                    {
     echo     $stockname = $filesop[0];
          $stockkey = $filesop[1];
//          $sql = "insert into excel(fname,lname) values ('$fname','$lname')";
		  $sql_importstocks = "INSERT INTO `nsedb_stockname` (`stockname_serial`, `stockname_stockname`, `stockname_stockkey`, `stockname_entrydate`, `stockname_status`) VALUES (NULL, '$stockname', '$stockkey', 'current_timestamp()', '1');";
		  //INSERT INTO `nsedb_stockname` (`stockname_serial`, `stockname_stockname`, `stockname_stockkey`, `stockname_entrydate`, `stockname_status`) VALUES (NULL, 'stname', 'stkey', 'current_timestamp()', '1');
         // $stmt = mysqli_prepare($conn,$sql);
         // mysqli_stmt_execute($stmt);
		  
		 // $sql_importstocks = "SELECT * FROM `nsedb_timestamplist` WHERE `timestamplist_formatteddate` = '$currentdate'";					
		  $retval_importstocks = mysqli_query($con, $sql_importstocks);

         $c = $c + 1;
           }

            if($retval_importstocks){
               echo "sucess";
             } 
		 else
		 {
            echo "Sorry! Unable to impo.";
          }

}
?>
<!DOCTYPE html>
<html>
<body>
<form enctype="multipart/form-data" method="post" role="form">
    <div class="form-group">
        <label for="exampleInputFile">File Upload</label>
        <input type="file" name="file" id="file" size="150">
        <p class="help-block">Only Excel/CSV File Import.</p>
    </div>
    <button type="submit" class="btn btn-default" name="submit" value="submit">Upload</button>
</form>
</body>
</html>