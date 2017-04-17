
<footer class="main-footer">
            <div class="container">
                <div class="row row-col-gap" data-gutter="60">
                    <div class="col-md-3">
                        <h4 class="widget-title-sm">Grizzly Shop</h4>
                        <p>Welcome to the grizzly shop</p>
                        <ul class="main-footer-social-list">
                            <li>
                                <a target="_blank" class="fa fa-facebook" href="https://www.facebook.com/ryersonu/?fref=ts"></a>
                            </li>
                            <li>
                                <a target="_blank" class="fa fa-twitter" href="https://twitter.com/RyersonU?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"></a>
                            </li>

                            <li>
                                <a target="_blank" class="fa fa-instagram" href="https://www.instagram.com/rustudentlife/?hl=en"></a>
                            </li>

                        </ul>
                    </div>
                    <div class="col-md-3">

                    </div>
                    <div class="col-md-3">
                        <h4 class="widget-title-sm">Newsletter</h4>
                        <div id="contactusform"">
                            <div class="form-group">
                                <label>Sign up to the newsletter</label>
                                <input id="newsletterEmail" class="newsletter-input form-control" placeholder="Your e-mail address" type="email" />
                            </div>
                            <input id="signUpBut" onclick="newsletter()" class="btn btn-primary" type="submit" value="Sign up" />
                        </div>
                    </div>
                </div>
                
            </div>
        </footer>

    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/icheck.js"></script>
    <script src="js/ionrangeslider.js"></script>
    <script src="js/jqzoom.js"></script>
    <script src="js/card-payment.js"></script>
    <script src="js/owl-carousel.js"></script>
    <script src="js/magnific.js"></script>
    <script src="js/custom.js"></script>
     <script src="js/pnotify.custom.min.js"></script>

<script src="https://www.gstatic.com/firebasejs/3.7.3/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyACoxOsZflsJidd_84LMJZeO3qR-Ls6Gjk",
    authDomain: "websysboys.firebaseapp.com",
    databaseURL: "https://websysboys.firebaseio.com",
    storageBucket: "websysboys.appspot.com",
    messagingSenderId: "265984656348"
  };
  firebase.initializeApp(config);



</script>


<script>
//If user logged in hide sign in/login buttons
firebase.auth().onAuthStateChanged(function(user) {
  if (user) {
    console.log("here");
    if(user.email == null) {
    //$('#createButton').text("Logged in as: anon");

    } else {
    $('#createButton').text("Logged in as: "+user.email);
    }
    $('#createButton').attr("href", "");

    $('#loginButton').text("Logout");
    $('#loginButton').attr("href", "");
    $('#loginButton').attr("onclick", "logout()");


  } else {
    $('#createButton').text("Create Account");
    $('#createButton').attr("href", "#nav-account-dialog");

    $('#loginButton').text("Sign In");
    $('#loginButton').attr("href", "#nav-login-dialog");
    $('#loginButton').attr("onclick", "");

  }
});

//Login user
function login() {
    var email = $('#email').val();
    var password = $('#password').val();
    console.log(email);
    console.log(password);

    firebase.auth().signInWithEmailAndPassword(email, password).then(function() {
        new PNotify({
            title: 'Success',
            type: 'success'
        });
        window.location.replace("index.php");
    }).catch(function(error) {
    // Handle Errors here.
    console.log(error.message);
    if(error.message) {
        var errorCode = error.code;
        var errorMessage = error.message;
        new PNotify({
            title: 'Oh No!',
            text: error.message,
            type: 'error'
        });
    } 
    });

}


function facebookLogin() {

      if (!firebase.auth().currentUser) {
        // [START createprovider]
		var provider = new firebase.auth.FacebookAuthProvider();
        // [END createprovider]
        // [START addscopes]
        provider.addScope('https://www.googleapis.com/auth/plus.login');
        // [END addscopes]
        // [START signin]

		firebase.auth().signInWithPopup(provider).then(function(result) {
  // This gives you a Facebook Access Token. You can use it to access the Facebook API.
  var token = result.credential.accessToken;
  // The signed-in user info.
  var user = result.user;
     console.log(user.uid);
            firebase.database().ref('users/' + user.uid).set({
                name: "",
                email: user.email
            }).then(function() {
                window.location.replace("category.php");
              })
              .catch(function(error) {
                    new PNotify({
                        title: 'Oh No!',
                        text: error.message,
                        type: 'error'
                    });
              });
  // ...
}).catch(function(error) {
  // Handle Errors here.
  var errorCode = error.code;
  var errorMessage = error.message;
  // The email of the user's account used.
  var email = error.email;
  // The firebase.auth.AuthCredential type that was used.
  var credential = error.credential;
  // ...
     if (errorCode === 'auth/account-exists-with-different-credential') {
            alert('You have already signed up with a different auth provider for that email.');
            // If you are using multiple auth providers on your app you should handle linking
            // the user's accounts here.
          } else {
            console.error(error);
          }
});

    }

}

function googleLogin() {

      if (!firebase.auth().currentUser) {
        // [START createprovider]
        var provider = new firebase.auth.GoogleAuthProvider();
        // [END createprovider]
        // [START addscopes]
        provider.addScope('https://www.googleapis.com/auth/plus.login');
        // [END addscopes]
        // [START signin]
        firebase.auth().signInWithPopup(provider).then(function(result) {
          // This gives you a Google Access Token. You can use it to access the Google API.
          var token = result.credential.accessToken;
          // The signed-in user info.
          var user = result.user;

          console.log(user.uid);
            firebase.database().ref('users/' + user.uid).set({
                name: "",
                email: user.email
            }).then(function() {
                window.location.replace("category.php");
              })
              .catch(function(error) {
                    new PNotify({
                        title: 'Oh No!',
                        text: error.message,
                        type: 'error'
                    });
              });
          // [START_EXCLUDE]
          // [END_EXCLUDE]
        }).catch(function(error) {
          // Handle Errors here.
          var errorCode = error.code;
          var errorMessage = error.message;
          // The email of the user's account used.
          var email = error.email;
          // The firebase.auth.AuthCredential type that was used.
          var credential = error.credential;
          // [START_EXCLUDE]
          if (errorCode === 'auth/account-exists-with-different-credential') {
            alert('You have already signed up with a different auth provider for that email.');
            // If you are using multiple auth providers on your app you should handle linking
            // the user's accounts here.
          } else {
            console.error(error);
          }
          // [END_EXCLUDE]
        });
    }

}

//register user
function register() {
    var fullname = $('#fullnameReg').val();
    var email = $('#emailReg').val();
    var password = $('#passwordReg').val();
    console.log(fullname);
    console.log(email);
    console.log(password);


    firebase.auth().createUserWithEmailAndPassword(email.trim(), password.trim()).then(function(user){
        var userID = user.uid;
        console.log(userID);
        firebase.database().ref('users/' + userID).set({
            name: fullname,
            email: email
        }).then(function() {
            window.location.replace("category.php");
          })
          .catch(function(error) {
                new PNotify({
                    title: 'Oh No!',
                    text: error.message,
                    type: 'error'
                });
          });



        //you can save the user data here.
    }).catch(function(error) {
        var errorCode = error.code;
        var errorMessage = error.message;
        new PNotify({
            title: 'Oh No!',
            text: error.message,
            type: 'error'
        });
       
    });

}

function logout() {
        firebase.auth().signOut().then(function() {
            window.location.replace("index.php");
        }).catch(function(error) {
            new PNotify({
                title: 'Oh No!',
                text: error,
                type: 'error'
            });
        });
}

function newsletter() {

    console.log($('#newsletterEmail').val());

    jQuery.ajax({
        type: "POST",
        data:{'newsletterEmail':$('#newsletterEmail').val()},
        url: 'contact-form.php',
        dataType: 'text',
        
        success: function (result) {
            new PNotify({
                title: 'Signed up!',
                text: result,
                type: 'success'
            }); 
        }
    }); 


}


</script>


<script type="text/javascript" src="js/simpleCart.js"></script>






</body>

</html>
