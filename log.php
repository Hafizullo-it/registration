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
            <form action="log.php" method="POST">
                <!-- !Вводим текстовое поле! -->
                <h1 style="color: rgb(10,90,30);"  align="center" >  Вход </h1>
                <p align="center"> 
                <br>

                <input type="text" name="login"  placeholder="Введите Логин">
                <br>
                <br>
                <br>
                <br>
                <input type="password" name="password" placeholder=" Введите Пароль">
                <br>
                <!--<input type="submit" name="submit"  value="Авторизоватся">-->
                
                <br><br>
                <!-- !Кнопка! -->
                <button type="submit"  class="custom-btn btn-5">Вход</button>
                <p>
                
                <a href="reg.php">Регистрация ←</a>
            </form>
        </div>
    </div>
</body>
</html> 


<?php

$conn = new mysqli("localhost", "root", "", "registration");//подлючение
if ($conn->connect_error) {
    die("Warning: " . mysqli_connect_error());
}

if (isset($_POST['login']) && isset($_POST['password']) && !empty($_POST['password']) && !empty($_POST['login'])
) {
    $log = $_POST['login']; //логин
    $pass = $_POST['password'];//пароль

    $sql = "SELECT * FROM users WHERE login = '$log' and  password = '$pass'"; //запрос SQL  
    if ($result = mysqli_query($conn, $sql)) {
        $rowsCount = mysqli_num_rows($result);
        if ($rowsCount > 0){
            header("Location: index.php"); 
        } 
        
        
        else {
            header("Location: logerror.php"); 
        }
    } else {
        echo "Error";
    }
}

mysqli_close($conn);
?>