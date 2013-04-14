<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Helper
 *
 * @author mshakeel
 */
class Helper
{
	private static $_instance;
	
	// Can't be created outside
	private function __construct()
	{}
	
	/**
	 * Returns the singleton object of this class
	 * @return Helper
	 */
	public static function getInstance()
	{
		if (self::$_instance == null)
		{
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	
	public function printObj($obj)
	{
		echo '<pre>';
		print_r($obj);
		echo '</pre>';
	}
}

?>
