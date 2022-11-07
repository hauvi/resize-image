<?php

ini_set('memory_limit', '-1');
set_time_limit(3600);

function thumbnail($src_url, $type, $src_name, $sUploadDir, $iWidth)
{
	$dst_path = $sUploadDir;
	$dst_name = "$src_name";
	//$scale = 0.2;
	$quality = 100; # [0-100], 100 being max.
	//----------------------------------------------
	$dst_url = $dst_path . $dst_name;
	$src_size = getimagesize($src_url);
	# calculate h and w for thumb:
	$dst_w =    $iWidth; //$src_size[0]*$scale;
	$dst_h = $src_size[1] / $src_size[0] * $dst_w; //$scale;
	$dst_img = imagecreatetruecolor($dst_w, $dst_h);
	switch ($type) {
		case "image/jpeg":
			$src_img = ImageCreateFromjpeg($src_url);
			imagecopyresampled($dst_img, $src_img, 0, 0, 0, 0, $dst_w, $dst_h, ImageSX($src_img), ImageSY($src_img));
			imagejpeg($dst_img, $dst_url, $quality); # output the in-memory file to disk
			imagedestroy($dst_img); # free memory. important if you create many images at once
			break;
		case "image/pjpeg":
			break;
		case "image/jpg":
			$src_img = ImageCreateFromjpeg($src_url);
			break;
		case "image/gif":
			$src_img = imagecreatefromgif($src_url);
			break;
		case "image/x-png":
			$src_img = imagecreatefrompng($src_url);
			imagecopyresampled($dst_img, $src_img, 0, 0, 0, 0, $dst_w, $dst_h, ImageSX($src_img), ImageSY($src_img));
			imagepng($dst_img, $dst_url, $quality); # output the in-memory file to disk
			imagedestroy($dst_img); # free memory. important if you create many images at once
			break;
		default:
			echo "Chi duoc upload file co dinh dang GIF, PNG, JPEG (JPG)! <input type=button value='Lam lai' onClick='javascript:history.go(-1);'>";
			exit();
	}
}
if (isset($_REQUEST['file'])) {
	$path_folder = $_REQUEST['file'];
	$path_folder = str_replace('\\', '/', $path_folder);
	$output_path_folder = $path_folder . '-rsz/';
	$path_folder = $path_folder . '/';
	!mkdir($output_path_folder, 0755, true);

	foreach (new DirectoryIterator($path_folder) as $folderInfo) {
		if ($folderInfo->isDot()) continue;
		// echo $folderInfo->getFilename()."<br>";
		foreach (new DirectoryIterator($path_folder . $folderInfo) as $fileInfo) {
			if ($fileInfo->isDot()) continue;
			// echo $fileInfo->getFilename()."<br>";
			$path = $path_folder . $folderInfo . '/' . $fileInfo;
			$output_path = $output_path_folder . $folderInfo . '/';



				
				if (!file_exists($output_path)) {
					if (!mkdir($output_path, 0755, true)) {
						echo $output_path . ' >> cant create';
						echo '<br>';
					} else {
						echo $output_path . ' >> created';
						echo '<br>';
						
					}
				} else {
					echo $output_path . ' >> exist';
					echo '<br>';
				}
				echo $output_path . '<br>';
				thumbnail($path, "image/jpeg", $fileInfo, $output_path_folder . $folderInfo . '/', 800);
			

			// $foldername_arr = array_diff(scandir($path ), array('.', '..'));

		}
	}
}
