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
		Korpa <sup>(<?php echo $cart_count; ?>)</sup>
	</h2>

<?php
	if ($cart_count>0) {
?>
	<hr>
	<div class="size12 trans-0-4 m-l-r-auto m-b-10 t-right">
		<!-- Button -->
		<a href="cart_action.php?reset">
			<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
				Isprazni korpu
			</button></a>
	</div>
<?php
	}
?>



	<?php
	if ($cart_count == 0) { ?>
		<p class="m-text13 t-center">
			<?php echo 'Korpa je prazna'; ?>
		</p>
	<?php
	}
	echo '</section>';
	if ($cart_count != 0) {

	?>

		<!-- Cart -->
		<section class="cart bgwhite p-t-20 p-b-20">
			<div class="container">
				<!-- Cart item -->


				<!-- <div class="size12 trans-0-4 m-l-r-auto m-b-10 t-right">
					<a href="cart_action.php?reset">
						<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
							Isprazni korpu
						</button></a>
				</div> -->


				<div class="container-table-cart pos-relative">
					<div class="wrap-table-shopping-cart bgwhite">
						<table class="table-shopping-cart">
							<tr class="table-head">
								<th class="column-1"></th>
								<th class="column-2">Naziv</th>
								<th class="column-3">Cena</th>
								<th class="column-4 p-l-70">Količina</th>
								<th class="column-5">Ukupno</th>
							</tr>


							<div id="korpa_rows">
								<?php

								include('korpa_items.php');

								?>
							</div>

						</table>

						<!-- <div class="size12 trans-0-4 m-l-r-auto m-b-10 t-right">
							<a href="cart_action.php?reset">
								<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
									Isprazni korpu
								</button></a>
						</div> -->


					</div>
				</div>


				<section class="bgwhite p-t-66 p-b-60">
					<div class="container">
						<div class="row">
							<div style="border: 1px solid lightgray;" class="col-md-6 p-b-30">

								<form action="dashboard/order_it.php" method="POST" class="leave-comment">
									<h4 class="m-text26 p-b-36 p-t-15">
										Unesite podatke za dostavu
									</h4>

									<div class="bo4 of-hidden size15 m-b-20">
										<input name="name" type="text" class="sizefull s-text7 p-l-22 p-r-22" type="text" placeholder="Ime i prezime *" required>
									</div>

									<div class="bo4 of-hidden size15 m-b-20">
										<input name="phone" type="text" class="sizefull s-text7 p-l-22 p-r-22" type="text" placeholder="Telefon *" required>
									</div>

									<div class="bo4 of-hidden size15 m-b-20">
										<input name="email" type="email" class="sizefull s-text7 p-l-22 p-r-22" type="text" placeholder="Email Adresa">
									</div>

									<textarea name="address" class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" placeholder="Adresa za dostavu *" required></textarea>



									<small>* - obavezna polja</small>


							</div>

							<div style="border: 1px solid lightgray;" class="col-md-6 p-b-30">


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
									<input type="hidden" name="price" value="<?php echo $total;?>">
									<input type="hidden" name="delivery_price" value="<?php echo $shipping;?>">
								</div>

							</div>

						</div>

						<div style="padding-top: 25px; margin:auto;" class="w-size25">
							<!-- Button -->
							<button name="submit" value="1" type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
								Naruči
							</button>
						</div>
						</form>



					</div>





			</div>


		</section>


	<?php
	}

	include('footer.php');



	?>