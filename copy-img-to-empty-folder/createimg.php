<?php
for ($id_path = 0; $id_path < 3; $id_path++) {
	if ($id_path == 1) {
		$path_folder = '../create-folder-from-db/animalia/';
		foreach (new DirectoryIterator($path_folder) as $folderInfo) {
			if ($folderInfo->isDot()) continue;
			// echo $folderInfo->getFilename()."<br>";
			/* foreach (new DirectoryIterator($path_folder . $folderInfo) as $fileInfo) {
				if ($fileInfo->isDot()) continue; */
				// echo $fileInfo->getFilename()."<br>";
				$path = $path_folder . $folderInfo . '/';
	
				// $foldername_arr = array_diff(scandir($path ), array('.', '..'));
				/* echo $path.' -> ';
                echo (count(glob("$path/*")) === 0) ? 'Empty' : 'Not empty';
                echo'<br>'; */
               
                if ((count(glob("$path/*")) === 0)){
                    if(!copy('C:/xampp/htdocs/image-tool/noimg.jpg',$path.'noimg.jpg')){
                        echo $path.' >> cant be copied!' ;
                        echo'<br>';
                    }
                    else{
                        echo $path.' >> has been copied!';
                        echo'<br>';
                    }
                }else{
                    echo $path.' -> Not empty';
                    echo'<br>';
                };
				
			}
		}
		// break;
    }


/* $dir = 'thumpnail-animalia/Accipiter badius'; // dir path assign here
  echo (count(glob("$dir/*")) === 0) ? 'Empty' : 'Not empty'; */
?>