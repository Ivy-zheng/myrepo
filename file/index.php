<?php

function getFilesSize($dir)
{
	if(!is_dir($dir)) return;
	$files = 0;
	$handle = @opendir($dir);
	while(($file = readdir($handle)) !== false)
	{
		 if($file != ".." && $file != ".") { //排除根目录；
			if(is_dir($dir.'/'.$file))
			{
				getFilesSize($dir.'/'.$file);
			}else
			{
				$files += filesize($dir.'/'.$file);
			}
		}
	}
	closedir($handle);
	return $files;//round((($files/1024)*100)/100).'kb';
}
$dir=$_SERVER['DOCUMENT_ROOT'];
var_dump(getFilesSize($dir));



// $path1 = "http://wwww.cc.com/home/etc/index.php?id=1";
// $path2 = parse_url($path1);
// $path = $path2['path'];
// $file = basename($path,".php"); // $file is set to "index"
// var_dump($file);
// $dirname = dirname($path);
// var_dump($dirname);
// $pathinfo = pathinfo($path);
// var_dump($pathinfo);

// $handle = @fopen('../test.php', 'r');
// $fstat = fstat($handle);
// $file = file('../test.php');
// var_dump($file);

// foreach ($file as $key => $value) {
// 	echo "Line -- $key :".$value."<br/>";
// }

// echo '<br/>-------------------------------<br/>';

// foreach ($file as $line_num => $line) {
// 	echo "Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />\n";
// }

// echo '<br/>-------------------------------<br/>';
// $fileGet = file_get_contents('../test.php');
// var_dump($fileGet);
// fclose($handle);
// print_r(array_slice($fstat, 13));