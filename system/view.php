<?php
class view
{
	protected $items = array();

	public function render( $name )
	{	
		extract( $this->items );
        require _VIEW.$name._EXT;
        exit;	
	}
    
	public function __set( $key,$value )
	{
		$this->set($key,$value );
	}
	public function __get( $value )
	{
		return $this->get($value);
	}
	public function set( $key,$value )
	{
		$this->items[$key]=$value;
	}
	public function get( $value )
	{
		return $this->items[$value];
	}
}