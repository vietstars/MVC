<?php
// error là 1 inheritance [là 1 class, là 1 obj]
// error là subClass, controller là super class
// và error is-a với controller hay còn gọi là is a relationship
class error extends controller
{

	public function index()
	{	
		require _VIEW.'error/error.php';
	}

	public function notClass()
	{		
		require _VIEW.'error/class.php';
	}

	public function notMethod()
	{	
		require _VIEW.'error/method.php';
	}

	public function notView()
	{	
		require _VIEW.'error/view.php';
	}
}