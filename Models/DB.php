<?php
class DB
{
	public $pdo;
	private $host;
	private $db;
	private $user;
	private $password;
	private $charset;

	function __construct()
	{
		$this->host     = 'localhost';
		$this->db       = 'multicomercioYupa';
		$this->user     = 'root';
		$this->password = "";
		$this->charset  = 'utf8';
		try {
			$connection = "mysql:host=".$this->host.";dbname=". $this->db.";charset=".$this->charset;
			$options = [
				PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_EMULATE_PREPARES   => false,
			];
			$this->pdo = new PDO($connection, $this->user, $this->password, $options);
			return $this->pdo;
		} catch (PDOException $e) {
			print_r('Error connection:'.$e->getMessage());
		}
	}
	function create($attr, $tabla, $datos, $param)
	{
		try {
			$query = 'INSERT INTO ' . $tabla . $attr . ' VALUES(' . $datos . ');';
			$sth = $this->pdo->prepare($query);
			$acc = $sth->execute($param);
			return $acc;
		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}
	function read($atributos, $tabla, $addquery)
	{
		try {
			if ($addquery == "") {
				$query = "SELECT ".$atributos." FROM ".$tabla; //echo $query;
			} else {
				$query = "SELECT ".$atributos." FROM ".$tabla.$addquery;
			}
			$db = $this->pdo->prepare($query);
			$db->execute();
			$respuesta = $db->fetchAll(PDO::FETCH_ASSOC);
			return $respuesta;
		} catch (PDOExepcion $e) {
			return $e->getMessage();
		}
		$pdo = null;
	}

	function update($condicion, $tabla, $param)
	{
		try {
			$querr = 'UPDATE ' . $tabla . ' SET ' . $param . $condicion;
			$sth = $this->pdo->prepare($querr);
			$resultado = $sth->execute();
			return $resultado;
		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}
	function eliminar($table, $condicion)
	{
		try {
			$query = 'DELETE FROM ' . $table . $condicion;
			$sth = $this->pdo->prepare($query);
			$respuesta = $sth->execute();
			return $respuesta;
		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}
}
