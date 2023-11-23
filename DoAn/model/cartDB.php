<?php

include_once('connectDB.php');

//--------Cart------------
$lifetime = 60 * 60 * 24 * 30;    // 1 months in seconds
session_set_cookie_params($lifetime, '/');
session_start();

// Add an item to the cart
function add_item_cart($key, $quantity) {
    // Create a table of products
    $products = array();
//    Database::db_connect();
//     $sql = "select * from san_pham";
//     $dssp = Database::db_get_list($sql);
//     Database::db_disconnect();
$dssp=ProductDB::getProducts();
    if(!empty($dssp)){
        foreach($dssp as $sp):
            $products[$sp->getId()] = array('name' => $sp->getTen(), 'cost' => $sp->getGia());
        endforeach;
    }

    if ($quantity < 1) return;

    // If item already exists in cart, update quantity
    if (isset($_SESSION['cart'][$key])) {
        $quantity += $_SESSION['cart'][$key]['qty'];
        update_item_cart($key, $quantity);
        return;
    }

    // Add item
    $cost = $products[$key]['cost'];
    $total = $cost * $quantity;
    $item = array(
        'name' => $products[$key]['name'],
        'cost' => $cost,
        'qty'  => $quantity,
        'total' => $total
    );
    $_SESSION['cart'][$key] = $item;
}

// Update an item in the cart
function update_item_cart($key, $quantity) {
    $quantity = (int) $quantity;
    if (isset($_SESSION['cart'][$key])) {
        if ($quantity <= 0) {
            unset($_SESSION['cart'][$key]);
        } else {
            $_SESSION['cart'][$key]['qty'] = $quantity;
            $total = $_SESSION['cart'][$key]['cost'] *
                    $_SESSION['cart'][$key]['qty'];
            $_SESSION['cart'][$key]['total'] = $total;
        }
    }
}

// Get cart subtotal
function get_subtotal_cart () {
    $subtotal = 0;
    foreach ($_SESSION['cart'] as $item) {
        $subtotal += $item['total'];
    }
    $subtotal_f = number_format($subtotal, 0,',','.');
    return $subtotal_f;
}

 
?>