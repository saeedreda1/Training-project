<?php include 'include/header.php'; ?>

<?php include 'include/navbar.php'; ?>

    <!-- CSS DESIGN FOR RELATED PRODUCTS HOVER EFFECT -->
    <style>
      /* تنسيق بطاقات المنتجات الشبيهة */
      .custom-product-card {
        background: transparent;
        border: none;
        margin-bottom: 30px;
        text-align: left;
      }

      .custom-product-card .img-prod {
        position: relative;
        overflow: hidden;
        display: block;
      }

      .custom-product-card .img-prod img {
        width: 100%;
        transition: transform 0.3s ease;
      }

      /* طبقة الأزرار فوق الصورة عند التمرير */
      .custom-product-card .hover-overlay-buttons {
        position: absolute;
        bottom: 10px;
        left: 0;
        right: 0;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        gap: 8px;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease-in-out;
        z-index: 2;
        padding: 0 15px;
      }

      /* إظهار الأزرار عند Hover */
      .custom-product-card:hover .hover-overlay-buttons {
        opacity: 1;
        visibility: visible;
        bottom: 20px;
      }

      /* زر ADD TO CART الكحلي */
      .btn-add-cart-hover {
        background-color: #0f172a !important;
        color: #ffffff !important;
        border-radius: 20px;
        padding: 8px 16px;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.5px;
        border: none;
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        transition: background 0.2s;
        cursor: pointer;
      }

      .btn-add-cart-hover:hover {
        background-color: #f97316 !important;
        color: #ffffff !important;
      }

      /* زر BUY NOW الفاتح */
      .btn-buy-now-hover {
        background-color: #eef2e6 !important;
        color: #000 !important;
        border-radius: 20px;
        padding: 8px 16px;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.5px;
        border: none;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        text-decoration: none;
        display: inline-block;
        transition: background 0.2s;
      }

      .btn-buy-now-hover:hover {
        background-color: #e0e7d5 !important;
        color: #000 !important;
      }

      /* تنسيق العنوان والسعر للمنتجات الشبيهة */
      .custom-product-card .text h3 {
        margin-bottom: 5px;
        margin-top: 15px;
      }

      .custom-product-card .text h3 a {
        color: #a0a0a0;
        font-size: 13px;
        letter-spacing: 1px;
        text-transform: uppercase;
        font-weight: 500;
      }

      .custom-product-card .text .price {
        color: #666;
        font-size: 14px;
        font-weight: 600;
      }

      /* تنسيق أزرار المنتج الرئيسي الأعلى */
      .btn-custom {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 10px 20px;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        border-radius: 50px;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none !important;
      }

      .btn-main-add {
        background-color: #242e4c;
        color: #ffffff !important;
      }

      .btn-main-buy {
        background-color: #eef2e6;
        color: #242e4c !important;
      }
    </style>

    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span class="mr-2"><a href="index.php">Product</a></span> <span>Product Single</span></p>
            <h1 class="mb-0 bread">Product Single</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="images/menu-2.jpg" class="image-popup"><img src="images/product-1.jpg" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3>Classic Denim Jacket</h3>
    				<p class="price"><span>$80.00</span></p>
    				<p>Upgrade your everyday style with this classic denim jacket. Designed for comfort and durability, it pairs perfectly with jeans, chinos, or casual outfits.</p>
    				<p>Made from premium-quality denim with a modern fit, this jacket is ideal for daily wear, outdoor activities, and casual occasions. A timeless piece for every wardrobe.</p>

						<!-- Form المنتج الرئيسي -->
						<form action="add-to-cart.php" method="POST">
							<input type="hidden" name="product_id" value="101">
							<input type="hidden" name="product_name" value="Young Woman Wearing Dress">
							<input type="hidden" name="price" value="120.00">
							<input type="hidden" name="image" value="images/product-1.jpg">

							<div class="row mt-4">
								<div class="col-md-6">
									<div class="form-group d-flex">
										<div class="select-wrap">
											<div class="icon"><span class="ion-ios-arrow-down"></span></div>
											<select name="size" id="" class="form-control">
												<option value="Small">Small</option>
												<option value="Medium">Medium</option>
												<option value="Large">Large</option>
												<option value="Extra Large">Extra Large</option>
											</select>
										</div>
									</div>
								</div>
								<div class="w-100"></div>
								<div class="input-group col-md-6 d-flex mb-3">
									<span class="input-group-btn mr-2">
										<button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
											<i class="ion-ios-remove"></i>
										</button>
									</span>
									<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
									<span class="input-group-btn ml-2">
										<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
											<i class="ion-ios-add"></i>
										</button>
									</span>
								</div>
								<div class="w-100"></div>
								<div class="col-md-12">
									<p style="color: #000;">80 piece available</p>
								</div>
							</div>

								<p class="bottom-area d-flex align-items-center">

    							<a href="add-to-cart.php?product_id=101&product_name=Classic%20Denim%20Jacket&price=80&image=images/product-1.jpg"
       								class="btn-custom btn-main-add mr-2">
        							ADD TO CART <i class="ion-ios-add ml-1"></i>
    							</a>

								<a href="checkout.php"
									class="btn-custom btn-main-buy">																						
									BUY NOW <i class="ion-ios-cart ml-1"></i>
								</a>

								</p>
						</form>

    			</div>
    		</div>
    	</div>
    </section>

    <!-- SECTION RELATED PRODUCTS -->
    <section class="ftco-section bg-light">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Related Products</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row">

    			<!-- المنتج الشبيه 1 -->
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="product custom-product-card">
    					<div class="product custom-product-card">
    						<input type="hidden" name="product_id" value="1">
    						<input type="hidden" name="product_name" value="Classic Denim Jacket">
    						<input type="hidden" name="price" value="80.00">
    						<input type="hidden" name="image" value="images/product-1.jpg">

    						<div class="img-prod">
    							<img class="img-fluid" src="images/product-1.jpg" alt="Classic Denim Jacket">
    							<div class="overlay"></div>

<div class="hover-overlay-buttons">

    <a href="add-to-cart.php?product_id=1&product_name=Classic%20Denim%20Jacket&price=80&image=images/product-1.jpg"
       class="btn btn-add-cart-hover">
        ADD TO CART 
    </a>

    <a href="checkout.php"
       class="btn btn-buy-now-hover">
        BUY NOW
        <i class="ion-ios-cart ml-1"></i>
    </a>

</div>
    						</div>

    						<div class="text py-3 px-3">

    <h3>
        <a href="product-single.php">
            Classic Denim Jacket
        </a>
    </h3>

    <div class="pricing">
        <p class="price">
            <span>$80.00</span>
        </p>
    </div>

</div>
    					</div>
					</div>
    			</div>

    			<!-- المنتج الشبيه 2 -->
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="product custom-product-card">
    					<div class="product custom-product-card">
    						<input type="hidden" name="product_id" value="2">
    						<input type="hidden" name="product_name" value="Elegant Gray Dress">
    						<input type="hidden" name="price" value="90.00">
    						<input type="hidden" name="image" value="images/product-2.jpg">

    						<div class="img-prod">
    							<img class="img-fluid" src="images/product-2.jpg" alt="Elegant Gray Dress">
    							<div class="overlay"></div>

<div class="hover-overlay-buttons">

    <a href="add-to-cart.php?product_id=2&product_name=Elegant%20Gray%20Dress&price=90&image=images/product-2.jpg"
       class="btn btn-add-cart-hover">
        ADD TO CART 
    </a>

    <a href="checkout.php"
       class="btn btn-buy-now-hover">
        BUY NOW
        <i class="ion-ios-cart ml-1"></i>
    </a>

</div>
    						</div>

    						<div class="text py-3 px-3">

    <h3>
        <a href="product-single.php">
            Elegant Gray Dress
        </a>
    </h3>

    <div class="pricing">
        <p class="price">
            <span>$90.00</span>
        </p>
    </div>

</div>
    					</div>
					</div>
    			</div>

    			<!-- المنتج الشبيه 3 -->
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="product custom-product-card">
    					<div class="product custom-product-card">
    						<input type="hidden" name="product_id" value="3">
    						<input type="hidden" name="product_name" value="White Summer Dress">
    						<input type="hidden" name="price" value="100.00">
    						<input type="hidden" name="image" value="images/product-3.jpg">

    						<div class="img-prod">
    							<img class="img-fluid" src="images/product-3.jpg" alt="White Summer Dress">
    							<div class="overlay"></div>

<div class="hover-overlay-buttons">

    <a href="add-to-cart.php?product_id=3&product_name=White%20Summer%20Dress&price=100&image=images/product-3.jpg"
       class="btn btn-add-cart-hover">
        ADD TO CART 
    </a>

    <a href="checkout.php"
       class="btn btn-buy-now-hover">
        BUY NOW
        <i class="ion-ios-cart ml-1"></i>
    </a>

</div>
    						</div>

    							<div class="text py-3 px-3">

    <h3>
        <a href="product-single.php">
            White Summer Dress
        </a>
    </h3>

    <div class="pricing">
        <p class="price">
            <span>$100.00</span>
        </p>
    </div>

</div>
    					</div>
					</div>
    			</div>

    			<!-- المنتج الشبيه 4 -->
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="product custom-product-card">
    					<input type="hidden" name="product_id" value="4">
    					<input type="hidden" name="product_name" value="Casual White Blouse">
    					<input type="hidden" name="price" value="60.00">
    					<input type="hidden" name="image" value="images/product-4.jpg">

    						<div class="img-prod">
    							<img class="img-fluid" src="images/product-4.jpg" alt="Casual White Blouse">
    							<div class="overlay"></div>

<div class="hover-overlay-buttons">

    <a href="add-to-cart.php?product_id=4&product_name=Casual%20White%20Blouse&price=60&image=images/product-4.jpg"
       class="btn btn-add-cart-hover">
        ADD TO CART 
    </a>

    <a href="checkout.php"
       class="btn btn-buy-now-hover">
        BUY NOW
        <i class="ion-ios-cart ml-1"></i>
    </a>

</div>
    						</div>

    							<div class="text py-3 px-3">

    <h3>
        <a href="product-single.php">
            Casual White Blouse
        </a>
    </h3>

    <div class="pricing">
        <p class="price">
            <span>$60.00</span>
        </p>
    </div>

</div>
    					</div>
					</div>
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
		        e.preventDefault();
		        var quantity = parseInt($('#quantity').val());
		        $('#quantity').val(quantity + 1);
		    });

		     $('.quantity-left-minus').click(function(e){
		        e.preventDefault();
		        var quantity = parseInt($('#quantity').val());
		            if(quantity>1){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>
    
  </body>
</html>