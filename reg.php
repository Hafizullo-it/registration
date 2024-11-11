<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <title>Project</title>
    <link type = "text/css" rel = "stylesheet" href = "css/style.css">
</head>
<body>
    <div class="fons">
        <div class="carts">
            <form action="reg.php" method="POST">
                <!-- !Вводим текстовое поле! -->
                <h1 style="color: rgb(10,90,30);"  align="center" >  Регистрация </h1>
                <p align="center"> 
                <br>
                <br>
                
                <input type="text" name="name" placeholder="Введите Имя">
                <br>
                <br>
                
                <input type="text" name="login" placeholder="Введите Логин">
                <br>
                <br>
                <input type="password" name="password"  placeholder="Введите Пароль">
                <br>
                <br>
                <input type="text" name="email" placeholder="Введите Email ">
                <br>
                <!--<input type="submit" name="submit"  value="Registr">-->
                <br>
                <button type="submit"  class="custom-btn btn-5">Регистрация</button>
                <p>
                <a href="log.php">Авторизоватся ←</a>
            </fporm>
        </div>
    </div>
</body>
</html> 
<?php
	$host = 'localhost'; // имя хоста
	$user = 'root';      // имя пользователя
	$pass = '';          // пароль
	$name = 'registration';      // имя базы данных
	$conn = new mysqli("localhost", "root", "", "registration");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    if( !empty($_POST["login"]) && isset($_POST["login"]) && !empty($_POST["password"]) && isset($_POST["password"]) && !empty($_POST["email"]) && isset($_POST["email"]) && !empty($_POST["name"]) && isset($_POST["name"]) )
	{
    //проверка пользователя
        $a=$_POST['login'];
        $b=$_POST['password'];
        $c=$_POST['email']; 
        $d=$_POST['name'];
    $sql = "INSERT INTO `users` (name, login, password, email) VALUES ( '$d', '$a', '$b', '$c')";
    if($conn->query($sql)){
        echo "Данные успешно добавлены";
        clearstatcache();
    } else{
        echo "Ошибка: " . $conn->error;
    }
    }
    $conn->close();
    ?>
      