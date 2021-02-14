<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart']=array();
}
    if (isset($_GET['add'])) {
    $id=$_GET['add'];
    if (isset($_SESSION['cart'][$id])) {
        $qty=$_SESSION['cart'][$id];
        $qty=$qty+1;
        $_SESSION['cart'][$id]=$qty;

    } else { $_SESSION['cart'][$id]=1; }

}
if (isset($_GET['subtract'])) {
    $id=$_GET['subtract'];
    if (isset($_SESSION['cart'][$id])) {
        $qty=$_SESSION['cart'][$id];
        if ($qty==1) {
            unset($_SESSION['cart'][$id]);
        }
        elseif ($qty>1) {
            $qty=$qty-1;
            $_SESSION['cart'][$id]=$qty;
            }
        
    }

}
if (isset($_GET['reset'])) {
    unset($_SESSION['cart']);
    $_SESSION['cart']=array();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="test.php?add=1">add 1</a>
<a href="test.php?add=2">add 2</a>
<a href="test.php?add=3">add 3</a>
<a href="test.php?add=4">add 4</a>
<hr>
<a href="test.php?subtract=1">subtract 1</a>
<a href="test.php?subtract=2">subtract 2</a>
<a href="test.php?subtract=3">subtract 3</a>
<a href="test.php?subtract=4">subtract 4</a>
<hr>
<a href="test.php?reset">reset</a>
<?php
echo '<hr>';
echo 'korpa('.count($_SESSION['cart']).')';

echo '<hr>';
echo '<pre>';
var_dump($_SESSION);
?>
</body>
</html>