<?php
        if(isset($_POST['buy'])){
            if(isset($_SESSION['id_user'])){
                $id_prod=$_POST['buy'];
                $id_user=$_SESSION['id_user'];

                $query="SELECT * FROM cart AS C LEFT JOIN  products as P ON C.prod_cart=P.id_prod WHERE C.userid_cart=$id_user AND prod_cart=$id_prod";
                $result=mysqli_query($link,$query);
                $rows=mysqli_num_rows($result);

                if($rows>0){
                    $item_info=mysqli_fetch_array($result);
                    $id_cart=$item_info['id_cart'];
                    $qt_cart=$item_info['qt_cart'];
                    $stock=$item_info['stock_prod'];
                    $qt_cart++;

                    if($qt_cart<=$stock){
                        $query="UPDATE cart SET qt_cart=$qt_cart WHERE id_cart=$id_cart";
                        $result=mysqli_query($link,$query);

                        $addcartmessage = '<p class="goodmessage">'.$qt_cart." items added to your cart</p>";
                    }
                    else{
                        $addcartmessage = '<p class="errormessage">Maximum amount of items are already in your cart</p>';
                    }
                }
                else{
                    $query="INSERT INTO cart VALUES (NULL ,$id_user, '$id_prod', '1')";
                    
                    $result=mysqli_query($link,$query);
                    $addcartmessage =  '<p class="goodmessage">Item added to your cart</p>';
                }
            }
            else{
                $addcartmessage =  '<p class="errormessage">Please log in to buy products</p>';
            }
        
        }
    
    ?>