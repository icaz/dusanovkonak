<?php

include ('head.php');

$cart_count = count($_SESSION['cart']);

include ('header.php');

if (isset($_GET['cat_id'])) {
	$cat_id = clean($_GET['cat_id']);
} else {
	$cat_id = 5;
}

$cat_name = get_cat_name($cat_id);
$_SESSION['action_page']=$_SERVER['PHP_SELF']."?cat_id=".$cat_id;
if (!isset($_SESSION['sucess_message'])) {
    $_SESSION['sucess_message']='';
}
if (!isset($_SESSION['fail_message'])) {
    $_SESSION['fail_message']='';
}
?>

<!-- Title Page -->
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(images/slider/slider05.jpg);">
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

	<a href="cart.php"><h2 class="l-text2 t-center">
		NARUČI 

	</h2></a>
	<p class="m-text13 t-center">
	<?php echo $cat_name; ?>
	</p>

</section>




<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
				<div class="leftbar p-r-20 p-r-0-sm">
					<!--  -->
					<!-- Categories -->
					<h4 class="m-text23 p-t-56 p-b-34">
						Meni
					</h4>
					<!-- category start -->

					<?php
					include('menu.php');
					?>


					<!-- category end -->
					<div>
						<div> </div>
						<div> </div>
						<div>
							<div> </div>
							<div> </div>
						</div>
					</div>
					<div>
						<div> </div>
					</div>
					<div> </div>
				</div>
			</div>
			<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
				<!-- Product -->
				<div class="item-blog-txt p-t-33">
					<h4 class="p-b-11">
						<?php echo $cat_name; ?>
					</h4>
				</div>

				<div class="row">

					<?php
					include('menu_item.php');
					?>


				</div>

			</div>
		</div>
	</div>
</section>






<?php

include('footer.php');

?>

</html>