<?php
    require 'config.php';
	class Conexion extends Mysqli
	{
		public function __construct()
		{
			parent::__construct(HOST,USER_NAME,PASS,DB_NAME);// METODO CONSTRUCTOR PADRE
			$this->set_charset('utf8');
			$this->connect_errno ? die('error al conectar') : '';//print 'se conecto pues';
			//var_dump($this->get_charset());
		}
	}
?>
