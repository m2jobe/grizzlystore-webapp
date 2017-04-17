<?php 
    require_once("header.php");

?>
<style>
#productDiv > div > div > div > button
 {

      bottom: 20px;
    position: absolute;
}
</style>
  <div class="container">
        <div class="container">
            <header class="page-header">
                <h1 class="page-title">Grizzly Products</h1>
                
            </header>
            <div id="productDiv" class="row" data-gutter="15">
                
                
            <div class="row">
              
            </div>
        </div>
        <div class="gap"></div>

<?php 
    require_once("footer.php");
?>

<script>

firebase.auth().onAuthStateChanged(function(user) {
  if (user) {
    // User is signed in.
  } else {

  }
});


firebase.database().ref('/products/').once('value').then(function(snapshot) {
    var productBuilder = ""
    snapshot.forEach(function(child){
        var key = child.key;
        var value = child.val();
        productBuilder += '<div class="col-md-3"> <div class="product "> <ul class="product-labels"></ul> <div class="product-img-wrap"> <img class="product-img-primary" width="155" height="155" src="'+value.image+'" alt="Image Alternative text" title="Image Title" /> <img class="product-img-alt" width="155" height="155" src="'+value.image+'" alt="Image Alternative text" title="Image Title" />  <a class="product-caption-title" href="product-page.php?title='+escape(value.title)+'&price='+value.price+'&image='+value.image+'&description='+escape(value.description)+'">'+value.title+'</a> <div class="product-caption-price"><span class="product-caption-price-new">$'+value.price+'</span> </div> <br/> <button onclick="addToCart(&quot;'+escape(value.title)+'&quot;, &quot;'+value.price+'&quot;, &quot;'+value.image+'&quot;)" class="btn-primary"> Add to Cart </button> </div> </div> </div>';

    });
    $('#productDiv').html(productBuilder);
  // ...
});

function addToCart(title, price, image) {
    console.log("hi");
    var myItem = simpleCart.add({ name: title , price: price,  "image" : image  });
            new PNotify({
                title: 'Added to cart',
                type: 'success'
            });

}
</script>