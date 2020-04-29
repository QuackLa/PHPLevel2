<?php
//$text - контент на нашей странице. Это форма для редактирования текста (изменения содержимого переменной $text)
?>

<form method="post">
	<textarea name="text"><?=$text?></textarea>
	<br/>
	<input type="submit" value="Отправить" />
</form>
