<div id="items">
<?php
    if(!isset($_SESSION["id_user"])){
        $incartmessage = '<p class="errormessage">Please log in to access orders</p>';
        if(isset($incartmessage)){
            echo $incartmessage;
        }
        exit;
    }

	$id_user=$_SESSION['id_user'];
    $query="SELECT * FROM orders AS O LEFT JOIN shipping AS S ON O.ship_ord=S.id_ship WHERE user_ord=$id_user ORDER BY O.id_ord DESC";
    $result=mysqli_query($link,$query);
    $rows=mysqli_num_rows($result);


    if($rows>0){
        while ($order=mysqli_fetch_array($result)) {
            echo '<div class="checkoutprod">';
            echo 'Order nr.'.$order['id_ord'].'';
            echo '   ';
            echo 'Order Date: '.$order['date_ord'].'';
            echo '<div class="checkoutcontent">';
            echo 'SHIPPING: ';
            echo $order['addressname_ship'];
            echo ', ';
            echo $order['name_ship'];
            echo ', ';
            echo $order['tel_ship'];
            echo ', ';
            echo $order['address1_ship'];
            echo ', ';
            if(!empty($order['address2_ship'])){
                echo $order['address2_ship'];
                echo ', ';   
            }
            echo $order['zip_ship'];
            echo ', ';
            echo $order['city_ship'];
            echo ', ';
            echo $order['country_ship'];
            echo '</div>';
            $sumprice=0;
            $itemnumber=0;
            $id_order=$order['id_ord'];
            $itemsquery="SELECT * FROM item_ordered as I LEFT JOIN products as P ON I.prod_itmord=P.id_prod WHERE I.ord_itmord=$id_order";
            $itemsresult=mysqli_query($link,$itemsquery);
            $itemsrows=mysqli_num_rows($itemsresult);
            if($itemsrows>0){
                while ($items=mysqli_fetch_array($itemsresult)){
                    $itemnumber++;
                    $price=$items['prodprice_itmord'    ]*$items['qt_itmord'];
                    $sumprice=$sumprice+$price;
                    echo '<div class="checkoutcontent">';
                    echo $itemnumber.'. ';
                    echo $items['qt_itmord'].'x ';
                    echo $items['name_prod'].", ";
                    echo $items['color_prod'].", ";
                    echo ' Cost: <b>'.$price.' </b> <i class="fa fa-eur"></i> ';
                    echo '</div>';
                }
            }
            echo '<div class="checkoutcontent">';
            echo 'SHIPPING: <b>'.$order['shipcost_ord'].'</b> <i class="fa fa-eur"></i> ';
            echo 'TOTAL: <b>'.$order['totcost_ord'].'</b> <i class="fa fa-eur"></i> ';
            echo '</div>';
            echo '</div>';
        }
    
    }
?>
</div>