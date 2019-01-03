<?php

class Common
{
	static $classes = array();

	var $load;
	var $config;
	var $input;

	function __construct()
	{
		$this->load =& $this;
		$this->config = $this->_load('config', 'helper');
	}

	function _load($class, $path)
	{
		$classes =  ucfirst($class);

		if(!file_exists(BASEPATH . $path . DIRECTORY_SEPARATOR . "{$class}.php"))
			die(BASEPATH . $path . DIRECTORY_SEPARATOR . "{$class}.php not found");
		
		require BASEPATH . $path . DIRECTORY_SEPARATOR . "{$class}.php";

        if(empty(self::$classes[$class]))
            self::$classes[$class] = new $classes();

        return self::$classes[$class];
	}

	function session($alias)
	{

	}

	function post($alias)
	{

	}

	//localhost/index.php/login/?param1=1&param2=2
	function router()
	{
		$uri_path = str_replace($_SERVER['SCRIPT_NAME']. '/', '', $_SERVER['PHP_SELF']);
		$shortcut = ($uri_path === $_SERVER['SCRIPT_NAME']) ? 'errors/index' : $uri_path;

		list($method, $params) = explode('/', $shortcut);

		if(!method_exists($this, $method))
			die("{$method} not exist");
	}

	function model($model)
	{
		$this->{$model} = $this->_load($mode, 'model');
	}

	function view($view, $data = array(), $return = false)
	{
		foreach($data as $key => $value)
			$$key = $value;

		ob_start();
		if(!file_exist(BASEPATH . "{$view}.php"))
			die("{$view}.php not found");
		include BASEPATH . "{$view}.php";
		$template = ob_get_contents();
		ob_end_clean();

		if($return)
			echo $template;
		else
			return $template;
	}
}