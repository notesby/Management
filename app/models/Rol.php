<?php
	class Rol extends Elegant
	{
		protected $table = 'rol';
		protected $primaryKey = 'id';
		public $timestamps = false;
		protected $fillable = array('name');
	}
?>