<?php
    class config{
	   private static $instance = null ;
	   public static function getConnection() {
	   
	                                          if(!isset (self::$instance))
											  {
												  try
      											  {self::$instance = new PDO('mysql:host=localhost;dbname=projet','root','');
												   self::$instance->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
												  }
												  catch(Exception $e)
												  {die('Erreur:'.$e->getMessage());
												  } 
										       }
	   
                          return self::$instance;
	}}

?>