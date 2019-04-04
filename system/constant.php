<?php
/*
constant sử dụng cho datetime
 */
	// set thời gian cho php lấy time theo múi giờ
	date_default_timezone_set("Asia/Ho_Chi_Minh");
	//config datetime
	defined('_NOW')		|| define('_NOW',time());
	defined('_DATE')	|| define('_DATE',date('Y-m-d H:i:s'));

/*
constant sử dụng cho server
 */ 
	defined('_SYS') 	|| define('_SYS', _APP.'system'._D);
	defined('_CTRL')	|| define('_CTRL',_APP.'controller'._D); 
	defined('_MODEL') 	|| define('_MODEL',_APP.'model'._D); 
	defined('_VIEW') 	|| define('_VIEW',_APP.'view'._D); 
	defined('_ASSETS') 	|| define('_ASSETS',_APP.'assets'._D); 
	defined('_IMG')		|| define('_IMG',_ASSETS.'img'._D); 
	defined('_THUMB')	|| define('_THUMB',_ASSETS.'img'._D.'thumb'._D); 
	//config database
	defined('_DBHOST')	|| define('_DBHOST','127.0.0.1');
	defined('_DBNAME')	|| define('_DBNAME','mvc_db');
	defined('_DBUSER')	|| define('_DBUSER','root');
	defined('_DBPASS')	|| define('_DBPASS','');
	defined('_PRE')		|| define('_PRE','tb_');
	defined('_REST')	|| define('_REST',1);

/*
constant sử dụng cho network
 */
	//đặt địa chỉ tương đối cho URL nếu là tuyệt đối thì dùng http:// hoặc https://
	defined('URL') 		|| define('URL',''.S.S.$_SERVER['SERVER_NAME'].S);
	defined('IMG')		|| define('IMG',URL.'assets/img/');
	defined('THUMB')	|| define('THUMB',URL.'assets/img/thumb/');
	defined('CSS')		|| define('CSS',URL.'assets/css/');
	defined('JS')		|| define('JS',URL.'assets/js/');




// var_dump(is_dir(_CTRL));
// var_dump(file_exists(_CTROLLER));
// var_dump(_SYS);
