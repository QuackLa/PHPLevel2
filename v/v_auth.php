<?php
//Формая для авторизации уже существующих пользователей
?>

<form method="POST">
    <input type="text" name="login" placeholder="login" value="<?=$login?>"><br/>
    <input type="text" name="password" placeholder="password" value="<?=$password?>"><br/>
    <input type="submit" value="Войти">
</form>