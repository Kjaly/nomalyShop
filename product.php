<?php
$ref = $_SERVER['HTTP_REFERER'];
session_start();
if(empty($_SESSION['logged_user'])){
    header('Location: index.php');
}

require_once 'db/db.php';

if(isset($_GET['product'])){
    $currentproduct = $_GET['product'];
    $product = $connect ->query("SELECT * FROM products WHERE title = '$currentproduct'");
    $product = $product->fetch(PDO::FETCH_ASSOC);

    if(!$product){
        header('Location: index.php');
    }
    require_once 'parts/header2.php';
//    echo '<pre>';
//    var_dump($product);
//    echo '</pre>';
}
?>

    <div class="product-card">
        <a href="<? echo $ref?>">Назад</a>

        <h2 class ='pName'><? echo $product['rus_name']?> (<? echo $product['price']?> рублей)</h2>
        <div class="innerWrapper">
            <div class="descr"><? echo $product['description']?></div>
            <img  src="images/shop/<? echo $product['img']?>" alt="<? echo $product['rus_name']?>">
            <? require_once 'parts/add-form.php'?>
        </div>

    </div>

<?php require_once 'parts/footer.php'?>