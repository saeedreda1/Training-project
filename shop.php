<?php include 'include/header.php'; ?>
<?php include 'include/navbar.php'; ?>

<?php
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

$category = isset($_GET['category']) ? $_GET['category'] : 'all';

$all_products = [
    // Shirts & Tops
    ['id' => 1, 'category' => 'shirts', 'name' => 'Floral Cotton Summer Shirt', 'price' => 45, 'image' => 'images/Floral Cotton Summer Shirt.jpg.jpeg', 'old_price' => 60],
    ['id' => 2, 'category' => 'shirts', 'name' => 'Casual Button-Up Shirt', 'price' => 50, 'image' => 'images/Casual Button-Up Shirt.jpg.jpeg', 'old_price' => null],
    ['id' => 3, 'category' => 'shirts', 'name' => 'Classic Polo Top', 'price' => 40, 'image' => 'images/Classic Polo Top.jpg.jpeg', 'old_price' => 55],
    ['id' => 4, 'category' => 'shirts', 'name' => 'Striped Cotton Shirt', 'price' => 48, 'image' => 'images/Striped Cotton Shirt.jpg.jpeg', 'old_price' => null],

    // Dresses
    ['id' => 6, 'category' => 'dresses', 'name' => 'Summer Floral Maxi Dress', 'price' => 85, 'image' => 'images/Summer Floral Maxi Dress.jpg.jpeg', 'old_price' => null],
    ['id' => 7, 'category' => 'dresses', 'name' => 'Casual Red Summer Dress', 'price' => 75, 'image' => 'images/Casual Red Summer Dress.jpg.jpeg', 'old_price' => 95],

    // Shorts & Skirts
    ['id' => 8, 'category' => 'shorts', 'name' => 'High-Waist Casual Skirt', 'price' => 55, 'image' => 'images/High-Waist Casual Skirt.jpg.jpeg', 'old_price' => null],
    ['id' => 9, 'category' => 'shorts', 'name' => 'Denim Summer Shorts', 'price' => 42, 'image' => 'images/Denim Summer Shorts.jpg.jpeg', 'old_price' => 50],

    // Jackets & Coats
    ['id' => 10, 'category' => 'jackets', 'name' => 'Classic Denim Jacket', 'price' => 95, 'image' => 'images/Classic Denim Jacket.jpg.jpeg', 'old_price' => 120],
    ['id' => 11, 'category' => 'jackets', 'name' => 'Leather Biker Jacket', 'price' => 140, 'image' => 'images/Leather Biker Jacket.jpg.jpeg', 'old_price' => null],

    // Jeans & Trousers
    ['id' => 12, 'category' => 'jeans', 'name' => 'Slim Fit Blue Jeans', 'price' => 65, 'image' => 'images/Slim Fit Blue Jeans.jpg.jpeg', 'old_price' => 80],
    ['id' => 13, 'category' => 'jeans', 'name' => 'Classic Chino Trousers', 'price' => 60, 'image' => 'images/Classic Chino Trousers.jpg.jpeg', 'old_price' => null],

    // Sleeveless
    ['id' => 14, 'category' => 'sleeveless', 'name' => 'Sleeveless Casual Top', 'price' => 35, 'image' => 'images/Sleeveless Casual Top.jpg.jpeg', 'old_price' => null],
    ['id' => 15, 'category' => 'sleeveless', 'name' => 'Summer Tank Top', 'price' => 30, 'image' => 'images/Summer Tank Top.jpg.jpeg', 'old_price' => 40],

    // Jumpsuits
    ['id' => 17, 'category' => 'jumpsuits', 'name' => 'Stylish Black Jumpsuit', 'price' => 90, 'image' => 'images/Stylish Black Jumpsuit.jpg.jpeg', 'old_price' => null],

    // Shoes & Sneakers
    ['id' => 18, 'category' => 'shoes', 'name' => 'Urban Running Sneakers', 'price' => 85, 'image' => 'images/Urban Running Sneakers.jpg.jpeg', 'old_price' => 110],
    ['id' => 19, 'category' => 'shoes', 'name' => 'Sporty Running Shoes', 'price' => 78, 'image' => 'images/Sporty Running Shoes.jpg.jpeg', 'old_price' => null],

    // Bags & Accessories
    ['id' => 20, 'category' => 'bags', 'name' => 'Leather Crossbody Bag', 'price' => 70, 'image' => 'images/Leather Crossbody Bag.jpg.jpeg', 'old_price' => 90],
    ['id' => 21, 'category' => 'bags', 'name' => 'Canvas Travel Backpack', 'price' => 55, 'image' => 'images/Canvas Travel Backpack.jpg.jpeg', 'old_price' => null]
];

if ($category != 'all') {
    $filtered_products = array_filter($all_products, function($p) use ($category) {
        return $p['category'] === $category;
    });
} else {
    $filtered_products = $all_products;
    shuffle($filtered_products); 
}

$limit = 6;
$total_products = count($filtered_products);
$total_pages = ceil($total_products / $limit);
if ($total_pages < 1) $total_pages = 1;
if ($page > $total_pages) $page = $total_pages;

$offset = ($page - 1) * $limit;
$display_products = array_slice($filtered_products, $offset, $limit);

$category_names = [
    'all' => 'Collection Products',
    'shirts' => 'Shirts & Tops',
    'dresses' => 'Dresses',
    'shorts' => 'Shorts & Skirts',
    'jackets' => 'Jackets & Coats',
    'jeans' => 'Jeans & Trousers',
    'sleeveless' => 'Sleeveless',
    'jumpsuits' => 'Jumpsuits',
    'shoes' => 'Shoes & Sneakers',
    'bags' => 'Bags & Accessories'
];
$current_title = isset($category_names[$category]) ? $category_names[$category] : 'Collection Products';
?>

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Products</span></p>
            <h1 class="mb-0 bread"><?php echo $current_title; ?></h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row">
          
          <div class="col-md-8 col-lg-10 order-md-last">
            <div class="row">

              <?php if (!empty($display_products)): ?>
                <?php foreach ($display_products as $prod): ?>
                <div class="col-sm-6 col-md-6 col-lg-4 ftco-animate">
                  <form action="add-to-cart.php" method="POST">
                    <div class="product">
                      <input type="hidden" name="product_id" value="<?php echo $prod['id']; ?>">
                      <input type="hidden" name="product_name" value="<?php echo $prod['name']; ?>">
                      <input type="hidden" name="price" value="<?php echo $prod['price']; ?>">
                      <input type="hidden" name="image" value="<?php echo $prod['image']; ?>">
                      
                      <a href="#" class="img-prod">
                        <img class="img-fluid" src="<?php echo $prod['image']; ?>" alt="<?php echo $prod['name']; ?>">
                        <?php if ($prod['old_price']): ?>
                          <span class="status">SALE</span>
                        <?php endif; ?>
                        <div class="overlay"></div>
                      </a>
                      
                      <div class="text py-3 px-3">
                        <h3><a href="#"><?php echo $prod['name']; ?></a></h3>
                        <div class="d-flex">
                          <div class="pricing">
                            <p class="price">
                              <?php if ($prod['old_price']): ?>
                                <span class="mr-2 price-dc">$<?php echo $prod['old_price']; ?>.00</span>
                              <?php endif; ?>
                              <span class="price-sale">$<?php echo $prod['price']; ?>.00</span>
                            </p>
                          </div>
                          <div class="rating">
                            <p class="text-right">
                              <a href="#"><span class="ion-ios-star-outline"></span></a>
                              <a href="#"><span class="ion-ios-star-outline"></span></a>
                              <a href="#"><span class="ion-ios-star-outline"></span></a>
                              <a href="#"><span class="ion-ios-star-outline"></span></a>
                              <a href="#"><span class="ion-ios-star-outline"></span></a>
                            </p>
                          </div>
                        </div>
                        <p class="bottom-area d-flex px-3">
                          <button type="submit" class="btn btn-primary mr-2 flex-fill">
                            <i class="ion-ios-cart"></i> Add to Cart
                          </button>
                          <a href="#" class="btn btn-outline-dark flex-fill">
                            <i class="ion-ios-flash"></i> Buy Now
                          </a>
                        </p>
                      </div>
                    </div>
                  </form>
                </div>
                <?php endforeach; ?>
              <?php else: ?>
                <div class="col-12 text-center py-5">
                  <h3>No products found in this category.</h3>
                </div>
              <?php endif; ?>

            </div>

            <?php if ($total_pages > 1): ?>
            <div class="row mt-5">
              <div class="col text-center">
                <div class="block-27">
                  <ul>
                    <?php if ($page > 1): ?>
                      <li><a href="shop.php?category=<?php echo $category; ?>&page=<?php echo $page - 1; ?>">&lt;</a></li>
                    <?php else: ?>
                      <li class="disabled"><span>&lt;</span></li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                      <?php if ($i == $page): ?>
                        <li class="active"><span><?php echo $i; ?></span></li>
                      <?php else: ?>
                        <li><a href="shop.php?category=<?php echo $category; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                      <?php endif; ?>
                    <?php endfor; ?>

                    <?php if ($page < $total_pages): ?>
                      <li><a href="shop.php?category=<?php echo $category; ?>&page=<?php echo $page + 1; ?>">&gt;</a></li>
                    <?php else: ?>
                      <li class="disabled"><span>&gt;</span></li>
                    <?php endif; ?>
                  </ul>
                </div>
              </div>
            </div>
            <?php endif; ?>

          </div>

          <!-- Sidebar -->
          <div class="col-md-4 col-lg-2 sidebar">
            <div class="sidebar-box-2">
              <h2 class="heading mb-4" style="border-bottom: 2px solid #000; padding-bottom: 10px;">
                <a href="shop.php?category=all" style="color: #000; font-weight: 700; font-size: 18px;">
                  PRODUCTS
                </a>
              </h2>
              <ul>
                <li><a href="shop.php?category=shirts" class="<?php echo ($category == 'shirts') ? 'font-weight-bold text-primary' : ''; ?>">Shirts &amp; Tops</a></li>
                <li><a href="shop.php?category=dresses" class="<?php echo ($category == 'dresses') ? 'font-weight-bold text-primary' : ''; ?>">Dresses</a></li>
                <li><a href="shop.php?category=shorts" class="<?php echo ($category == 'shorts') ? 'font-weight-bold text-primary' : ''; ?>">Shorts &amp; Skirts</a></li>
                <li><a href="shop.php?category=jackets" class="<?php echo ($category == 'jackets') ? 'font-weight-bold text-primary' : ''; ?>">Jackets &amp; Coats</a></li>
                <li><a href="shop.php?category=jeans" class="<?php echo ($category == 'jeans') ? 'font-weight-bold text-primary' : ''; ?>">Jeans &amp; Trousers</a></li>
                <li><a href="shop.php?category=sleeveless" class="<?php echo ($category == 'sleeveless') ? 'font-weight-bold text-primary' : ''; ?>">Sleeveless</a></li>
                <li><a href="shop.php?category=jumpsuits" class="<?php echo ($category == 'jumpsuits') ? 'font-weight-bold text-primary' : ''; ?>">Jumpsuits</a></li>
                <li><a href="shop.php?category=shoes" class="<?php echo ($category == 'shoes') ? 'font-weight-bold text-primary' : ''; ?>">Shoes &amp; Sneakers</a></li>
                <li><a href="shop.php?category=bags" class="<?php echo ($category == 'bags') ? 'font-weight-bold text-primary' : ''; ?>">Bags &amp; Accessories</a></li>
              </ul>
            </div>
          </div>

        </div>
      </div>
    </section>

<?php include 'include/footer.php'; ?>
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
<?php include 'include/scripts.php'; ?>
  </body>
</html>