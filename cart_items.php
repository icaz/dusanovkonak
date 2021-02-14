<?php
$cart_count = count($_SESSION['cart']);
$cart_items = array();
$total = 0;
$sub_total = 0;
if ($cart_count > 0) {
    $cart_array = array_keys($_SESSION['cart']);
} else {
    unset($cart_array);
}
?>
<ul class="header-cart-wrapitem">

    <?php

    if (isset($cart_array)) {
        foreach ($cart_array as $cart_item_id) {
            $cart_item_detail = get_item_detail($cart_item_id);
    ?>

            <li class="header-cart-item">
                <a href="cart_action.php?remove=<?php echo $cart_item_id; ?>">
                    <div class="header-cart-item-img">
                        <img src="<?php echo $cart_item_detail['img']; ?>" alt="IMG">
                    </div>
                </a>
                <div class="header-cart-item-txt">
                    <a href="#" class="header-cart-item-name">
                        <?php echo $cart_item_detail['name']; ?>
                    </a>

                    <span class="header-cart-item-info">
                        <?php echo $_SESSION['cart'][$cart_item_id]; ?> x <?php echo $cart_item_detail['price']; ?> din
                    </span>
                </div>
            </li>


    <?php
            $sub_total = ($_SESSION['cart'][$cart_item_id]) * $cart_item_detail['price'];
            $total = $total + $sub_total;
        }
    }
    ?>

</ul>

<div class="header-cart-total">
    Total: <?php echo $total; ?>.00 din
</div>

<div class="header-cart-buttons">
    <div class="header-cart-wrapbtn">
        <!-- Button -->
        <a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
            Korpa
        </a>
    </div>

    <div class="header-cart-wrapbtn">
        <!-- Button -->
        <!-- <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
            Naruči
        </a> -->
    </div>
</div>