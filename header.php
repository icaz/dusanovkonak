<?php


?>

<body class="animsition">

	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->


		<div class="container-menu-header">
			<div class="topbar">
				<div class="topbar-social">
					<a href="https://www.facebook.com/KafanaDusanovkonak/?ref=hl" class="topbar-social-item fa fa-facebook" target="_blank"></a>
					<a href="#" class="topbar-social-item fa fa-instagram"></a>

				</div>

				<span class="topbar-child1">
					Minimalni iznos za DOSTAVU je 800 RSD.
				</span>

				<div class="topbar-child2">
					<span class="topbar-email">
						info@dusanovkonak.com
					</span>
					<div class="topbar-language rs1-select2">
					</div>
				</div>
			</div>



			<div class="wrap_header">
				<!-- Logo -->
				<a href="index.php" class="logo">
					<img src="images/icons/logo.png" alt="IMG-LOGO">
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">

							<li><a href="/">Naslovna</a> </li>

							<li><a href="o-nama.php">O nama</a> </li>

							<li class="sale-noti"><a href="shop.php">NARUČI</a> </li>

							<li><a href="galerija.php">Galerija</a> </li>

							<li><a href="kontakt.php">Kontakt</a> </li>
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">

					<a href="dashboard" class="header-wrapicon1 ">
						<img class="mr-3" src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">LogIN
					</a>
					<span class="linedivide1"></span>

					<div class="header-wrapicon2">
						<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti"><?php echo $cart_count; ?></span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">

							<?php

							include('cart_items.php');

							?>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="index.php" class="logo-mobile" data-toggle="modal" data-target="#exampleModal">
				<img src="images/icons/logo.png" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">

					<a href="dashboard" class="header-wrapicon2 ">
						<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
					</a>
					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
						<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti"><?php echo $cart_count; ?></span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">

							<?php

							include('cart_items.php');

							?>

						</div>
					</div>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu">
			<nav class="side-menu">
				<ul class="main-menu">
					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							Minimalni iznos za DOSTAVU je 800 RSD.
						</span>
					</li>

					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<div class="topbar-child2-mobile">
							<span class="topbar-email">
								info@dusanovkonak.com
							</span>
							<div class="topbar-language rs1-select2">
							</div>
						</div>

					</li>

					<li class="item-topbar-mobile p-l-10">
						<div class="topbar-social-mobile">
							<a href="https://www.facebook.com/KafanaDusanovkonak/?ref=hl" class="topbar-social-item fa fa-facebook" target="_blank"></a>
							<a href="#" class="topbar-social-item fa fa-instagram"></a>
						</div>
					</li>

					<li class="item-menu-mobile">
						<a href="index.php">Naslovna</a>
					</li>

					<li class="item-menu-mobile">
						<a href="o-nama.php">O nama</a>
					</li>

					<li class="item-menu-mobile">
						<a href="shop01.php">NARUČI</a>
					</li>

					<li class="item-menu-mobile">
						<a href="galerija.php">Galerija</a>
					</li>

					<li class="item-menu-mobile">
						<a href="kontakt.php">Kontakt</a>
					</li>


				</ul>
			</nav>
		</div>
	</header>