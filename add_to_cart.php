<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $quantity = $_POST['quantity'];

    $item = [
        'id' => $product_id,
        'name' => $product_name,
        'price' => $product_price,
        'quantity' => $quantity
    ];

    // Add to session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // If item already in cart, update quantity
    $found = false;
    foreach ($_SESSION['cart'] as &$cartItem) {
        if ($cartItem['id'] == $product_id) {
            $cartItem['quantity'] += $quantity;
            $found = true;
            break;
        }
    }

    if (!$found) {
        $_SESSION['cart'][] = $item;
    }

    header('Location: cart.php');
    exit();
} else {
    echo "Invalid request.";
}
?>
