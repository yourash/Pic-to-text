
<!DOCTYPE html>
	<html>
		<body>
			<h1>Wanna convert?</h1>
		</body>
	</html>


<!DOCTYPE html>
<html>
<body>

<form action="upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>

<?php

$array = array("○", "◎", "◍", "◉","●");

function LoadJpeg($imgname)
{
    $im = @imagecreatefromjpeg($imgname);

    if(!$im)
    {
        $im  = imagecreatetruecolor(150, 30);
        $bgc = imagecolorallocate($im, 255, 255, 255);
        $tc  = imagecolorallocate($im, 0, 0, 0);

        imagefilledrectangle($im, 0, 0, 150, 30, $bgc);

        imagestring($im, 1, 5, 5, 'Upload mistake' . $imgname, $tc);

    }

    return $im;
}

$img=0;
if($_GET['name'])
{
	$img = LoadJpeg('uploads/'.$_GET['name']);
}


$pic_width = imagesx($img);
$pic_height = imagesy($img);

for ($i=0; $i < $pic_width; $i++)
{ 
	for ($j=0; $j < $pic_height; $j++)
	{ 
		$rgb = imagecolorat($img, $i, $j);
		$r = ($rgb >> 16) & 0xFF;
		$g = ($rgb >> 8) & 0xFF;
		$b = $rgb & 0xFF;

		if(((int)$r+(int)$g+(int)$b)/3>200)
		{
			$sympic[$i][$j]=$array[0];
		}
		elseif (((int)$r+(int)$g+(int)$b)/3>150 && ((int)$r+(int)$g+(int)$b)/3<=200)
		{
			$sympic[$i][$j]=$array[1];
		}
		elseif (((int)$r+(int)$g+(int)$b)/3>100 && ((int)$r+(int)$g+(int)$b)/3<=150)
		{
			$sympic[$i][$j]=$array[2];
		}
		elseif (((int)$r+(int)$g+(int)$b)/3>50 && ((int)$r+(int)$g+(int)$b)/3<=100)
		{
			$sympic[$i][$j]=$array[3];
		}
		elseif (((int)$r+(int)$g+(int)$b)/3>=0 && ((int)$r+(int)$g+(int)$b)/3<=50)
		{
			$sympic[$i][$j]=$array[4];
		}
	}
}

if($pic_width>32)
{

}

for ($i=0; $i < $pic_height; $i++)
{ 
	echo "<br>";
	for ($j=0; $j < $pic_width; $j++)
	{ 
		echo $sympic[$j][$i];
		echo " ";
	}
}



?>

