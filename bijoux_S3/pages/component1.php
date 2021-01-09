<?php
function component1($productid, $productname, $productimg, $productprice){
    //affichage des produits avec le prix HT
    ?>
    <!DOCTYPE html>
    <head>
        <script language="javascript">
            function minmax(value, min, max) 
            {
                if(parseInt(value) < min) 
                    return 1; 
                else if(parseInt(value) > max) 
                    return 3; 
                else return value;
            }
        </script>
    </head>
    <body>
        <form method="post" name="ajout" action="?action=add&id=<?php echo $productid;?> ">
        <td style="width:22%">
            <div class="product__thumbnail">
                <a href="details_produit.php?id=<?php echo $productid;?>">
                <img src="../images/products/<?php echo $productimg; ?>" alt=""></a>
                <br> <a href="details_produit.php?id=<?php echo $productid;?>"><?php echo $productname; ?></a>
                <input type="hidden" name="hidden_name" value="<?php echo $productname; ?>">
                <br><br>
                <br/><span class="new__price"><?php if($productprice!=0){echo "Prix HT : " . $productprice;}else{echo "A préciser";} ?></span>
                <input type="hidden" name="hidden_price" value="<?php echo $productprice; ?>"> 
                <div class="input-counter">
                    <div>
                        <label for="1" style="margin-top: 10px; margin-right: 10px">Quantité désirée :</label>
                        <input type="text" name="quantity" maxlength="5" value="1" onkeyup="this.value = minmax(this.value, 1, 3)" class="counter-btn">
                    </div>
                </div>                  
                <div class="price">
                </div>
                <input type="submit" value="Ajouter" name="add_to_cart" class="product__btn" style="width:65%">
            </div>
        </td> 
        </form>     
    </body>
    </html>
<?php }

function component2($productid, $productname, $productimg, $productprice){
    //affichage des produits avec le prix TTC
    ?>
    <!DOCTYPE html>
    <head>
        <script language="javascript">
            function minmax(value, min, max) 
            {
                if(parseInt(value) < min) 
                    return 1; 
                else if(parseInt(value) > max) 
                    return 3; 
                else return value;
            }
        </script>
    </head>
    <body>
        <form method="post" name="ajout" action="?action=add&id=<?php echo $productid;?> ">
        <td style="width:22%">
            <div class="product__thumbnail">
                <a href="details_produit.php?id=<?php echo $productid;?>">
                <img src="../images/products/<?php echo $productimg; ?>" alt=""></a>
                <br> <a href="details_produit.php?id=<?php echo $productid;?>"><?php echo $productname; ?></a>
                <input type="hidden" name="hidden_name" value="<?php echo $productname; ?>">
                <br><br>
                <span class="new__price"><?php if($productprice!=0){echo "Prix TTC : " . $productprice;}else{echo "A préciser";} ?></span>
                <input type="hidden" name="hidden_price" value="<?php echo $productprice; ?>"> 
                <div class="input-counter">
                    <div>
                        <label for="1" style="margin-top: 10px; margin-right: 10px">Quantité désirée :</label>
                        <input type="text" name="quantity" maxlength="5" value="1" onkeyup="this.value = minmax(this.value, 1, 3)" class="counter-btn">
                    </div>
                </div>                  
                <div class="price">
                </div>
                <input type="submit" value="Ajouter" name="add_to_cart" class="product__btn" style="width:65%">
            </div>
        </td> 
        </form>     
    </body>
    </html>
<?php }

?>