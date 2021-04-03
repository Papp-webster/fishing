<?php

include("db.php");


if(isset($_POST['water_name'])) {

  
  
  $location = "./fogasok";
  $post_image = $_FILES['image']['name'];
  $post_image_temp = $_FILES['image']['tmp_name'];
  $imageFileType = strtolower(pathinfo($location,PATHINFO_EXTENSION));
 
  $image_base64 = base64_encode(file_get_contents($post_image_temp) );
  $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
  
   
   move_uploaded_file($post_image_temp, "$location/$post_image");
  
    



$terulet_name = $_POST['water_name'];
$fish_name = $_POST['fish_name'];
$fish_weight = $_POST['fish_weight'];
$post_date = date("y.m.d");
$query = "INSERT INTO fogasok(img_fish, vizterulet, hal_fajta, hal_sulya, datum) VALUES('{$image}', '{$terulet_name}', '{$fish_name}','{$fish_weight}', '{$post_date}')";
$update_hal = mysqli_query($connect, $query);
    
if(!$update_hal) {

die("adatbázis hibás:" . mysqli_error($connect));

}
    
    
header("Location: index.php");



}




?>