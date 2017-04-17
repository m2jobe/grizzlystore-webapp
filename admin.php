<?php 
	require_once("header.php");
?>

<div class="container">
<br/><br/>

<div>
<label>Title</label>
<input id="title" type="text" name="text" />				
<label>Price</label>
<input id="price" type="text" name="text" />
<label>Description</label>
<textarea id="description" /> </textarea>
<label>Image</label>
<input id="imageURL" type="text" name="text" />

<button onclick="upload()" class="theme-button">
<i class="fa fa-upload"></i>Upload Now
</button>

</div>
						
</div>

<?php 
	require_once("footer.php");
?>

<script>
function upload() {
	var title = $('#title').val();
	var price = $('#price').val();
	var image = $('#imageURL').val();
	var desc = $('#description').val();

	if(title && price && image) {
		uploadHelper(title, price, image, desc);
	} else {
		
	}

}

//HELPER FUNCTIONS 
function uploadHelper(title, price, image, des) {
	var user = firebase.auth().currentUser;

	firebase.database().ref('products/'+title).set({
			title: title,
			price: price,
			description: des,
			image: image
		}).then(function() {
			new PNotify({
			    title: 'Uploaded',
			    type: 'success'
			});
		  })
		  .catch(function(error) {
				new PNotify({
				    title: 'Oh No!',
				    text: error.message,
				    type: 'error'
				});
		  });


}
</script>
