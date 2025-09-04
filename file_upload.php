<?php
 error_reporting(0);

?>
<!DOCTYPE html>
<html>
<head>
	
	<title>File Upload</title>
</head>
<body>
	<form action="" method="POST" enctype="multipart/form-data">
		<input type="file" name="uploadfile"><br><br>
		<input type="submit" name="submit" value="Upload File">
	</form>

</body>
</html>
<?php

$filename=$_FILES["uploadfile"]["name"];
//print_r($_FILES["uploadfile"]);//this stmt provides us with the name and temporary name of the file,the image will be stored in the form of array in php
$tempname = $_FILES["uploadfile"]["tmp_name"];
$folder = "images/".$filename;//in the image folder add the $filename--this is file to be added
//echo $folder;
move_uploaded_file($tempname, $folder);//file will be picked from the temporary location and moved to the destination pplace ie$folder
echo "<img src='$folder'  height='100px' width='100px'>";
?>
