<?php

session_start();

if (isset($_POST['id']) && isset($_POST['quantity'])) {

    $id = $_POST['id'];
    $quantity = (int)$_POST['quantity'];

    if ($quantity < 1) {
        $quantity = 1;
    }

    foreach ($_SESSION['cart'] as &$item) {

        if ($item['id'] == $id) {

            $item['quantity'] = $quantity;
            break;

        }

    }

}

    success: function () {
    location.reload();
}

?>