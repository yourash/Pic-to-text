
<!DOCTYPE html>
	<html>
		<body>
			<h1>Wanna convert?</h1>
		</body>
	</html>
<?php

$array = array("_", "~", "=", "$","#");

function LoadJpeg($imgname)
{
    /* Пытаемся открыть */
    $im = @imagecreatefromjpeg($imgname);

    /* Если не удалось */
    if(!$im)
    {
        /* Создаем пустое изображение */
        $im  = imagecreatetruecolor(150, 30);
        $bgc = imagecolorallocate($im, 255, 255, 255);
        $tc  = imagecolorallocate($im, 0, 0, 0);

        imagefilledrectangle($im, 0, 0, 150, 30, $bgc);

        /* Выводим сообщение об ошибке */
        imagestring($im, 1, 5, 5, 'Ошибка загрузки ' . $imgname, $tc);

    }

    return $im;
}

$img = LoadJpeg('img.jpg');

$pic_width = imagesx($img);
$pic_height = imagesy($img);
echo $pic_width;
echo $pic_height;

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



		//var_dump($r, $g, $b);
	}
}

for ($i=0; $i < $pic_width; $i++)
{ 
	echo "<br>";
	for ($j=0; $j < $pic_height; $j++)
	{ 
		echo $sympic[$j][$i];
		echo "&nbsp;&nbsp;&nbsp;";
	}
}

?>