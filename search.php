<?php 

include("db.php");




$search = $_POST['search'];


if(!empty($search)) {

$query = "SELECT * FROM fogasok WHERE hal_fajta LIKE '$search%' ";
$search_query = mysqli_query($connect,$query);
$count = mysqli_num_rows($search_query);    

    
   if(!$search_query) {
   
   die('QUERY FAILED' . mysqli_error($connect));
   
   
   }
    
    
    
    if($count <= 0) {
    
     echo "Sajnáljuk jelenleg nincs ilyen halfajunk!";
   
    
    } else {
    
    
    
     while($row = mysqli_fetch_array($search_query)) {
    
        $fishrace = $row['hal_fajta'];
        $fish_weight = $row['hal_sulya'];
        ?>
        
        <ul class='list-unstyled'>
            
        <?php
            
            echo "<li>{$fishrace} talált az adatbázisban ennyi kilóban {$fish_weight}!</li>";
            
            
            
            
          ?>  
        </ul>
        
        
        
    
    
    
  <?php  }
    
 
    
    }
    
 
}


?>