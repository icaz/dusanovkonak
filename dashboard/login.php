<?php
require 'init.php';
    $err_mail='';
    $mail_validate='';
    $email_value='';
    $err_pass='';
    $pass_validate='';
    $not_active='';


    if (logged_in() === true) {
      header ('Location: index.php');
      exit ();
    }


  
if (isset($_POST['email']) && $_POST['email'] != "" && $_POST['password'] != "")
{
  $email = $mysqli->escape_string($_POST['email']);
  $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");
  $err_mail='<div class="invalid-feedback">
  Korisnik sa ovim email-om nije registrovan.
  </div>';

  if ($result->num_rows == 0)
  {
    echo $err_mail='<div class="invalid-feedback">
              Korisnik sa ovim email-om nije registrovan.
              </div>';
    $mail_validate=' is-invalid';
    $email_value=' value="'.$email.'"';
  }
  else
  {
      $user = $result->fetch_assoc();
      $err_mail='<div class="valid-feedback">
      Email je registrovan.
      </div>';
      $mail_validate=' is-valid';
      $email_value=' value="'.$email.'"';

      if (password_verify($_POST['password'], $user['password']))
      {
        if ($user['active']==1)
        {
          $_SESSION['email'] = $user['email'];
          $_SESSION['nick'] = $user['nick'];

          $_SESSION['logged_in'] = true;

          if ($_POST['rememberme']=='set') 
          {
              setcookie('email', $_POST['email'], time()+60*60*24*365);
          }
          else
          {
              setcookie('email', $_POST['email'], false);
          }
          header("location: index.php");
        }
        elseif ($user['active']==0) {
          $not_active='
          <div class="alert alert-info alert-dismissible small">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          Nalog '.$_POST['email'].' nije aktiviran!
          <br>Proverite email za aktivaciju naloga 
          </div>';
        }
      }
      else
      {
        $err_pass='<div class="invalid-feedback">
        Neisprvana lozinka.
        </div>';
        $pass_validate=' is-invalid';
      }
  }  
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Login Form</title>
    <p class="mb-0">
        <a class="text-sm text-info" href="http://konak.rs" class="text-center">Vrati se na <strong>konak.rs</strong></a>
      </p>

<?php
// var_dump($_SESSION);
// session_destroy();
?>
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
    <script src="js/validation.js" type="text/javascript"></script>
    <script src="js/showpass.js" type="text/javascript"></script>
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="/dashboard/">Log<b>IN</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">

      <form action="login.php" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control<?php echo $mail_validate; ?>" placeholder="Email" <?php echo $email_value; ?> required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div><?php echo $err_mail; ?>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control<?php echo $pass_validate; ?>" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div><?php echo $err_pass; ?>
        </div>
        <?php echo $not_active; ?>
        <div class="row">
          <div class="col-8">

          <div class="custom-control custom-switch custom-switch-on-info">
                      <input type="checkbox" class="custom-control-input" name="rememberme" id="rememberme" value='set'>
                      <label class="custom-control-label" for="rememberme">Zapamti me</label>
                    </div>

          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-sm btn-info btn-block">LogIN</button>
          </div>
          <!-- /.col -->
        </div>
      </form>



      <p class="mb-1">
        <a class="text-sm text-info" href="forgot-password.php">Zaboravio sam lozinku</a>
      </p>
      <p class="mb-0">
        <a class="text-sm text-info" href="register.php" class="text-center">Registruj se</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

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