<?php

session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// قراءة البيانات سواء اتبعتت بـ POST أو GET
$id    = $_REQUEST['product_id'] ?? $_REQUEST['id'] ?? null;
$name  = $_REQUEST['product_name'] ?? $_REQUEST['name'] ?? 'Product';
$price = (float)($_REQUEST['price'] ?? 0);
$image = $_REQUEST['image'] ?? '';

if ($id) {

    $found = false;

    // البحث عن المنتج لزيادة الكمية إذا كان موجوداً
    foreach ($_SESSION['cart'] as &$item) {

        if ($item['id'] == $id) {
            $item['quantity']++;
            $found = true;
            break;
        }

    }

    // إذا لم يكن موجوداً نضيفه كمصفوفة جديدة (نفس أسلوبك)
    if (!$found) {

        $_SESSION['cart'][] = [
            'id'       => $id,
            'name'     => $name,
            'price'    => $price,
            'image'    => $image,
            'quantity' => 1
        ];

    }

}

// التوجيه فوراً لصفحة السلة في كل الأحوال
header("Location: cart.php");
exit();

?>