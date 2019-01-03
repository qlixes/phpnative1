<?php

class Pdqa_model
{
	function get_product($params = array())
	{
		$sql = "select * from master_product";
		if(!empty($params['product_id']))
			$where[] = "product_id = ?";
		if(!empty($params['product_name']))
			$where[] = "product_name = ?";

		if(count($where) >= 1)
			$sql .= " where " . implode($where, " and ") .";";
	}

	function get_user($params = array())
	{
		$sql = "select * from v_user_module";

		if(!empty($params['dept_id']))
			$where[] = "dept_id = ?";
		if(!empty($params['user_name']))
			$where[] = "user_name like ?";
		if(!empty($params['is_active']))
			$where[] = "is_active = ?";

		if(count($where) >= 1)
			$sql .= " where " . implode($where, " and ") .";";
	}

	function add_user($params = array(), $id = null)
	{
		if($id)
		{
			foreach($params as $key => $value)
				$data[] = "$key='$value'";
			$sql = "update tbl_user set " . implode($data, ',') . " where id = $id;";
		} else {
			foreach($params as $key => $value)
			{
				$field[] = $key; $values[] = $value;
			}
			$sql = "insert into tbl_user(" . implode($field, ',') . ") values (" . implode($values) . ");";
		}
	}

	function add_user_module($params = array(), $id = null)
	{
		if($id)
		{
			foreach($params as $key => $value)
				$data[] = "$key='$value'";
			$sql = "update tbl_user_module set " . implode($data, ',') . " where id = $id;";
		} else {
			foreach($params as $key => $value)
			{
				$field[] = $key; $values[] = $value;
			}
			$sql = "insert into tbl_user(" . implode($field,',') . ") values (" . implode($values, ',') . ");";
		}
	}

	function delete_user($id)
	{
		$sql = "update tbl_user set is_active = 0 where id = $id;";
	}

	function add_master_standar_analisa($params = array(), $id = null)
	{
		if($id)
		{
			foreach($params as $key => $value)
				$data[] = "$key='$value'";
			$sql = "update tbl_master_standar_analisa set " . implode($data, ',') . " where id = $id;"; . 
		} else {
			foreach($params as $key => $value)
			{
				$field[] = $key; $values[] = $value;
			}
			$sql = "insert into tbl_master_standar_analisa(" . implode($field, ',') . ") values (" . implode($values, ',') . ");";
		}
	}

	function get_master_standar_analisa($params = array())
	{
		$sql = "select * from tbl_master_standar_analisa";
		foreach($params as $key => $value)
			$where[] = "$key=$value";

		if(count($where) >= 1)
			$sql .= " where " . implode($where, " and ") . ";";
	}
}