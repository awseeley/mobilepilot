<!-- http://getbootstrap.com/components/ -->

<!-- http://stackoverflow.com/questions/20568473/how-to-put-navbar-brand-to-right-side-in-twitter-bootstrap -->
<head>
<link rel="stylesheet" href="css/navbar.css">
</head>


<nav class="navbar navbar-inverse">
  <!-- Brand and toggle get grouped for better mobile display -->
  <!-- <a class="navbar-brand navbar-right" href="#">B Desk</a> -->

  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <span class="navbar-brand glyphicon glyphicon-leaf glyph lc"></span>
      <a href="Viewcart.php"><span class="navbar-brand cart visible-xs glyphicon glyphicon-shopping-cart glyph"></span></a>
      <span class="navbar-brand cart visible-xs glyphicon glyphicon-filter glyph"></span>
      <!-- <a class="navbar-brand cart visible-xs" href="#">Cart M</a> --><!-- Shows at right side on mobiles -->
    </div>

    
    <a href="Viewcart.php"><span class="navbar-brand pull-right pull-top hidden-xs glyphicon glyphicon-shopping-cart glyph"></span></a>
    <span class="navbar-brand cart visible-sm glyphicon glyphicon-filter glyph"></span>
    <!-- a class="navbar-brand pull-right pull-top hidden-xs" href="#">Cart D</a> --> <!-- Shows at right side on desktops -->

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      <ul class="nav navbar-nav">
        <li class="active"><a href="catalogue.php">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="catalogue.php">Catalogue</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="storelocate.php">Store Locator</a></li>
      </ul>

      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Go</button>
      </form>

      <ul class="nav navbar-nav navbar-right">
        <li class = "navright"><a href="login.php">Login</a></li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div>

</div>

