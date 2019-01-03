<?php

class Database
{
	var $persistant;
	var $status;
	var $result;

	function connect($config = array())
	{
		$dsn = "";
		if(!empty($config['class']))
			$dsn .= $config['class'] . ":";
		if(!empty($config['host']))
			$dsn .= "host=" . $config['host'] . ";";
		if(!empty($config['port']))
			$dsn .= "port=" . $config['port'] . ";";
		if(!empty($config['charset']))
			$dsn .= "charset=" . $config['charset'] . ";";
		if(!empty($config['db']))
			$dsn .= "dbname=" . $config['db'];

		try {
			$this->persistant = new \PDO($dsn, $config['user'], $config['pass']);
		} catch (\PDOException $e) {
			die($e->getMessage());
		}
	}

	function read($sql, $params = array())
	{
		$stmt = $this->persistant->prepare($sql);
		$result = $stmt->execute($params);

		$this->status = ($result);

		if($stmt->rowCount() > 1 )
			$this->result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		else
			$this->result = $stmt->fetch(PDO::FETCH_ASSOC);

		return $this;
	}


	function edit($sql, $params = array())
	{
		$stmt = $this->persistant->prepare($sql);
		$result = $stmt->execute($params);

		$this->status = ($result);

		return $this;
	}

	function status()
	{
		return $this->status;
	}

	function results()
	{
		return $this->result;
	}

	function insertID()
	{
		return $this->persistant->lastInsertId();
	}
}