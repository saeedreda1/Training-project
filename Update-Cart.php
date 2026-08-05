<?php

session_start();

// استقبال الـ id والـ quantity سواء اتبعتوا بـ POST أو GET
$id       = $_REQUEST['id'] ?? $_REQUEST['product_id'] ?? null;
$quantity = (int)($_REQUEST['quantity'] ?? 1);

if ($quantity < 1) {
    $quantity = 1;
}

if ($id && isset($_SESSION['cart'])) {

    foreach ($_SESSION['cart'] as &$item) {

        if ($item['id'] == $id) {
            $item['quantity'] = $quantity;
            break;
        }

    }

}

// التوجيه دايماً لصفحة السلة بره الـ if عشان الصفحات ما تعلقش
header("Location: cart.php");
exit();

?>