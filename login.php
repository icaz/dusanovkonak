<?php

include('head.php');

$cart_count = count($_SESSION['cart']);

include('header.php');

if (isset($_GET['cat_id'])) {
    $cat_id = clean($_GET['cat_id']);
} else {
    $cat_id = 5;
}

$result_cats = $mysqli->query("SELECT * FROM category WHERE id='$cat_id'");
$cats = $result_cats->fetch_all(MYSQLI_ASSOC);
$cat = $cats[0]["name"];
?>

<!-- Title Page -->
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(images/slider/slider05.jpg);">



    <h2 class="l-text2 t-center">
        LogIN
    </h2>
    <p class="m-text13 t-center">
        prijavite se...
    </p>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">LogIN form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="col-md-12 w-25">
                <form>

                    <div class="bo4 of-hidden size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Ime">
                    </div>

                    <div class="bo4 of-hidden size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="phone-number" placeholder="Broj telefona">
                    </div>

                    <div class="bo4 of-hidden size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="email" placeholder="Email Adresa">
                    </div>

                    <textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="message" placeholder="Poruka"></textarea>

                    <div class="w-size25">
                        <!-- Button -->
                        <button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
                            Pošalji
                        </button>
                    </div>
                </form>
            </div>      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



</section>




<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
    <div class="container">
        <div class="row">

            <div class="col-md-12 w-25">
                <form class="leave-comment">
                    <h4 class="m-text26 p-b-60 p-t-15">
                        Pošaljite nam poruku, upit ili komentar
                    </h4>

                    <div class="bo4 of-hidden size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Ime">
                    </div>

                    <div class="bo4 of-hidden size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="phone-number" placeholder="Broj telefona">
                    </div>

                    <div class="bo4 of-hidden size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="email" placeholder="Email Adresa">
                    </div>

                    <textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="message" placeholder="Poruka"></textarea>

                    <div class="w-size25">
                        <!-- Button -->
                        <button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
                            Pošalji
                        </button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</section>


<?php

include('footer.php');

?>

</html>