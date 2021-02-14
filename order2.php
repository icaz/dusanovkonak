<?php

include('head.php');

$cart_count = count($_SESSION['cart']);

include('header.php');

$_SESSION['action_page'] = $_SERVER['PHP_SELF'];

?>

<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/heading-pages-01.jpg);">

    <?php
    if ($_SESSION['sucess_message'] <> '') {
    ?>
        <div class="alert alert-success text-center" id="success-alert">
            <?php echo $_SESSION['sucess_message']; ?>
        </div>
    <?php
        $_SESSION['sucess_message'] = '';
    }
    if ($_SESSION['fail_message'] <> '') {
    ?>
        <div class="alert alert-danger text-center" id="success-alert">
            <?php echo $_SESSION['fail_message']; ?>
        </div>
    <?php
        $_SESSION['fail_message'] = '';
    }
    ?>


    <h2 class="l-text2 t-center">
        Narudžbina
    </h2>

    <?php
    if ($cart_count == 0) { ?>
        <p class="m-text13 t-center">
            <?php echo 'Korpa je prazna'; ?>
        </p>
    <?php
    }
    ?>

</section>

<?php
if ($cart_count != 0) {

?>

    <section class="bgwhite p-t-66 p-b-60">
        <div class="container">
            <div class="row">
                <div style="border: 1px solid lightgray;" class="col-md-6 p-b-30">

                    <form class="leave-comment">
                        <h4 class="m-text26 p-b-36 p-t-15">
                            Unesite podatke za dostavu
                        </h4>

                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Ime i prezime *" required>
                        </div>

                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="phone-number" placeholder="Telefon *" required>
                        </div>

                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="email" placeholder="Email Adresa">
                        </div>

                        <textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="message" placeholder="Adresa za dostavu *" required></textarea>



                        <small>* - obavezna polja</small>


                </div>

                <div style="border: 1px solid lightgray;" class="col-md-6 p-b-30">

                    <div class="p-r-10 p-r-0-lg">

                        <ul class="header-cart-wrapitem2">

                            <?php

                            if (isset($cart_array)) {
                                foreach ($cart_array as $cart_item_id) {
                                    $cart_item_detail = get_item_detail($cart_item_id);
                            ?>

                                    <li style="border-bottom: 1px solid lightgray;" class="header-cart-item">
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



                    </div>



                </div>

            </div>

            <div style="padding-top: 25px; margin:auto;" class="w-size25">
                <!-- Button -->
                <button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
                    Naruči
                </button>
            </div>
            </form>



        </div>
    </section>




    <!-- Cart -->
    <section class="cart bgwhite p-t-70 p-b-100">
        <div class="container">
            <!-- Cart item -->




            <!-- Total -->
            <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
                <h5 class="m-text20 p-b-24">
                    Ukupno u korpi
                </h5>

                <!--  -->
                <div class="flex-w flex-sb-m p-b-12">
                    <span class="s-text18 w-size19 w-full-sm">
                        Svega:
                    </span>

                    <span class="m-text21 w-size20 w-full-sm t-right">
                        <strong><?php echo $total; ?>.00 din</strong>
                    </span>
                </div>

                <!--  -->
                <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
                    <span class="s-text18 w-size19 w-full-sm">
                        Dostava:
                    </span>

                    <div class="w-size20 w-full-sm">
                        <p class="s-text8 p-b-23">
                            Minimalni iznos za besplatnu dostavu je <strong>800.00 din</strong> <br>
                            <?php
                            $shipping = 0;
                            if ($total < 800) {
                                echo 'Pošto je iznos narudžbine manji od <strong>800.00 din</strong>, 
									cena dostave je <strong>200.00 din</strong> na užoj teritoriji grada Niša. 
									Za bliže informacije možete nas kontaktirati telefonom ili 
									ili pošaljite upit na strani za kontakt.';
                                $shipping = 200;
                            } else {
                                echo 'Pošto je iznos narudžbine veći od <strong>800.00 din</strong>, 
									dostava se ne naplaćuje užoj teritoriji grada Niša. 
									Za bliže informacije možete nas kontaktirati telefonom ili 
									ili pošaljite upit na strani za kontakt.';
                                $shipping = 0;
                            }
                            ?>
                        </p>
                    </div>
                </div>
                <!--  -->
                <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
                    <span class="s-text18 w-size19 w-full-sm">
                        Cena dostave:
                    </span>

                    <span class="m-text21 w-size20 w-full-sm t-right">
                        <strong><?php echo $shipping; ?>.00 din</strong>
                    </span>

                </div>

                <!--  -->
                <div class="flex-w flex-sb-m p-t-26 p-b-30">
                    <span class="m-text22 w-size19 w-full-sm">
                        Svega ukupno:
                    </span>

                    <span class="m-text21 w-size20 w-full-sm t-right">
                        <strong><?php echo $total + $shipping; ?>.00 din</strong>
                    </span>
                </div>

                <div class="size15 trans-0-4">
                    <!-- Button -->
                    <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                        Naruči
                    </button>
                </div>
            </div>



        </div>


    </section>


<?php
}

include('footer.php');



?>