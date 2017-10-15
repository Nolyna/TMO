<?php

$path = '../assets/foodimg/';

function treatImage($img,$path ){
    $newPath="";               
    $validextensions = array("jpeg", "jpg", "png");   
    $temporary = explode(".",$img["name"]);
    $file_extension = end($temporary);

    if ((($img["type"] == "image/png") || ($img["type"] == "image/jpg") || ($img["type"] == "image/jpeg")) 
    && ($img["size"] < 100000)//Approx. 100kb files can be uploaded.
    && in_array($file_extension, $validextensions)) {
        if ($img["error"] > 0)  {
            echo "<script>console.log( 'Return Code: " . $img["error"]. "' );</script>";
            $newPath = "../assets/noimage.png";
        } else {
            while (file_exists($path.$img["name"])) {
                $filename=random_string(10);
                $newfilename=$filename.".". $file_extension;
                $img["name"]=$newfilename;
            }                     
            $sourcePath = $img['tmp_name']; // Storing source path of the file in a variable
            $newPath = $path.$img['name']; // Target path where file is to be stored
            move_uploaded_file($sourcePath,$newPath) ; // Moving Uploaded file
            resize_img($newPath);
        }
    } else {
        echo "<script>console.log( 'Invalid file nooo' );</script>";
        $newPath = "../assets/noimage.png";
    }        
    return  $newPath;
}

function valid($val){
    $val = trim($val);
    $val = stripcslashes($val);
    $val = htmlspecialchars($val);
    return $val;
}

function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));
    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }
    return $key;
}

function resize_img($filePath){
    $orig_image = imagecreatefromjpeg($filePath);
    $image_info = getimagesize($filePath); 
    $width_orig  = $image_info[0]; 
    $height_orig = $image_info[1];
    $width = 300; 
    $height = 200;
    $destination_image = imagecreatetruecolor($width, $height);
    imagecopyresampled($destination_image, $orig_image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
    imagejpeg($destination_image, $filePath, 100);
}

?>