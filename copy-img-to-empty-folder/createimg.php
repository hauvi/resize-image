<?php
if(isset($_REQUEST['file'])){
    $path_folder = $_REQUEST['file'];
    $path_folder = str_replace('\\','/',$path_folder).'/';

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
?>