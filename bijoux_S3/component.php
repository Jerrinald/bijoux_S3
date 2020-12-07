<?php
function component($productid, $productname, $productimg, $productprice){
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<link rel="stylesheet" href="style1.css" />
	</head>
	<body>
	<form method="post" name="ajout" action="cart2.php?action=add&id=<?php echo $productid;?> ">
	    <div class="cart__table table-responsive">
	        <table width="100%" class="table">
	            <thead>
	                <tr>
	                    <th>PRODUCT</th>
	                    <th>NAME</th>
	                    <th>UNIT PRICE</th>
	                    <th>QUANTITY</th>
	                    <th>TOTAL</th>
	                </tr>
	            </thead>
	            <tbody>
	                <tr>
	                    <td class="product__thumbnail">
	                        <a href="#">
	                            <img src="./images/products/iPhone/<?php echo $productimg; ?>" alt="">
	                        </a>
	                    </td>
	                    <td class="product__name">
	                        <a href="#"><?php echo $productname; ?></a>
	                        <input type="hidden" name="hidden_name" value="<?php echo $productname; ?>" class="counter-btn">
	                        <br><br>
	                        <small>White/6.25</small>
	                    </td>
	                    <td class="product__price">
	                        <div class="price">
	                            <span class="new__price">$<?php echo $productprice; ?></span>
	                            <input type="hidden" name="hidden_price" value="<?php echo $productprice; ?>" class="counter-btn">
	                        </div>
	                    </td>
	                    <td class="product__quantity">
	                        <div class="input-counter">
	                            <div>
	                                <span class="minus-btn">
	                                    <svg>
	                                        <use xlink:href="./images/sprite.svg#icon-minus"></use>
	                                    </svg>
	                                </span>
	                                <input type="text" min="1" name="quantity" value="1" max="10" class="counter-btn">
	                                <span class="plus-btn">
	                                    <svg>
	                                        <use xlink:href="./images/sprite.svg#icon-plus"></use>
	                                    </svg>
	                                </span>
	                            </div>
	                        </div>
	                    </td>
	                    <td class="product__subtotal">
	                        <div class="price">
	                            <span class="new__price">$<?php echo $productprice; ?></span>
	                        </div>
	                        <a href="#" class="remove__cart-item">
	                            <svg>
	                                <use xlink:href="./images/sprite.svg#icon-trash"></use>
	                            </svg>
	                        </a>
	                        <input type="submit" value="Ajouter" name="add_to_cart" class="product__btn" style="width:65%">
	                    </td>
	                </tr>
	            </tbody>
	        </table>
	    </div>
	</form>
	</body>
	</html>
<?php }
?>