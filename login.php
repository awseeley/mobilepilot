<!-- FROM Role-Based Access Control Group -->
<?php
//require_once("./config.php");
require_once("./common_db.php");
require_once("./session.php");
require_once("./login.php");

// Where to go next
if (isset($_GET['continue'])) {
    $continue = $_GET['continue'];
}
else {
    if (isset($_POST['continue'])) {
        $continue = $_POST['continue'];
    }
    else {
        $continue = "DisplayCategory.php";
    }
}

if(isset($_POST['stage']) && ($_POST['stage'] == 'process')) {
    process_form();
} else {
    print_form($continue, "Please enter your account details:");
}

function process_form() {
    global $continue;
    if(login($_POST['username'], $_POST['password'])) {
        header("Location: $continue");
    }
    else {
        print_form($continue, "Invalid credentials");
    }
}

function print_form($continue, $error) {
    global $store_name, $slogan;
    $title = $store_name . " - " . "Shopper Login";
    ?>
<!--***************************************-->


<html>
<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="css/styling.css">

<meta name="viewport" content="width=device-width, initial-scale=1">
</head>


<body>

<?php include 'navbar.php';?> <!-- Writes the navbar.php content here -->

<div class="container mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 block">

      
<div class="panel element centered" >
<form class="form-horizontal" METHOD="post" ACTION="loginredirect.php" role="form" onsubmit="return validateFormOnSubmit(this)">

    <!-- User Details -->
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email">  
    </div>

    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
    </div>

    <a href="ForgotPassword.php" role="button" class="btn btn-link btn-block">I forgot my password</button>

    <div class="checkbox">
    <label>
      <input type="checkbox"> Remember Me
    </label>

    <BR>
    <!-- 
    Login = LoginShopper.php
    Logout = LogoutShopper.php
    TODO: Pass username, password & remember me in a post request
    -->
    <a href="LoginShopper.php" role="button" type="submit" class="btn btn-success btn-block">Login</a>

  </div>

 </form>
 
 <a href="Register.php" role="button" class="btn btn-link btn-block">Register an Account</button>

</div>

</body>