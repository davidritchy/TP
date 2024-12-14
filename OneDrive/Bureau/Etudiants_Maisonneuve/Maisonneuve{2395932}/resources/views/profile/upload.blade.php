<?php
 

 
$filepath = 'clients\\fichier.zip';
$filename = basename ($filepath);
 
if (file_exists($filepath)) {
	echo "Download OK";
	echo "<br>";
    echo $filepath;
    echo "<br>";
    echo $filename;
}
else {
	echo "Download KO";
	echo "<br>";
    echo $filepath;
    echo "<br>";
    echo $filename;
}
 
 switch(strrchr($filename, ".")) {
 
case ".gz": $type = "application/x-gzip"; break;
case ".tgz": $type = "application/x-gzip"; break;
case ".zip": $type = "application/zip"; echo "zip"; break;
case ".pdf": $type = "application/pdf"; break;
case ".png": $type = "image/png"; break;
case ".gif": $type = "image/gif"; break;
case ".jpg": $type = "image/jpeg"; break;
case ".txt": $type = "text/plain"; break;
case ".htm": $type = "text/html"; break;
case ".html": $type = "text/html"; break;
case ".xml": $type = "text/xml"; break;
default: $type = "application/octet-stream"; break;
 
}
 
 
header("Content-disposition: attachment; filename=$filepath");
/*
header("Content-Type: application/force-download");
header("Content-Transfer-Encoding: $type\n");
header("Content-Length: ".filesize($filepath));
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0, public");
header("Expires: 0");
 
readfile($filepath);
*/
 
 
?>
