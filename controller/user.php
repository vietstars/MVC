<?php
/*
định nghĩa user là 1 class
đây cũng là 1 class và cũng là 1 object
user chính là is-a với controller (is a relationship)
user chính là has-a với account (has a relationship)
user thể hiện là 1 sự đa hình của account
 */

class user extends controller implements account
{
	
	function __construct()
	{
		parent::__construct();
	}

	// getUserInfo được gọi là 1 method
	public function getProfile( $_id=false )
	{
		if( $_id )
		{
			
		}else{
			var_dump('Please method user id');
		}
	}

	public function register()
	{
		if( $_POST )
		{
			foreach( $_POST as $v )
			{
				if( $v == '' )
				{
					header('location: '.URL);
					exit;
				}
			}
			if( $_POST['password'] != $_POST['repassword'])
			{
				header('location: '.URL);
				exit;
			}
			$salt=$this->user_salt();
			$newUser = array(
				'username' 	=> $_POST['username'],
				'salt' 		=> $salt,
				'secret'	=> md5(md5($_POST['password']).$salt),
				'email'		=> filter_var($_POST['email'],FILTER_SANITIZE_EMAIL)
			);
			if( !$this->model->table('user')->info($newUser)->insert() )
			{
				header('location: '.URL);
				exit;
			}		
		}
		$this->view->userList = $this->model->table('user')->get('id,username,created_at')->multi()->select();
	}

}