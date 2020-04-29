<?php
//Подключаем модель с функциями text_get и text_set
include_once('m/model.php');

class C_Page extends C_Base
{
	//Формирование главной страницы
	public function action_index()
	{
		$this->title .= 'Главная';
		$text = text_get();
		$this->content = $this->Template('v/v_index.php', array('text' => $text));	
	}
	
    //Страница редактирования контента
	public function action_edit()
	{
		$this->title .= 'Редактирование контента';
		
		if($this->isPost())
		{
			text_set($_POST['text']);
			header('location: index.php');
			exit();
		}
		
		$text = text_get();
		$this->content = $this->Template('v/v_edit.php', array('text' => $text));		
	}
}
