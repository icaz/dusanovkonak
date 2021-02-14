    <!-- Footer -->
    <footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
</div>
    </div>
    <div class="t-center p-l-15 p-r-15">
                   <div><a href="https://www.facebook.com/pg/Petrovic-Design-tapacirani-namestaj-167161109999608/photos/?ref=page_internal" class="fs-18 color1 p-r-20 fa fa-facebook" target="_blank"></a>
                        <a href="https://www.instagram.com/petrovicnamestaj/?hl=en" class="fs-18 color1 p-r-20 fa fa-instagram" target="_blank"></a>
                       
          </div>
    </div>

        <div class="t-center s-text8 p-t-20">
            Copyright © 2020 Dusanov Konak | Redesign by <img src="images/sign.svg" />|  This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
        </div>
    </div>
</footer>



<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
    <span class="symbol-btn-back-to-top">
        <i class="fa fa-angle-double-up" aria-hidden="true"></i>
    </span>
</div>

<!-- Container Selection -->
<div id="dropDownSelect1"></div>
<div id="dropDownSelect2"></div>




<!--===============================================================================================-->
<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->

<!--===============================================================================================-->
<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript">

    $('.block2-btn-addcart').each(function(){
        var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
        $(this).on('click', function(){
            swal(nameProduct, "is added to cart !", "success");
        });
    });

    $('.block2-btn-addwishlist').each(function(){
        var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
        $(this).on('click', function(){
            swal(nameProduct, "is added to wishlist !", "success");
        });
    });
</script>
<script>
$(document).ready(function () {
    setTimeout(function () { 
    $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
    $("#success-alert").slideUp(500);
  });
}, 1000);
});
</script>


<?php
    if ($_SESSION['sucess_message'] <> '') {
        ?>

<script>



				$(document).ready(function () {
					var nameProduct = "<?php echo $_SESSION['sucess_message']; ?>"
					swal(nameProduct, " - ", "success");
                });
                
				</script>
<?php
    } $_SESSION['sucess_message'] = '';
?>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
