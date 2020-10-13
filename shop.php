<?php
session_start();
if(empty($_SESSION['logged_user'])){
    header('Location: index.php');
}
require_once 'parts/header2.php';

if (isset($_GET['cat'])){
    $currentcat = $_GET['cat'];
    $products = $connect->query("SELECT * FROM products WHERE cat='$currentcat'")->fetchAll(PDO::FETCH_ASSOC);

    if(!$products){
        die("<div class='nCats'>Такой категории не найдено</div>");
    }
} else {
    $products = $connect->query("SELECT * FROM products");
    $products = $products->fetchAll(PDO::FETCH_ASSOC);
}

?>
<div class="productWrapper">
    <div class="main">
        <? foreach ($products as $product) { ?>
            <div class="card">
                <a href="product.php?product=<? echo $product['title'] ?>">
                    <img class ='image' src="images/shop/<? echo $product['img']?>" alt="<? echo $product['rus_name']?>">
                </a>
                <div class="label"><? echo $product['rus_name']?> (<? echo $product['price']?> рублей)</div>
                <? require 'parts/add-form.php'?>
            </div>
        <? }?>

    </div>
</div>
<?php require_once 'parts/footer.php'?>
