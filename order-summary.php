<?php 
    require_once("header.php");
    $postal = $_GET["postal"];
?>
        <div class="gap"></div>
        <div class="container">
            <div class="payment-success-icon fa fa-check-circle-o"></div>
            <div class="payment-success-title-area">
                <h1 class="payment-success-title" id="userTitle"></h1>
                <p class="lead">Order details has been send to <strong id="userEmail"></strong>
                </p>
            </div>
            <div class="gap gap-small"></div>
            <div class="row row-col-gap">
                <div class="col-md-4">
                    <h3 class="widget-title">Order Summary</h3>
                    <div class="box">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>QTY</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody id="shoppingCart">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-4">
                    <h3 class="widget-title">Billing/Shipping Details</h3>
                    <div class="box" id="billingAddr">
                       <table class="table">
                            <thead>
                                <tr>
                                    <th>Shipping Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>DHL Shipping</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Canada</td>
                                </tr>
                                <tr>
                                    <td id="postalCode"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
               
            </div>
        </div>
        <div class="gap"></div>
<?php 
    require_once("footer.php");
?>

<script>
firebase.auth().onAuthStateChanged(function(user) {
  if (user) {
    console.log("here");
    if(user.email == null) {
    $('#userEmail').text("anon");

    } else {
    $('#userEmail').text("We will update you in a day or two about your order at "+user.email);
    }

    $('#userTitle').text("Your payment was successful!");


  } else {
 

  }
});

document.addEventListener('DOMContentLoaded', function() {
var cartBuilder = "";

simpleCart.each(function( item , x ){

    cartBuilder += '<tr><td>'+decodeURI(item.get("name")).substring(0,20)+'</td><td>'+item.get("quantity")+'</td><td>$'+item.get("price")+'</td></tr>';


});

$('#shoppingCart').html(cartBuilder);
var postalCode = "<?php echo $postal ?>";

$('#postalCode').text("Postal code: " + postalCode);
simpleCart.empty();

}, false);


</script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/icheck.js"></script>
    <script src="js/ionrangeslider.js"></script>
    <script src="js/jqzoom.js"></script>
    <script src="js/card-payment.js"></script>
    <script src="js/owl-carousel.js"></script>
    <script src="js/magnific.js"></script>
    <script src="js/custom.js"></script>


