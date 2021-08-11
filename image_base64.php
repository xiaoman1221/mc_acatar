<?php


// function Base64EncodeImage($ImageFile) {
    
//         if(file_exists($ImageFile) || is_file($ImageFile)){
//             $base64_image = '';
//             $image_info = getimagesize($ImageFile);
//             $image_data = fread(fopen($ImageFile, 'r'), filesize($ImageFile));
//             $base64_image = 'data:' . $image_info['mime'] . ';base64,' . chunk_split(base64_encode($image_data));
//             return $base64_image;
//         }
//         else {
//             return false;
//         }
//     }


//$file：图片地址
// //Filetype: JPEG,PNG,GIF
//     $file = "./xiaoman1221s-blog-bead.jpg";
//         if($fp = fopen($file,"rb", 0)){
//             $gambar = fread($fp,filesize($file));
//             fclose($fp);
//             $base64 = chunk_split(base64_encode($gambar));
//             //输出图片
//             //$encode = '<img src="data:image/jpg/png/gif;base64,' . $base64 .'" >';
//             echo $base64;
//         }