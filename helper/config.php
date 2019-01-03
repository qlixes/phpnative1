<?php

require 'helper.php';

class Config
{
	var $_config = array();

	function __construct()
	{
		$this->_config = check_class(BASEPATH . 'config' . DIRECTORY_SEPARATOR . 'database');
	}

	function items($alias)
	{
		return $this->_config[$alias];
	}
}