<?php

session_start();
include "include/db.php";

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    die("Cart is empty!");
}

// بيانات العميل
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];
$city = $_POST['city'];
$zipcode = $_POST['zipcode'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$payment_method = $_POST['payment_method'];

// حساب الإجمالي
$total = 0;

foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'] * $item['quantity'];
}

// حفظ الأوردر
$sql = "INSERT INTO orders
(firstname, lastname, address, city, zipcode, phone, email, payment_method, total)
VALUES
('$firstname','$lastname','$address','$city','$zipcode','$phone','$email','$payment_method','$total')";

mysqli_query($conn, $sql);

// رقم الأوردر الجديد
$order_id = mysqli_insert_id($conn);

// حفظ المنتجات
foreach ($_SESSION['cart'] as $item) {

    $product_id = $item['id'];
    $product_name = $item['name'];
    $price = $item['price'];
    $quantity = $item['quantity'];

    $sql2 = "INSERT INTO order_items
    (order_id, product_id, product_name, price, quantity)
    VALUES
    ('$order_id','$product_id','$product_name','$price','$quantity')";

    mysqli_query($conn, $sql2);
}

// تفريغ السلة
unset($_SESSION['cart']);

header("Location: index.php");
exit;

?>