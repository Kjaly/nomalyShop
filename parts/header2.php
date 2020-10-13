<?php
require_once 'db/db.php';

    $cats = $connect->query("SELECT * FROM cats");
    $cats = $cats->fetchAll(PDO::FETCH_ASSOC); //Почитать FETCHALL
    $usermail = $_SESSION['logged_user'];


?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src='scripts/main.js'></script>
</head>
<body>
<header class="headerShop">
    <div class="header_logoShop">
        <a href="index.php"><img src="images/logo.svg" alt=""></a>
    </div>
    <div class="header__burger shopBurg">
        <span></span>
    </div>
    <nav class ="shopnav">
        <ul class = "shopUl">
            <li><a href="index.php">Главная</a></li>
            <li><a href="shop.php">Кататог</a></li>
            <? foreach ($cats as $cat) {?>
            <li><a href="shop.php?cat=<? echo $cat['name'] ?>"><? echo $cat['rus_name'] ?></a></li>
            <? }?>
            <li><a href="cart.php">Корзина (Товаров: <? echo $_SESSION['totalQuantity'] ? : "0"  ?> на сумму <?  echo $_SESSION['totalPrice'] ? : "0"?> руб)</a></li>
        </ul>
    </nav>
</header>
<hr>