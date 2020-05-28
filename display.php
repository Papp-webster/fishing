
<?php

include("db.php");

    $query = "SELECT * FROM fogasok";
    $query_fish_info = mysqli_query($connect, $query);

        if(!$query_fish_info) {

        die("adatbázis hibás:" . mysqli_error($connect));


        }

        while($row = mysqli_fetch_array($query_fish_info)) {
            $fish_id = $row['id'];
            $fish_img = $row['img_fish'];
            $water_name = $row['vizterulet'];
            $fish_name = $row['hal_fajta'];
            $fish_weight = $row['hal_sulya'];
            $date = $row['datum'];
            echo "<tr>";

            echo "<td>{$fish_id}</td>";
            echo "<td><img src='$fish_img' width='150' alt='kep'/></td>";
            echo "<td>{$water_name}</td>";
            echo "<td>{$fish_name}</td>";
            echo "<td>{$fish_weight}</td>";
            echo "<td>{$date}</td>";
            


            echo "</tr>";
            
        
        
        }




?>





