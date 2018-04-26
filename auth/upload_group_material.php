<?php
$title = $_POST['title'];
$level = $_POST['level'];
$department = $_POST['department'];
$faculty = $_POST['faculty'];
//$title = $_POST['title'];


include("config.php");


       $uploadDir = "uploads/";
      $fileName = $_FILES['uploaded']['name'];
      $tmpName = $_FILES['uploaded']['tmp_name'];
      $fileSize = $_FILES['uploaded']['size'];
      $fileType = $_FILES['uploaded']['type'];
      $img=  $filePath = $uploadDir.$fileName;
      //$img= $fileName;
      
    
        if ($fileType!="image/png" || $fileType!="image/jpeg" || $fileType!="image/gif" || $fileType!="image/jpg") 

        {
          
        $resul = move_uploaded_file($tmpName, $filePath);
        //$tm=date_time_set();
        
     $result=mysql_query("INSERT into club_material values (null, '$title', '$level', '$department', '$faculty', '$img')");
     if (!$result) {
   echo "File was not uploaded. please try again later.";
      //$error="Image was not uploaded. please try again later.";
     }
     else{
   echo "File Uploaded Successfully!!!";
     //$error="Image Uploaded Successfully!!!";
    // unset($img);//}
    }
    }
        else{       
          //$error="Invalid image format";
      echo "Invalid file format";
    }
  header("location: book.php");
 
?>
 <script type="text/javascript">
  /*  setTimeout('ourRedirect()', 3000)
    function ourRedirect()
  {
    location.href='groups.php'
  }*/
</script>
