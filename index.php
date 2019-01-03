<?php

define('BASEPATH', __DIR__ . DIRECTORY_SEPARATOR);

require BASEPATH . 'helper' . DIRECTORY_SEPARATOR . 'common.php';

// logic business
class Page extends Common
{
	function __construct()
	{
		parent::__construct();
	}

	function login()
	{
	}

	function logout()
	{}

	function forgot()
	{}

	function notifications()
	{}

	function master_user()
	{}

	function user()
	{}

	function error404()
	{}

	function menu()
	{
	}

	function employee()
	{}

	function department()
	{}

	function product()
	{}
}

$init = new Page();