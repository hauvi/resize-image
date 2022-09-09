<?php
ini_set('memory_limit', '-1');
set_time_limit(3600);

function thumbnail($src_url, $type, $src_name, $sUploadDir, $iWidth){
	$dst_path = $sUploadDir; 
	$dst_name = "$src_name";
	//$scale = 0.2;
	$quality = 100; # [0-100], 100 being max.
	//----------------------------------------------
	$dst_url = $dst_path.$dst_name;
	$src_size= getimagesize($src_url);
	# calculate h and w for thumb:
	$dst_w=    $iWidth;//$src_size[0]*$scale;
	$dst_h= $src_size[1]/$src_size[0]*$dst_w;//$scale;
	$dst_img=imagecreatetruecolor($dst_w,$dst_h);
	switch($type)
	{
		case "image/jpeg":
			$src_img=ImageCreateFromjpeg($src_url);
			imagecopyresampled($dst_img,$src_img,0,0,0,0,$dst_w,$dst_h,ImageSX($src_img),ImageSY($src_img));
			imagejpeg($dst_img,$dst_url,$quality); # output the in-memory file to disk
			imagedestroy($dst_img); # free memory. important if you create many images at once
			break;
		case "image/pjpeg":
			break;
		case "image/jpg":
			$src_img=ImageCreateFromjpeg($src_url);
			break;
		case "image/gif":
			$src_img=imagecreatefromgif($src_url); 
			break;
		case "image/x-png":
			$src_img=imagecreatefrompng($src_url); 
			imagecopyresampled($dst_img,$src_img,0,0,0,0,$dst_w,$dst_h,ImageSX($src_img),ImageSY($src_img));
			imagepng($dst_img,$dst_url,$quality); # output the in-memory file to disk
			imagedestroy($dst_img); # free memory. important if you create many images at once
			break;
		default:
			echo "Chi duoc upload file co dinh dang GIF, PNG, JPEG (JPG)! <input type=button value='Lam lai' onClick='javascript:history.go(-1);'>";
		exit();
	}
	
}

// thumbnail("http://my.weather.gov.hk/PDADATA/mtsate/MTSAT1RIR/mtsat_6.jpg", "image/jpeg", date("dmYH").".jpg", "/opt/lampp/htdocs/tmp/", 100);


for ($id_path = 0; $id_path < 3; $id_path++) {
	if ($id_path == 1) {
		$path_folder = 'img-fungi/';
		foreach (new DirectoryIterator($path_folder) as $folderInfo) {
			if ($folderInfo->isDot()) continue;
			// echo $folderInfo->getFilename()."<br>";
			foreach (new DirectoryIterator($path_folder . $folderInfo) as $fileInfo) {
				if ($fileInfo->isDot()) continue;
				// echo $fileInfo->getFilename()."<br>";
				$path = $path_folder . $folderInfo . '/' . $fileInfo;
	
				// $foldername_arr = array_diff(scandir($path ), array('.', '..'));
				echo $path.'<br>';
				thumbnail($path, "image/jpeg", $fileInfo, $path_folder. $folderInfo.'/', 90);
				
			}
		}
		// break;
	} elseif ($id_path == 2) {
		$path_folder = 'img-plantae/';
		foreach (new DirectoryIterator($path_folder) as $folderInfo) {
			if ($folderInfo->isDot()) continue;
			// echo $folderInfo->getFilename()."<br>";
			foreach (new DirectoryIterator($path_folder . $folderInfo) as $fileInfo) {
				if ($fileInfo->isDot()) continue;
				// echo $fileInfo->getFilename()."<br>";
				$path = $path_folder . $folderInfo . '/' . $fileInfo;
	
				// $foldername_arr = array_diff(scandir($path ), array('.', '..'));
				echo $path.'<br>';
				thumbnail($path, "image/jpeg", $fileInfo, $path_folder.$folderInfo.'/', 90);
			}
		}
		break;
	}

	
}



// thumbnail("h1.jpg", "image/jpeg", "h2x100.jpg", "C:/xampp/htdocs/thumpnail/", 100);

// thumbnail("img-fungi/aa/IMG_7790-N.JPG", "image/jpeg", "IMG_7790-Nx100.jpg", "C:/xampp/htdocs/thumpnail/", 100);

?>