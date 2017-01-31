<?php
    if (isset($_POST['user_login']))
    { 
        $login = $_POST['user_login'];

     if ($login == '')
      {
       unset($login);
       } 
    } 

    //заносим введенный пользователем логин в переменную $user_login, если он пустой, то уничтожаем переменную
    
    if (isset($_POST['password']))
     {
      $password=$_POST['password'];

       if ($password =='')
        { 
            unset($password);
        } 
    }
    
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
    
    if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    
    //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    
    $login = stripslashes($login);
    
    $login = htmlspecialchars($login);
    
    $password = stripslashes($password);
    
    $password = htmlspecialchars($password);
 
    //удаляем лишние пробелы
    
    $login = trim($login);
    
    $password = trim($password);
 
    // подключаемся к базе
    
    include ("db.php");// файл db.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
 
 // проверка на существование пользователя с таким же логином
    
    $result = mysql_query("SELECT id FROM users WHERE login='$login'");
    
    $myrow = mysql_fetch_array($result);
    
    if (!empty($myrow['id'])) {
    
    exit ("Sorry, you entered login is already registered. Please enter a different username.");
    
    }
 
 // если такого нет, то сохраняем данные
    
    $result2 = mysql_query ("INSERT INTO users (login,password) VALUES('$login','$password')");
   
    // Проверяем, есть ли ошибки
    
    if ($result2=='TRUE')
    
    {
    
    echo "You have successfully logged in! Now you can go to the site.";
    
    }
 
    else 
    {
    
    echo "Error! You are not registred.";
    
    }
?>