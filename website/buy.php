<?php

if(!isset($_SESSION["id_user"])){
    header("Location:index.php");
    exit;
}
$id_user=$_SESSION['id_user'];
$query="SELECT * FROM cart WHERE userid_cart=$id_user AND qt_cart>0";
$result=mysqli_query($link,$query);
$rows=mysqli_num_rows($result);
if($rows<1){
    header("Location:index.php");
    exit;
}


if(isset($_POST['buy']) && isset($_POST['shipping'])){

           
            $date=date('y-m-d');
            $shipping=$_POST['shipping'];

            $totalcost=mysqli_real_escape_string($link,$_POST['totalcost']);
            $prodcost=mysqli_real_escape_string($link,$_POST['prodcost']);
            $shipcost=mysqli_real_escape_string($link,$_POST['shipcost']);
            
            $query="INSERT INTO orders VALUES (NULL, '$id_user', '$date', '$prodcost', '$shipcost', '$totalcost', '$shipping')";
            $result=mysqli_query($link,$query);

            $query="SELECT id_ord from orders ORDER BY id_ord DESC";
            $result=mysqli_query($link,$query);
            $info=mysqli_fetch_array($result);
            
            $id_ord=$info["id_ord"];

            $query="SELECT * FROM cart AS C LEFT JOIN products as P ON C.prod_cart=P.id_prod WHERE C.userid_cart=$id_user AND qt_cart>0";
            $cartresult=mysqli_query($link,$query);
            
            while($items=mysqli_fetch_array($cartresult)) {

                $prod=$items['prod_cart'];
                $qt=$items['qt_cart'];
                $price=$items['price_prod'];

                $query="INSERT INTO item_ordered VALUES ('$id_ord', '$id_user', '$prod', '$qt', '$price', 'NULL')";
                $result=mysqli_query($link,$query);

                $stockquery="UPDATE products SET stock_prod = stock_prod - $qt WHERE id_prod=$prod";
                $stockresult=mysqli_query($link,$stockquery);
                }
            
            $query="DELETE FROM cart WHERE userid_cart=$id_user";
            $result=mysqli_query($link,$query);

            $incartmessage = '<p class="goodmessage">ORDER SUCCESS</p>';

            

}

?>