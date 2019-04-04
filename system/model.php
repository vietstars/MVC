<?php
class model
{	
	function __construct()
	{		
		try {
			$this->model = new database(_DBHOST,_DBNAME,_DBUSER,_DBPASS);
			sleep(_REST);
		} catch( PDOException $e ) {
		    $connect = new error();
		    $connect->false();
		    exit;
		}
	}
}