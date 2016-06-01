<?php
//Сheck that we have a file
if((!empty($_FILES["filename"])) && ($_FILES['filename']['error'] == 0)) {
  

  //Check if the file is JPEG image and it's size is less than 350Kb
  $filename = basename($_FILES['filename']['name']);
  $ext = substr($filename, strrpos($filename, '.') + 1);
  if (($ext == "csv") && ($_FILES["filename"]["type"] == ".csv") && ($_FILES["filename"]["size"] < 10000)) {
    //Determine the path to which we want to save this file
      $newname = dirname(__FILE__).'/csv/'.$filename;
      //Check if the file with the same name is already exists on the server
      if (!file_exists($newname)) {
        //Attempt to move the uploaded file to it's new place
        if ((move_filename($_FILES['filename']['tmp_name'],$newname))) {
           echo "It's done! The file has been saved as: ".$newname;
        } else {
           echo "Error: A problem occurred during file upload!";
        }
      } else {
         echo "Error: File ".$_FILES["filename"]["name"]." already exists";
      }
  }
   else {
     echo "Error: Only .csv under 10mb are accepted for upload";
  }
}
 else {
 echo "Error: No file uploaded";
}
?>