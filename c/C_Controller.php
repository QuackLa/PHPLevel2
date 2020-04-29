<?php
//Основной класс 'Контроллер'
abstract class C_Controller
{
	public $db;
	// ��������� �������� �������
	protected abstract function render();
	
	// ������� �������������� �� ��������� ������
	protected abstract function before();
	
	public function Request($action)
	{
		$this->before();//����� ���������� �� ������������ ������ ��� ������
		$this->$action();   //$this->action_index
		$this->render();
	}
	
	//Проверка на налчии какого-либо запроса GET
	protected function IsGet()
	{
		return $_SERVER['REQUEST_METHOD'] == 'GET';
	}

	//Проверка на налчии какого-либо запроса POST
	protected function IsPost()
	{
		return $_SERVER['REQUEST_METHOD'] == 'POST';
	}

	//Подключение HTML/Twig шаблона
	protected function Template($fileName, $vars = array())
	{
		// ��������� ���������� ��� �������.
		foreach ($vars as $k => $v)
		{
			$$k = $v;
		}

		// ��������� HTML � ������.
		ob_start();
		include "$fileName";
		return ob_get_clean();	
	}	
	
	//Выдаём ошибку, в случаи неизвестного параметра в url
	public function __call($name, $params){
        die('Ошибочный url');
	}
}
