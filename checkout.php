<?php include 'include/header.php'; ?>
<?php include 'include/navbar.php'; ?>

<?php
$subtotal = 0;
$buy_now_product = null;

// التحقق لو الطلب جايلك مباشر من زرار BUY NOW
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $buy_now_product = [
        'id'       => $_POST['product_id'],
        'name'     => $_POST['product_name'],
        'price'    => (float)$_POST['price'],
        'quantity' => 1,
        'image'    => $_POST['image']
    ];
    
    $subtotal = $buy_now_product['price'];
} 
// وإلا، يحسب إجمالي المنتجات الموجودة في السلة (Session Cart)
elseif (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $subtotal += $item['price'] * $item['quantity'];
    }
}

$delivery = 0;
$discount = 0;

$total = $subtotal + $delivery - $discount;
?>

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <form action="place-order.php" method="POST">
          
          <?php if ($buy_now_product): ?>
            <!-- تحويل بيانات الشراء المباشر مع استمارة الطلب النهائي -->
            <input type="hidden" name="buy_now" value="1">
            <input type="hidden" name="product_id" value="<?php echo $buy_now_product['id']; ?>">
            <input type="hidden" name="product_name" value="<?php echo $buy_now_product['name']; ?>">
            <input type="hidden" name="price" value="<?php echo $buy_now_product['price']; ?>">
            <input type="hidden" name="quantity" value="1">
          <?php endif; ?>

        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
           <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Checkout</span></p>
            <h1 class="mb-0 bread">Checkout</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-8 ftco-animate">
      <div class="billing-form">
       <h3 class="mb-4 billing-heading">Billing Details</h3>
            <div class="row align-items-end">
             <div class="col-md-6">
                 <div class="form-group">
                  <label for="firstname">First Name</label>
                 <input
                        type="text"
                       class="form-control"
                       name="firstname"
                      required>
                 </div>
               </div>
               <div class="col-md-6">
                 <div class="form-group">
                  <label for="lastname">Last Name</label>
                   <input type="text" class="form-control" name="lastname" placeholder="" required>
                 </div>
                </div>
                <div class="w-100"></div>
              <div class="col-md-12">
               <div class="form-group">
                <label for="country">State / Country</label>
                <div class="select-wrap">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <select name="country" id="" class="form-control">
                      <option value="France">France</option>
                      <option value="Italy">Italy</option>
                      <option value="Philippines">Philippines</option>
                      <option value="South Korea">South Korea</option>
                      <option value="Hongkong">Hongkong</option>
                      <option value="Japan">Japan</option>
                    </select>
                  </div>
               </div>
              </div>
              <div class="w-100"></div>
              <div class="col-md-6">
               <div class="form-group">
                  <label for="streetaddress">Street Address</label>
                   <input type="text" class="form-control" name="address" placeholder="House number and street name" required>
                 </div>
              </div>
              <div class="col-md-6">
               <div class="form-group">
                   <input type="text" class="form-control" placeholder="Appartment, suite, unit etc: (optional)" >
                 </div>
              </div>
              <div class="w-100"></div>
              <div class="col-md-6">
               <div class="form-group">
                  <label for="towncity">Town / City</label>
                   <input type="text" class="form-control" name="city" placeholder="">
                 </div>
              </div>
              <div class="col-md-6">
               <div class="form-group">
                <label for="postcodezip">Postcode / ZIP *</label>
                   <input type="text" class="form-control" name="zipcode" placeholder="">
                 </div>
              </div>
              <div class="w-100"></div>
              <div class="col-md-6">
                 <div class="form-group">
                  <label for="phone">Phone</label>
                   <input type="text" class="form-control" name="phone" placeholder="">
				</div>
               </div>
               <div class="col-md-6">
                 <div class="form-group">
                  <label for="emailaddress">Email Address</label>
                   <input type="text" class="form-control" name="email" placeholder="">
                 </div>
                </div>
                <div class="w-100"></div>
                <div class="col-md-12">
                 <div class="form-group mt-4">
          <div class="radio">
            <label class="mr-3"><input type="radio" name="optradio"> Create an Account? </label>
            <label><input type="radio" name="optradio"> Ship to different address</label>
          </div>
         </div>
                </div>
             </div>
           </div><!-- END billing-form -->

           <div class="cart-detail cart-total bg-light p-3 p-md-4">

    <h3 class="billing-heading mb-4">Cart Total</h3>

    <?php if ($buy_now_product): ?>
      <p class="d-flex text-primary font-weight-bold">
          <span>Product: <?php echo $buy_now_product['name']; ?></span>
          <span>$<?php echo number_format($buy_now_product['price'], 2); ?></span>
      </p>
      <hr>
    <?php endif; ?>

    <p class="d-flex">
        <span>Subtotal</span>
        <span>$<?php echo number_format($subtotal,2); ?></span>
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
        <span>$<?php echo number_format($total,2); ?></span>
    </p>

</div>
            </div>
            <div class="col-md-6">
             <div class="cart-detail bg-light p-3 p-md-4">
              <h3 class="billing-heading mb-4">Payment Method</h3>
         <div class="form-group">
    <div class="col-md-12">
        <div class="radio">
            <label>
                <input type="radio"
                       name="payment_method"
                       value="bank_transfer"
                       class="mr-2"
                       required>
                Direct Bank Transfer
            </label>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-md-12">
        <div class="radio">
            <label>
                <input type="radio"
                       name="payment_method"
                       value="check_payment"
                       class="mr-2">
                Check Payment
            </label>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-md-12">
        <div class="radio">
            <label>
                <input type="radio"
                       name="payment_method"
                       value="paypal"
                       class="mr-2">
                PayPal
            </label>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-md-12">
        <div class="checkbox">
            <label>
                <input type="checkbox"
                       name="terms"
                       value="1"
                       class="mr-2"
                       required>
                I have read and accept the Terms & Conditions
            </label>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary py-3 px-4">
    Place an Order
</button>    </div>
            </div>
           </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->
 </form>

<?php include 'include/footer.php'; ?>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<?php include 'include/scripts.php'; ?>
    
  </body>
</html>