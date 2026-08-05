<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
	
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Sigma</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="shop.php">Shop</a>
                <a class="dropdown-item" href="product-single.php">Single Product</a>
                <a class="dropdown-item" href="cart.php">Cart</a>
                <a class="dropdown-item" href="checkout.php">Checkout</a>
              </div>
            </li>
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
			  <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>

			<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown"
       data-toggle="dropdown">

        <?php echo $_SESSION['user_name']; ?>

        <span class="icon-user ml-2"></span>

    </a>

    <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="cart.php">My Cart</a>
        <a class="dropdown-item" href="checkout.php">Checkout</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item text-danger" href="logout.php">Logout</a>
    </div>
</li>

	        </ul>
	      </div>
	    </div>
	  </nav>