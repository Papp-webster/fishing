<?php 

include("db.php");


//if($connection) {
//
//echo "Yes it is";
//
//}

$search = $_POST['search'];


if(!empty($search)) {

$query = "SELECT * FROM fogasok WHERE title LIKE '$search%' ";
$search_query = mysqli_query($connect,$query);
$count = mysqli_num_rows($search_query);    

    
   if(!$search_query) {
   
   die('QUERY FAILED' . mysqli_error($connect));
   
   
   }
    
    
    
    if($count <= 0) {
    
     echo "Sorry we don't have that fish available";
   
    
    } else {
    
    
    
     while($row = mysqli_fetch_array($search_query)) {
    
        $brand = $row['title'];
        
        ?>
        
        <ul class='list-unstyled'>
            
        <?php
            
            echo "<li>{$brand} in stock</li>";
            
            
            
            
          ?>  
        </ul>
        
        
        
    
    
    
  <?php  }
    
    
    
    
    
    }
    
   
    







}
















?>