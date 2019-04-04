<?php
/*
PSR: PHP Special Request
  Chuẩn PSR-0 autoloading
  Chuẩn PSR-1 basic coding
  Chuẩn PSR-2 style coding
  Chuẩn PSR-3 logging
  Chuẩn PSR-4 autoloading cải tiến
  Chuẩn PSR-7 HTTP message
  Chuẩn PSR-11 Container interface
 */
/*
khởi tạo cho session chạy || initiate session
 */
	ob_start();
	@session_start();
/*
đặt constant cần thiết
 */
defined('S') 	|| define('S','/');
defined('_D') 	|| define('_D',DIRECTORY_SEPARATOR);
defined('_EXT') || define('_EXT','.php');
defined('_APP') || define('_APP',dirname(dirname(__FILE__))._D.'MVC'._D);
require _APP.'system\constant'._EXT;
/*
cấu hình multiple language
 */
if( !isset($_COOKIE['lg']) )
	setcookie("lg","en",false, S,$_SERVER['SERVER_NAME'], false);
/*
khởi tạo autoload cho các folder hệ thống
 */
function __autoload($class)
{
	$file=$class.'.php';
	$autoFolder=[_SYS,_CTRL,_MODEL,_VIEW];
	foreach( $autoFolder as $path )
		if( file_exists($objFile=$path.$file) )
			require $objFile;
}
//*$app là 1 instance cũng là 1 object, root() là 1 objcet
$app = new root();
