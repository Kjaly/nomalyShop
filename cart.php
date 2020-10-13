<?php
session_start();
//unset($_SESSION['mail']);
//var_dump($_SESSION['mail']);
if(empty($_SESSION['logged_user'])){
    header('Location: index.php');
}
require_once 'parts/header2.php';
if (isset($_SESSION['order'])){ ?>
<div class="cart-title">
     <h2>Ваш заказ под номером <? echo $_SESSION['order']?> принят </h2>
     <a href="index.php" class ='back'>На главную</a>
    </div>
<?php }
else if (count($_SESSION['cart'])== 0 ) { ?>
 <div class="cart-title">
     <h2>Корзина пуста :( </h2>
     <a href="index.php" class ='back'>На главную</a>
    </div>
    <?php } else {
foreach ($_SESSION['cart'] as  $key =>$product){
?>

    <div class="cart">
        <a href="product.php?product=<? echo $product['title'] ?>">
            <img src="images/shop/<? echo $product['img']?>" alt="<? echo $product['rus_name']?>">
        </a>
        <div class="descrwrapper">
            <div class="cart-descr">
                <b><? echo $product['rus_name']?></b>  <span class="redspan">(<? echo $product['cat']?>) </span> в количестве <? echo $product['quantity']?> шт на сумму <? echo $product['quantity'] * $product['price'] ?> рублей
            </div>
            <form action="actions/delete.php" method="post">
                <input type="hidden" name="delete" value="<? echo $key?>">
                <input name ="deleteBtn" type="submit" value="&#10008;">
            </form>
        </div>
    </div>


<?php } ?>
<hr>
    <form action="actions/mail.php" method="post" class="order">
        <input type="text" name="username" required placeholder="Ваше имя" >
        <input type="text" name="phone" required placeholder="Ваш телефон">
        <input type="email" name="email" required placeholder="Ваш email" value="<? echo $_SESSION['mail'] ?>">
        <input type="submit" name="order" value="Отправить заказ">
    </form>
<hr>
<?php } ?>


<?php require_once 'parts/footer.php'?>

