<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" /> 
	<title> 201711223_HW </title>
</head>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
	height: <input type="text" name="h" /> m
	<br/>
	weight: <input type="text" name="w" /> kg
	<br/>
	<input type="file" name="file" id="file" />
	<br/>
	<input type="submit" name="submit" value="提交" />
</form>

<?php

# BMI = 體重(公斤) / 身高2(公尺2)

if(isset($_POST['h']) && !empty($_POST['w'])) {
	$path = "upload";

	echo "height = " . $_POST["h"] . "<br/>";
	echo "weight = " . $_POST["w"] . "<br/>";
	echo "BMI: " . $_POST["w"] / $_POST["h"] ** 2 . "<br/>";

	if ($_FILES["file"]["error"] > 0) {
		// echo "error : " . $_FILES["file"]["error"];
		echo "empty";
	} else {
		$filename = $_FILES["file"]["name"];

		$upload_ext = explode(".",$_FILES["file"]["name"]);
		$vaildExtends = array("jpg", "jpeg", "png", "gif", "bmp");

		if (in_array($upload_ext[count($upload_ext) - 1], $vaildExtends))
		{
		  if (!is_dir($path)) mkdir($path);

			move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $filename);
			echo '<img src="upload/' . $filename . '"/>';
		}
		else
		{
		  echo "wrong file type";
		}
	}
}
else
{
	echo "please type in all information";
}
?>

</body>
</html>
