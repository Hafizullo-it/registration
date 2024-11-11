<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project</title>
    <link type = "text/css" rel = "stylesheet" href = "css/style.css">
</head>
<body>

    <div class="fon1">
        <div class="cart1">
            <form action="log.php" method="POST">

                <!-- !Вводим текстовое поле! -->
                <h1 style="color: rgb(10,90,30);"  align="center" >  Вход </h1>
                <h3 style="color: rgb(221, 15, 15);"  align="center" > Ошибка входа !!! </h3>
                <h3 style="color: rgb(221, 15, 15);"  align="center" > Неправельный пароль или логин </h3>
                <p align="center">
                <br>
                <input class="input-red" type="text" name="login"  placeholder="Хендл">
                <br>
                <br>
                <br>
                <br>
                <input class="input-red" type="password" name="password" placeholder=" Пароль">
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

    $sql = "SELECT * FROM users WHERE login = '$log' and  password = '$pass'";
    
    if ($result = mysqli_query($conn, $sql)) {
        $rowsCount = mysqli_num_rows($result);
        if ($rowsCount > 0){
            
            header("Location: index.php"); 
        } 
        
        
        else {
            //header("Location: logerror.php"); 
        }
    } else {
        //header("Location: logerror.php"); 
    }
}

mysqli_close($conn);
?>