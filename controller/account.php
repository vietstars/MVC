<?php
/*
định nghĩa account là 1 interface
interface thì có quyền extends 1 interface khác
account đóng gói 2 methods là getProfile và register
 */

interface account 
{
	public function getProfile($id);

	public function register();
}