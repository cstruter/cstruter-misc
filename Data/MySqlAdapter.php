<?php

namespace CSTruter\Misc\Data; 

use PDO;

/**
 * Class for Executing MySQL Based Queries (Still very primitive)
 *
 * @package CSTruter\Misc\Data
 * @author Christoff Truter <christoff@cstruter.com>
 * @copyright 2005-2015 CS Truter
 * @version 0.0.1
*/
class MySqlAdapter
{
	private $pdo;
	
	public function __construct($host, $database, $username, $password) {
		$this->pdo = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);
	}
	
	public function execute($query, array $parameters = NULL)
	{
		$cmd = $this->pdo->prepare($query);			
		$cmd->execute($parameters);
		return $cmd->fetchAll(PDO::FETCH_ASSOC);
	}
}

?>