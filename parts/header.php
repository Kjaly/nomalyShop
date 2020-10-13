<header class="header">
        <div class="container">
            <div class="header_inner">
                <div class="header_logo">
                    <a href="index.php"><img src="images/logo.svg" alt=""></a>
                </div>
                <div class="header__burger">
                    <span></span>
                </div>
                <nav class="nav">

                    <a class="nav__link" href="index.php">About</a>
                    <a class="nav__link" href="#">Blog</a>
                    <?php if(isset ($_SESSION['logged_user'])): ?>
                    <a class="nav__link" href="../shop.php">Shop</a>
                    <a class="nav__link" href="../cart.php">Cart</a>
                    <div class="authorise">
                           <a class="signin" href="#"> <?php echo $_SESSION['logged_user']->login; ?></a>
                            <a class="signup" href="logout.php">Выйти</a>
                            <?php else : ?>
                        <div class="authorise">
                        <a class="signin" href="signup.php" >LogIn</a>
                        <a class="signup" href="signup.php" >SignUp</a>
                         <?php endif; ?>
                    </div>
                </nav>
            </div>
        </div>

    </header>
