<?php

namespace model;

class Hrd_model
{
	function get_user($params = array())
	{
		$sql = "select user_id, name, default_deptid from master_employee";

		if(!empty($params['user_id']))
			$where[] = "user_id = ?";
		if(!empty($params['default_deptid']))
			$where[] = "default_deptid = ?";
		if(!empty($params['name']))
			$where[] = "name like ?";

		if(count($where) >= 1)
			$sql .= " where " . implode($where, " and ") .";";
	}

	function get_department($params = array())
	{
		$sql = "select dept_id, dept_name from master_department";
		if(!empty($params['dept_id']))
			$where[] = "dept_id = ?";
		if(!empty($params['dept_name']))
			$where[] = "dept_name = ?";

		if(count($where) >= 1)
			$sql .= " where " . implode($where, " and ") .";";
	}
}