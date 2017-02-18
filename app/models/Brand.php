<?php
	class Brand extends Elegant
	{
		protected $table = 'brand';
		protected $primaryKey = 'id';
		public $timestamps = false;
		protected $fillable = array('name');

		protected $rules = array(
			'name' => 'required|max:45|unique:brand'
		);
	}
?>