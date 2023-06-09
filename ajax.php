<?php

if(!file_exists('upload')){
    mkdir("upload",0777);
}
$filename=time().'_'.$_FILES['file']['name'];
$folder='upload/'.$filename;
if(move_uploaded_file($_FILES['file']['tmp_name'],'upload/'.$filename)) {
   
	echo $folder;
	
}



?>
