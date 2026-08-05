<?php
session_start();
?>

<?php include 'include/header.php'; ?>

<?php include 'include/navbar.php'; ?>

    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="overlay"></div>

          <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
    <p class="breadcrumbs">
        <span class="mr-2"><a href="index.php">Home</a></span>
        <span>Shopping Cart</span>
    </p>

    <h1 class="mb-0 bread">Shopping Cart</h1>

    <p class="hero-subtitle">
        Review your selected products before proceeding to checkout.
    </p>
</div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ftco-animate">
            <div class="cart-list">
            <?php

$subtotal = 0;

if (isset($_SESSION['cart'])) {

    foreach ($_SESSION['cart'] as $item) {

        $subtotal += $item['price'] * $item['quantity'];

    }

}

$delivery = 0;
$discount = 0;

$total = $subtotal + $delivery - $discount;

?>
              <table class="table">
                <thead class="thead-primary">
                  <tr class="text-center"
    data-id="<?php echo $item['id']; ?>"
    data-price="<?php echo $item['price']; ?>">
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {

    foreach ($_SESSION['cart'] as $item) {
?>
<tr class="text-center"
    data-id="<?php echo $item['id']; ?>"
    data-price="<?php echo $item['price']; ?>">

    <td class="product-remove">
    <a href="remove-from-cart.php?id=<?php echo $item['id']; ?>">
        <span class="ion-ios-close"></span>
    </a>
</td>
    <td class="image-prod">
        <div class="img" style="background-image:url('<?php echo $item['image']; ?>');"></div>
    </td>

    <td class="product-name">
        <h3><?php echo $item['name']; ?></h3>
    </td>

    <td class="price">
        $<?php echo $item['price']; ?>
    </td>

           <td class="quantity">

<form class="update-cart-form">

    <input type="hidden"
           name="id"
           value="<?php echo $item['id']; ?>">

    <input
        type="number"
        name="quantity"
        value="<?php echo $item['quantity']; ?>"
        min="1"
        class="form-control quantity-input">

</form>

</td>

   <td class="total item-total">
    $<?php echo number_format($item['price'] * $item['quantity'], 2); ?>
</td>

</tr>

<?php
    }

} else {

    echo "<tr><td colspan='6' class='text-center'>Your cart is empty.</td></tr>";
 }
?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
            <div class="cart-total mb-3">
              <h3>Cart Totals</h3>
              <p class="d-flex">
                <span>Subtotal</span>
                <span id="subtotal">
    $<?php echo number_format($subtotal,2); ?>
</span>
              </p>
              <p class="d-flex">
                <span>Delivery</span>
                <span>$<?php echo number_format($delivery,2); ?></span>
              </p>
              <p class="d-flex">
                <span>Discount</span>
                <span>$<?php echo number_format($discount,2); ?></span>
              </p>
              <hr>
              <p class="d-flex total-price">
                <span>Total</span>
                <span id="grand-total">
    $<?php echo number_format($total,2); ?>
</span>
              </p>
            </div>
            <p class="text-center"><a href="checkout.php" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
          </div>
        </div>
      </div>
    </section>

<?php include 'include/footer.php'; ?>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<?php include 'include/scripts.php'; ?>


  <script>
    $(document).ready(function(){

    var quantitiy=0;
       $('.quantity-right-plus').click(function(e){
            
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            
            // If is not undefined
                
                $('#quantity').val(quantity + 1);

              
                // Increment
            
        });

         $('.quantity-left-minus').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            
            // If is not undefined
          
                // Increment
                if(quantity>0){
                $('#quantity').val(quantity - 1);
                }
        });
        
    });
  </script>

  <script>
$(document).ready(function () {

  $(".quantity-input").change(function () {

   

    var form = $(this).closest("form");

    $.ajax({
        url: "update-cart.php",
        type: "POST",
        data: form.serialize(),
       success: function () {

    var row = form.closest("tr");

    var price = parseFloat(row.data("price"));
  console.log(row);
    console.log(price);


    var quantity = parseInt(form.find(".quantity-input").val());

    var itemTotal = price * quantity;

    row.find(".item-total").text("$" + itemTotal.toFixed(2));

    var subtotal = 0;

    $(".item-total").each(function () {
        subtotal += parseFloat($(this).text().replace("$", ""));
    });

    $("#subtotal").text("$" + subtotal.toFixed(2));
    $("#grand-total").text("$" + subtotal.toFixed(2));

}
    });

});

});
</script>
    
  </body>
</html>