<?php require "parts/db.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
	<title>SignUp</title>
    <link rel="stylesheet" href="css/stylereg.css">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Montserrat:400,700&display=swap&subset=cyrillic-ext" rel="stylesheet">
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900&subset=latin,latin-ext'>

</head>
<body>
<div class="wrapper">
<form class = 'signin' action="signup.php" method="post">

    <div class="materialContainer">

    <div class="wrapper__inner">
       <div class="box">

          <div class="title">LOGIN</div>

          <div class="input">
             <label for="name">Username</label>
             <input type="text" name="name" id="name">
             <span class="spin"></span>
          </div>


          <div class="input">
             <label for="pass">Password</label>
             <input type="password" name="pass" id="pass">
             <span class="spin"></span>
          </div>

          <div class="button login">
             <button type="submit" name="do_login"><span>Войти</span> <i class="fa fa-check"></i></button>
          </div>

          <a href="index.php" class="pass-forgot">Вернуться на главную</a>

        </div>
        <div class="overbox">
            <div class="material-button alt-2"><span class="shape"></span></div>

            <div class="title">REGISTER</div>

            <div class="input">
                <label for="regname">Username</label>
                <input type="text" name="regname" value="<?php echo @$data['regname']  ?>" id="regname">
                <span class="spin"></span>
            </div>

            <div class="input">
                <label for="regmail">E-mail</label>
                <input type="email" name="regmail" value="<?php echo @$data['regmail']  ?>" id="regmail">
                <span class="spin"></span>
            </div>

            <div class="input">
                <label for="regpass">Password</label>
                <input type="password" name="regpass" value="<?php echo @$data['regpass']  ?>" id="regpass">
                <span class="spin"></span>
            </div>

            <div class="input">
                <label for="regpass_2">Repeat Password</label>
                <input type="password" name="regpass_2" id="regpass_2">
                <span class="spin"></span>
            </div>

            <div class="button">
                <button type="submit" name="do_signup"><span>Далее</span></button>
            </div>


        </div>
    </div>
<?php 

       $data = $_POST;
       if (isset($data['do_login']))
      {
         $errors = array();
         $user = R::findone('users', 'login = ?', array($data['name']));

         if ($user)
         {
            if(password_verify($data['pass'], $user->password))
            {
                $_SESSION['mail']= $user->mail;
               $_SESSION['logged_user']= $user;
               echo '<div class="hi"> <a href="shop.php"> Привет, ' .$data['name']. '</a></div>';
               echo '<div class="mainpg"> <a href="shop.php"> CLRNOMALY </a></div>';
            }else
            {
               $errors[] = 'Неверный пароль!';
            }

         } else
         {
            $errors[] = 'Пользователь не найден!';
         }

           if( ! empty($errors))
         {
            echo '<div class="error">'.array_shift($errors).'</div>';

         }

      }


      if (isset($data['do_signup']))
      {
         //здеcь регистрируем
      

         $errors = array();
         if(trim($data['regname'])=='')
         {
            $errors[]= 'Введите логин';
         }

          if(trim($data['regmail'])=='')
         {
            $errors[]= 'Введите почту';
         }


          if(trim($data['regpass'])=='')
         {
            $errors[]= 'Введите пароль';
         }

            if($data['regpass_2'] == '')
         {
            $errors[]= 'Повторный пароль не введен';
         }

          if($data['regpass_2'] != $data['regpass'])
         {
            $errors[]= 'Повторный пароль введен неверно';
         }

           if(R::count('users',"login = ?", array($data['regname'])) > 0 )
         {
            $errors[]= 'Пользователь с таким логином уже существует ';
         }

            if(R::count('users',"mail = ?", array($data['regmail'])) > 0 )
         {
            $errors[]= 'Пользователь с такой почтой уже существует';
         }

       

         if(empty($errors))
         {
            $user = R::dispense('users');
            $user->login = $data['regname'];
            $user->mail = $data['regmail'];
            $user->password = password_hash($data['regpass'], PASSWORD_DEFAULT);
            R::store($user);
            echo '<div class="complete"> Вы успешно зарегистрированы! </div>';
         } else
         {
            echo '<div class="error">'.array_shift($errors).'</div>';

         }

      }

 ?>



    </div>
</form>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="scripts/reg.js"></script>
</body>
</html>