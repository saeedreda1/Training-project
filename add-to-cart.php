<?php

// session_start();

// if (!isset($_SESSION['cart'])) {
//     $_SESSION['cart'] = [];
// }

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {

//     $id = $_POST['product_id'];
//     $name = $_POST['product_name'];
//     $price = (float) $_POST['price'];
//     $image = $_POST['image'];

//     $found = false;

//     foreach ($_SESSION['cart'] as &$item) {

//         if ($item['id'] == $id) {

//             $item['quantity']++;
//             $found = true;
//             break;

//         }

//     }

//     if (!$found) {

//         $_SESSION['cart'][] = [
//             'id' => $id,
//             'name' => $name,
//             'price' => $price,
//             'image' => $image,
//             'quantity' => 1
//         ];

//     }

//     header("Location: cart.php");
//     exit();
// }

?>