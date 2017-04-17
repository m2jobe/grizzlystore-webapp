<?php 
    require_once("header.php");

    $title = $_GET["title"];
    $price = $_GET["price"];
    $image = $_GET["image"];
    $description = $_GET["description"];

    if($_GET["title"]) { 

    } else {
           header( 'Location: index.php' ) ;

    }

?>

        <div class="container">
    
        </div>
        <div class="product-page-area">
            <div class="container">
            <br/>
                <div class="row">
                    <div class="col-md-6">
                        <img class="full-width" src="<?php echo $image ?>" alt="img" title="Image Title" />
                    </div>
                    <div class="col-md-6">
                    </div>
                        </p>
                        <br/>
                        <h1>Product Title: <?php echo $title ?></h1>
                        <p class="product-page-price">Price: $<?php echo $price ?></p>
                        <br/>
                        <p class="text-muted text-sm">Free Shipping</p>
                        <p class="product-page-desc-lg"><?php echo $description ?></p>

                        <ul class="product-page-actions-list">
                            <li class="product-page-qty-item">
                                <button class="product-page-qty product-page-qty-minus">-</button>
                                <input class="product-page-qty product-page-qty-input" type="text" value="1" id="quantity" />
                                <button class="product-page-qty product-page-qty-plus">+</button>
                            </li>
                            <br/>
                            <li><a style="margin-top:-24px" class="btn btn-lg btn-primary" onclick="addToCart()" ><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="gap"></div>
        <div class="container">
            
            <div class="gap"></div>
        </div>

<?php 
    require_once("footer.php");
?>

<script>
function addToCart() {
    var title = "<?php echo $title ?>";
    var price = '<?php echo $price ?>';
    var image = '<?php echo $image ?>';

    var quantity = $('#quantity').val();
    console.log("hi");
    var myItem = simpleCart.add({ name: title , price: price, quantity: quantity,  "image" : image  });
            new PNotify({
                title: 'Added to cart',
                type: 'success'
            });

}
</script>