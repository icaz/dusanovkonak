<?php
include('dashboard/init.php');
ob_start();

if (isset($_GET['add'])) {
    $id = $_GET['add'];
    $item_details=get_item_detail($id);
    $item_name = $item_details['name'];
    $item_detail = $item_details['detail'];
    $item_price = $item_details['price'];
    $item_img = $item_details['img'];
    $_SESSION['sucess_message'] = '';

    if (isset($_SESSION['cart'][$id])) {
        $qty = $_SESSION['cart'][$id];
        $qty = $qty + 1;
        $_SESSION['cart'][$id] = $qty;
        $_SESSION['sucess_message'] = 'Artikl '.$item_name.' je dodat u korpu.';
    } else {
        $_SESSION['cart'][$id] = 1;
        $_SESSION['sucess_message'] = 'Artikl '.$item_name.' je dodat u korpu.';
    }
}
if (isset($_GET['subtract'])) {
    $id = $_GET['subtract'];
    $item_details=get_item_detail($id);
    $item_name = $item_details['name'];
    $item_detail = $item_details['detail'];
    $item_price = $item_details['price'];
    $item_img = $item_details['img'];
    $_SESSION['fail_message'] = '';

    if (isset($_SESSION['cart'][$id])) {
        $qty = $_SESSION['cart'][$id];
        if ($qty == 1) {
            unset($_SESSION['cart'][$id]);
            $_SESSION['fail_message'] = 'Artikl '.$item_name.' je uklonjen iz korpe.';
        } elseif ($qty > 1) {
            $qty = $qty - 1;
            $_SESSION['cart'][$id] = $qty;
            $_SESSION['fail_message'] = 'Artikl '.$item_name.' je uklonjen iz korpe.';
        }
    }
}

if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    $item_details=get_item_detail($id);
    $item_name = $item_details['name'];
    $item_detail = $item_details['detail'];
    $item_price = $item_details['price'];
    $item_img = $item_details['img'];
    unset($_SESSION['cart'][$id]);
    $_SESSION['fail_message'] = 'Artikl '.$item_name.' je uklonjen iz korpe.';
}



if (isset($_GET['reset'])) {
    unset($_SESSION['cart']);
    $_SESSION['cart'] = array();
    $_SESSION['fail_message'] = 'Korpa je sada prazna.';
}


// echo '<hr>';
// echo 'korpa('.count($_SESSION['cart']).')';

// echo '<hr>';
// echo '<pre>';
// var_dump($_SESSION);

header("Location: ".$_SESSION['action_page']);
?>
