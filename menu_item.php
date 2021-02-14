<?php
$result = $mysqli->query("SELECT * FROM menu WHERE category_id='$cat_id'");
$menu_items = $result->fetch_all(MYSQLI_ASSOC);
foreach ($menu_items as $menu_item) {
?>
<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">						
    <!-- Block2 -->
    <div class="block2">
        <div class="block2-img wrap-pic-w of-hidden pos-relative">
            <img src="<?php echo $menu_item['img']; ?>" alt="PRODUCT" border="0">														
            <div class="block2-overlay trans-0-4">
                    <div class="block2-btn-addcart w-size1 trans-0-4">
                        <!-- Button -->
                        <a href="cart_action.php?add=<?php echo $menu_item['id']; ?>">
                        <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">dodaj u korpu</button></a>
                    </div>
            </div>
        </div>
        <div class="block2-txt p-t-20">
            <a href="01-01.html" class="block2-name dis-block s-text3 p-b-5"><?php echo $menu_item['name']; ?></a>
            <span class="block2-name dis-block s-text3 p-b-5"><?php echo $menu_item['detail']; ?></span>
            <span class="block2-price m-text6 p-r-5">
            <strong><?php echo $menu_item['price']; ?></strong> RSD </span>
            <a href="cart_action.php?add=<?php echo $menu_item['id']; ?>"><button class="float-right size0 bg4 bo-rad-23 hov1 s-text1 trans-0-4">dodaj u korpu</button></a>
        </div>
    </div>
</div>
<?php
}
?>