<?php
    require_once("header.php");
?>

        <div class="container">
            <header class="page-header">
                <h1 class="page-title">My Shopping Bag</h1>
            </header>
            <div class="row">
                <div class="col-md-9">
                    <table class="table table table-shopping-cart">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Title</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <!--<div class="simpleCart_items"></div>-->

                        <tbody id="shoppingCart">

                        </tbody>
                    </table>
                    <div class="gap gap-small"></div>
                </div>
                <div class="col-md-3">
                    <ul class="shopping-cart-total-list">
                        <li><span>Subtotal</span><span><div class="simpleCart_total"></div></span>
                        </li>
                        <li><span>Shipping</span><span>Free</span>
                        </li>
                        <li><span>Taxes</span><span>$0</span>
                        </li>
                        <li><span>Total</span><span><div class="simpleCart_grandTotal"></div></span>
                        </li>
                    </ul>
                    <input type="text" placeholder="Input postal code" class="form-control" id="postalCode" > <br/>
                    <a class="btn btn-primary" id="stripe-button" href="#">Checkout</a>
                </div>
            </div>
            <ul class="list-inline">
                <li><a class="btn btn-default" href="category.php">Continue Shopping</a>
                </li>
                <li><a class="btn btn-default" href="shopping-cart.php">Update Bag</a>
                </li>
            </ul>
        </div>
        <div class="gap"></div>

  

<?php
    require_once("footer.php");
?>
<script src="https://checkout.stripe.com/checkout.js"></script>

<script>


document.getElementById('stripe-button').addEventListener('click', function(e) {
  // Open Checkout with further options:
  if ($('#postalCode').val() === "" ) {
                new PNotify({
                title: 'Postal code field empty',
                type: 'error'
            });
  }
  else {
  var handler = StripeCheckout.configure({
  key: 'pk_test_f2bzKl91rUbufV5pInrv9XBY',
  image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
  locale: 'auto',
  token: function(token) {
      location.replace("order-summary.php?postal="+$('#postalCode').val());
      console.log("reeload");
    // You can access the token ID with `token.id`.
    // Get the token ID to your server-side code for use.
  }
});
  handler.open({
    name: 'Grizzly Tech',
    currency: 'cad',
    amount: simpleCart.total() *100
  });
  e.preventDefault();
 
	var user = firebase.auth().currentUser;
	var orderNo = Math.random().toString(36).slice(2);
	var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();

if(dd<10) {
    dd='0'+dd
} 

if(mm<10) {
    mm='0'+mm
} 
today = mm+'/'+dd+'/'+yyyy;

var itemCount = 1;
simpleCart.each(function( item , x ){
firebase.database().ref('users/'+user.uid+'/orders/' +orderNo+'-' +itemCount+'/' ).set({
			name: item.get("name"),
			price: item.get("price"),
			date: today,
      postal: $('#postalCode').val()
		}).then(function() {
			itemCount++;
		  })
		  .catch(function(error) {

		  }); 
});
}
 
});

// Close Checkout on page navigation:
/*window.addEventListener('popstate', function() {
  //handler.close();
  location.replace("order-summary.php?postal="+$('#postalCode').val());
});
*/

document.addEventListener('DOMContentLoaded', function() {
var cartBuilder = "";

simpleCart.each(function( item , x ){
    cartBuilder += '<tr> <td class="table-shopping-cart-img"> <a href="#"> <img src="'+item.get("image")+'" width=100 height=100 alt="Image Alternative text" title="Image Title" /> </a> </td> <td class="table-shopping-cart-title"><a href="#">'+decodeURI(item.get("name"))+'</a> </td> <td>$'+item.get("price")+'</td> <td> <input class="form-control table-shopping-qty" type="text" value="'+item.get("quantity")+'" disabled/> </td> <td>$'+item.get("price")+'</td> <td> <a class="fa fa-close table-shopping-remove" onclick="remove(&quot;'+item.id()+'&quot;)" href="#"></a> </td> </tr>';

});

$('#shoppingCart').html(cartBuilder);
}, false);



function remove(id) {
  simpleCart.each( function( item ){
    if ( item.get("id") === id )
        {
            item.remove();
        }
      });

  location.reload();
}
</script>
