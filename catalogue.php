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

	<?php include 'navbarcat.php';?> <!-- Writes the navbar.php content here -->

	<div class="container ">
		<div class="row">
			<div class="col-md-3 hidden-xs hidden-sm">
				<!-- Sidebar content -->

				<div class="panel-group">
					<div class="panel panel-primary">
						<div class="panel-heading">Category</div>
						<div class="panel-body">Panel Content</div>
					</div>
					<div class="panel panel-primary">
						<div class="panel-heading">Filter</div>
						<div class="panel-body">Panel Content</div>
					</div>
				</div>

			</div>
			<div class="col-md-9">
				<!-- Body content -->
				<div class="toprow">
					<span class="prodcount">
						Products <b> 1 - 4 </b> of 220
					</span>
					<span class="sortby">
						<div class="dropdown">
							Sort By
							<button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Newest
								<span class="caret"></span></button>
								<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
									<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Newest</a></li>
									<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Oldest</a></li>
									<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Price (High-Low)</a></li>
									<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Price (Low-High)</a></li>
								</ul>
							</div>

						</span>
					</div>

					<div class="catitems">
						<div class="row">

							<!-- Repeat this for each new item -->
							<a href="AddToCart.php">
							<div class="col-sm-6">
								<img src="img/product.png" alt="product" style="width:250px;height:200px;">
								<p> <b>Nike</b> </p>
								<p> Air Jordans </p>
								<p> <b>$139.95</b> </p>
							</div>
							</a>
							<a href="AddToCart.php">
							<div class="col-sm-6">
								<img src="img/product.png" alt="product" style="width:250px;height:200px;">
								<p> <b>Nike</b> </p>
								<p> Air Jordans </p>
								<p> <b>$139.95</b> </p>
							</div>
							</a>
							<!-- -->
							<!-- Repeat this for each new item -->
							<a href="AddToCart.php">
							<div class="col-sm-6">
								<img src="img/product.png" alt="product" style="width:250px;height:200px;">
								<p> <b>Nike</b> </p>
								<p> Air Jordans </p>
								<p> <b>$139.95</b> </p>
							</div>
							</a>
							<a href="AddToCart.php">
							<div class="col-sm-6">
								<img src="img/product.png" alt="product" style="width:250px;height:200px;">
								<p> <b>Nike</b> </p>
								<p> Air Jordans </p>
								<p> <b>$139.95</b> </p>
							</div>
							</a>
							<!-- -->

						</div>
					</div>

					<div class="pages">
					<ul class="pagination">
						<li class="active"><a href="#">1</a></li>
						<li ><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
					</ul>
					</div>


				</div>
			</div>
		</div>


	</body>