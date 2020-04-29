<?php
//Форма регистрации пользователя
?>

<form method="POST">
    <input type="text" value="<?=$login?>" name="login" placeholder="Login"><br/>
    <input type="text" value="<?=$password?>" name="password" placeholder="Password"><br/>
    <input type="text" value="<?=$mail?>" name="mail" placeholder="Email"><br/>
    <input type="text" value="<?=$name?>" name="name" placeholder="Имя"><br/>
    <input type="text" value="<?=$surname?>" name="surname" placeholder="Фамилия"><br/>
    <input type="submit" value="Зарегистрироваться">
</form>
