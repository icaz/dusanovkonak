<?php
    require 'init.php';

    $nick_validate='';
    $nick_value='';
    $err_nick='';
    $email_validate='';
    $email_value='';
    $err_mail='';
    $pass_validate='';
    $err_pass='';
    $mach_pass='';

    $nick_ok=false;
    $email_ok=false;

if (isset($_POST['btn']) && $_POST['btn']=="1")
{
    if (isset($_POST['nick']) && $_POST['nick'] != "")
    {
        $nick = $mysqli->escape_string($_POST['nick']);
        $result = $mysqli->query("SELECT * FROM user WHERE nick='$nick'");
        if ($result->num_rows > 0)
            {
              $_SESSION['nick_comment']='Već postoji korisnik sa imenom <u><strong> '.$nick.'.</strong></u><br> To možete kasnije promeniti u profilu...';
            }
        if (strlen($nick) > 2)
        {
          $nick_validate=' is-valid';
          $nick_value=' value="'.$nick.'"';
          $nick_ok=true;
        }
        else
        {
          $nick_validate=' is-invalid';
          $nick_value='value="'.$nick.'"';
          $err_nick='<div class="invalid-feedback">Ime mora biti više od 2 karaktera</div>';
        }
    }

    if (isset($_POST['email']) && $_POST['email'] != "")
    {
        $email = $mysqli->escape_string($_POST['email']);
        $result = $mysqli->query("SELECT * FROM user WHERE email='$email'");
        if ($result->num_rows > 0)
        {
          $err_mail='<div class="invalid-feedback">
          E-mail <u><strong>'.$email.'</strong></u> je već registrovan.
          </div>';
          $email_validate=' is-invalid';
          $email_value=' value="'.$email.'"';
        }
        elseif ($result->num_rows == 0)
        {
          $err_mail='<div class="valid-feedback">
          Email '.$email.' je slobodan.
          </div>';
          $email_validate=' is-valid';
          $email_value=' value="'.$email.'"';
          $pass = $mysqli->escape_string($_POST['pass']);
          $email_ok=true;
        }
    }

    if ($email_ok==true && $nick_ok==true)
    {
      $pass = $mysqli->escape_string($_POST['pass']);
      if (strlen($pass) < 8)
      {
        $err_pass='<div class="invalid-feedback">
        '.$mach_pass.' Lozinka ima manje od 8 karaktera. 
        </div>';
        $pass_validate=' is-invalid';
      }
      else {
        $reg_ip =  $_SERVER['REMOTE_ADDR'];
        $hash = $mysqli->escape_string(md5(rand(0,1000)));
    
        $pass = $mysqli->escape_string(password_hash($_POST['pass'], PASSWORD_BCRYPT));

        date_default_timezone_set('Europe/Belgrade');
        setlocale(LC_TIME, array('sr_CS.UTF-8', 'sr.UTF-8'));

        $register_date = date('Y-m-d H:i:s');

        $sql = "INSERT INTO user (nick, email, password, hash, reg_date)" 
              ."VALUES ('$nick', '$email', '$pass', '$hash', '$register_date')";
  
          if ($mysqli->query($sql))
          {
            $_SESSION['message']='Uspešno ste se registrovali!';
            include('mail_it.php');
            echo mail_register($email, $nick, $hash);
            header ('Location: success.php');
          }
      }
    }
}  

?>
<!DOCTYPE html>
<html  lang="rs">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registracija</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="/dashboard/">Registruj<b>SE</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Unesi podatke za registraciju</p>


      <form action="register.php" method="post">
        <div class="input-group mb-3">
          <input name="nick" type="text"  class="form-control <?php echo $nick_validate; ?>" placeholder="Kako se zoveš?" <?php echo $nick_value; ?> required autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div><?php echo $err_nick;?>
        </div>
        <div class="input-group mb-3">
          <input id="email"  name="email" type="email" class="form-control <?php echo $email_validate; ?>" placeholder="Email" <?php echo $email_value; ?> required  autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div><?php echo $err_mail;?>
        </div>
        <div class="input-group mb-3">
          <input id="passfield" name="pass" type="password" class="form-control <?php echo $pass_validate; ?>" placeholder="Lozinka min 8 karatera"  autocomplete="off" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-eye"></span>

            </div>
          </div><div id="pass_valid"></div>
        </div>

        <div class="row">
        <div class="col-8"><a class="text-sm text-info" href="login.php" class="text-center">Već sam registrovan</a>
</div>
          <!-- /.col -->
          <div class="col-4">
            <button id="mySubmit" name="btn" value="1" type="submit" class="btn btn-sm btn-info btn-block">RegistrujSE</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.form-box -->
    <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <?php
          //echo $message; 
          ?>
          <!-- /.col -->
        </div>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>