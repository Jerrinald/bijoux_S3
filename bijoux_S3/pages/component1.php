<?php
function component($productid, $productname, $productimg, $productprice){
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" href="style1.css" />
    </head>
    <body>
        <form method="post" name="ajout" action="?action=add&id=<?php echo $productid;?> ">
        <td style="width:22%">
            <div class="product__thumbnail">
                <a href="#">
                <img src="../images/products/<?php echo $productimg; ?>" alt=""></a>
                <br><?php echo $productname; ?>
                <input type="hidden" name="hidden_name" value="<?php echo $productname; ?>">
                <br><br>
                <span class="new__price"><?php echo $productprice; ?></span>
                <input type="hidden" name="hidden_price" value="<?php echo $productprice; ?>"> 
                <div class="input-counter">
                    <div>
                        <span class="minus-btn">
                            <svg>
                                <use xlink:href="../images/sprite.svg#icon-minus"></use>
                            </svg>
                        </span>
                        <input type="text" min="1" name="quantity" value="1" max="10" class="counter-btn">
                        <span class="plus-btn">
                            <svg>
                                <use xlink:href="../images/sprite.svg#icon-plus"></use>
                            </svg>
                        </span>
                    </div>
                </div>                  
                <div class="price">
                    <span class="new__price"><?php echo 'Total : ' . $productprice; ?></span>
                </div>
                <input type="submit" value="Ajouter" name="add_to_cart" class="product__btn" style="width:65%">
            </div>
        </td> 
        </form>     
    </body>
    </html>
<?php }
?>