<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ADD PRODUCTS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="products.css">
    <script src="main.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>

<body>
    <div id="container">
        <div id="helloMenu">
            <?php 
                session_start();
                if(!isset($_SESSION['alogin'])){
                    header('Location:adminform.php');
                    exit;
                }

                echo 'Hi ';
                echo $_SESSION['alogin'];
                echo " ";
                echo '<a href="logout.php"><input type="button" value="LOGOUT"></a>';
                echo '<br>';
                        
            ?>
        </div>
        <div id="form">
            <form action="products.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="name" placeholder="Product name"><br><br>
                <input type="number" step="0.01" name="price" placeholder="Price"><br><br>
                <?php

                    $query="SELECT * FROM categories ORDER BY name_cat ASC";
                    $result=mysqli_query($link,$query);
                    $rows=mysqli_num_rows($result);

                    if($rows>0){
                        echo '<select name="cat">';
                        echo "<option>CHOOSE CATEGORIE</option>";

                        while ($cat=mysqli_fetch_array($result)) {
                            echo '<option value="'.$cat['id_cat'].'">'.$cat['name_cat'].'</option>';
                        }
                        echo '</select>';
                    }
                
                ?><br><br>
                <textarea cols="40" rows="5" style="width:200px; height:50px;" name="desc"
                    placeholder="Description"></textarea><br><br>
                <input type="text" name="color" placeholder="Color"><br><br>
                <label for="size">Size</label>
                <select id="size" name="size">
                    <option value="0">Small</option>
                    <option value="1">Medium</option>
                    <option value="2">Large</option>
                    <option value="3">XLarge</option>
                </select><br><br>
                <input type="number" step="1" name="stock" placeholder="Stock"><br><br>
                <input type="file" name="img" placeholder="Image link"><br>
                HOMEPAGE<input type="checkbox" name="homepage" value="1"><br><br>
                <input type="submit" value="ADD PRODUCT" name="add"><br>
            </form>
        </div>
    </div>

    <?php
        include('conn.php');

        if(isset($_POST['add'])){
            //zmienne z inputow
            $name=mysqli_real_escape_string($link,$_POST['name']);
            $price=mysqli_real_escape_string($link,$_POST['price']);
            $cat=mysqli_real_escape_string($link,$_POST['cat']);
            $desc=mysqli_real_escape_string($link,$_POST['desc']);
            $color=mysqli_real_escape_string($link,$_POST['color']);
            $size=mysqli_real_escape_string($link,$_POST['size']);
            $stock=mysqli_real_escape_string($link,$_POST['stock']);
            $homepage=mysqli_real_escape_string($link,$_POST['homepage']);

            if(empty($name)){
                echo 'Please fill in the name input';
                exit;
            }


            //dodawanie obrazu
            if(isset($_FILES['img']) || is_uploaded_file($_FILES['img']['tmp_name'])){
                $upload_dir="C:/xampp/htdocs/website/images/";
                $img_tmp=$_FILES['img']['tmp_name'];
                $img_real=$_FILES['img']['name'];
                
            /*

                if(file_exists($upload_dir.$img_real)){

                    exit; 
                }
            */                
                     //sprawdanie rozserzenia
                    $ext_ok=array('jpg','jpeg','gif');
                    $temp=explode('.',$_FILES['img']['name']);
                    $ext=end($temp);
                    if(!in_array($ext,$ext_ok)){
                        echo "Image extension not allowed";
                    }
                    if(move_uploaded_file($img_tmp,$upload_dir.$img_real)){
                        echo 'file uploaded ';
                        $namefordb=$img_real;
                    }
                    else{
                        echo 'Error file not uploaded ';
                        $namefordb='';
                    
                    }
                
            }

            $query="INSERT INTO products VALUES (NULL, '$name', '$price', '$cat', '$desc', '$color', '$size', '$stock', '$namefordb', '$homepage')";
            
            $result=mysqli_query($link,$query);
            
            if($result){
                echo 'Item added';
            }
            else{
                echo 'Sorry, a problem has accured';
                
            }
        }//close isset
    ?>

</body>

</html>