<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
echo $_FILES["fileToUpload"]["name"];
if (isset($_POST["submit"]) && isset($_FILES['fileToUpload'])) 
{
	if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    }
    
} else {
    echo "Sorry, your file was not uploaded.";
}
?>


<html>
 <head>
  <meta charset="utf-8">
  <title>Тег BUTTON</title>
 </head>
 <body>
  <p><a href=<?php echo "index.php?name=".$_FILES["fileToUpload"]["name"]; ?>>Convert in UNICODE</a>
 </body>
</html>