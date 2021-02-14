<ul>
    <?php
    $result_category = $mysqli->query("SELECT * FROM category");
    $categories = $result_category->fetch_all(MYSQLI_ASSOC);
    foreach ($categories as $category) {
    ?>
    <li class="p-t-6 p-b-8 bo6">
        <a href="shop.php?cat_id=<?php echo $category['id']; ?>" class="s-text13 p-t-5 p-b-5">
            <?php echo $category['name']; ?>
        </a>
    </li>
    <?php
    }
    ?>
</ul>
