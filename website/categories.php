<div id="categories">
    <form action="index.php" method="POST">
        <input id="search" type="text" placeholder="Search items" name="s_string">
        <button type="submit" name="s_submit"><i class="fa fa-search"></i></button><br><br><br>
    </form>
    
    <b>CATEGORIES</b><br>
    <a href="index.php?all">ALL</a><br>
    <?php
        
         ;

        $query="SELECT * FROM categories ORDER BY name_cat ASC";
        $result=mysqli_query($link,$query);
        $rows=mysqli_num_rows($result);

        if($rows>0){
            while ($cat=mysqli_fetch_array($result)) {
                echo '<a href="index.php?id_cat='.$cat['id_cat'].'">'.$cat['name_cat'].'</a>';
                echo '<br>';
            }
            echo '</select>';
        }

    ?>
    </div>