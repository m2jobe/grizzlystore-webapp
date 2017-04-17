<!DOCTYPE HTML>
<html>

<head>
    <title>Grizzly - The Tech Hub</title>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://fonts.googleapis.com/css?family=Roboto:500,300,700,400italic,400' rel='stylesheet' type='text/css'>
    <!-- <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'> -->
    <!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'> -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/mystyles.css">
    <link href="css/pnotify.custom.min.css" rel="stylesheet" type="text/css">

</head>

<body>
    <div class="global-wrapper clearfix" id="global-wrapper">
        <div class="mfp-with-anim mfp-hide mfp-dialog clearfix" id="nav-login-dialog">
            <h3 class="widget-title">Member Login</h3>
            <p>Welcome back, friend. Login to get started</p>
            <hr />
            <div>
                <div class="form-group">
                    <label>Email or Username</label>
                    <input id="email" class="form-control" type="email" />
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input id="password" class="form-control" type="password" />
                </div>
                <div class="checkbox">
                    <label>
                        <input class="i-check" type="checkbox" />Remeber Me</label>
                </div>
                <input class="btn btn-primary" onclick="login()" type="submit" value="Sign In" />
                <input class="btn btn-danger" onclick="googleLogin()" type="submit" value="Google Sign In" />
				<!--<input class="btn btn-primary" onclick="facebookLogin()" type="submit" value="Facebook Sign In" />-->
            </div>
            <div class="gap gap-small"></div>
            <ul class="list-inline">
                <li><a href="#nav-account-dialog" class="popup-text">Not Member Yet</a>
                </li>
                <li><a href="#nav-pwd-dialog" class="popup-text">Forgot Password?</a>
                </li>
            </ul>
        </div>
        <div class="mfp-with-anim mfp-hide mfp-dialog clearfix" id="nav-account-dialog">
            <h3 class="widget-title">Create TheBox Account</h3>
            <p>Ready to get best offers? Let's get started!</p>
            <hr />
            <div>
                <div class="form-group">
                    <label>Email</label>
                    <input id="emailReg" class="form-control" type="email" />
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input id="passwordReg" class="form-control" type="password" />
                </div>
                <div class="form-group">
                    <label>Full Name</label>
                    <input id="fullnameReg" class="form-control" type="text" />
                </div>
                <input onclick="register()" class="btn btn-primary" type="submit" value="Create Account" />
            </div>
            <div class="gap gap-small"></div>
            <ul class="list-inline">
                <li><a href="#nav-login-dialog" class="popup-text">Already Memeber</a>
                </li>
            </ul>
        </div>
        <div class="mfp-with-anim mfp-hide mfp-dialog clearfix" id="nav-pwd-dialog">
            <h3 class="widget-title">Password Recovery</h3>
            <p>Enter Your Email and We Will Send the Instructions</p>
            <hr />
            <form>
                <div class="form-group">
                    <label>Your Email</label>
                    <input class="form-control" type="text" />
                </div>
                <input class="btn btn-primary" type="submit" value="Recover Password" />
            </form>
        </div>
        <nav class="navbar navbar-inverse navbar-main yamm">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#main-nav-collapse" area_expanded="false"><span class="sr-only">Main Menu</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php" style="color:white">
                        Grizzly Tech
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="main-nav-collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown"><a href="category.php"><i class="fa fa-reorder"></i>&nbsp; Our Products<i class="drop-caret" data-toggle="dropdown"></i></a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#nav-login-dialog" data-effect="mfp-move-from-top" id="loginButton" class="popup-text">Sign In</a>
                        </li>
                        <li><a href="#nav-account-dialog" data-effect="mfp-move-from-top" id="createButton" class="popup-text">Create Account</a>
                        </li>
                        <li class="dropdown">
                            <a class="fa fa-shopping-cart" href="shopping-cart.php"></a>                            
                        </li>
                    </ul>
                </div>
            </div>
        </nav>