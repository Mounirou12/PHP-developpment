<?php
$title = $_POST['title'];   
$description = $_POST['description'];
$price = $_POST['price'];
$imagePath ='';

if (!$title) {
    $errors[] ='Product title is required';
}

if (!$price) {
    $errors[] ='Product price is required';
}

$img="images";
if(!is_dir($img)){
    mkdir($img);
}

if(empty($errors)){
    $image =$_FILES['image'] ?? null;
    $imagePath = $product['image'];

    

    if($image && $image['tmp_name']) {
        if($product['image']){
            unlink($product['image']);
        }
        $imagePath = $img.'/'.RandomString(8).'/'.$image['name'];
        mkdir(dirname($imagePath));
        move_uploaded_file($image['tmp_name'],$imagePath);
    }
}