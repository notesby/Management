<?php
	class ClientFiscal extends Elegant
	{
		protected $table = 'client_fiscal';
		protected $primaryKey = 'id';
		public $timestamps = true;
		protected $fillable = array('user_id','black_listed','rfc','moral','name','last_name',
			'email','state','city','street','suburb','number_int','number_ext','postal_code',
			'phone','cellphone','comment','invoice_day','discount');

		protected $rules = array(
			'rfc' => 'required|min:12|max:13|unique:client_fiscal,rfc',
			'moral' => 'required|integer|min:0|max:1',
			'name' => 'required|max:255',
			'last_name' => 'max:100',
			'email' => 'required|max:200',
			'state' => 'required|max:100',
			'city' => 'required|max:100',
			'street' => 'required|max:200',
			'suburb' => 'required|max:200',
			'number_int' => 'max:15',
			'number_ext' => 'required|max:15',
			'postal_code' => 'required|integer',
			'phone' => 'max:30',
			'cellphone' => 'max:30',
			'comment' => 'max:500',
			'invoice_day' => 'required|min:0|max:6',
			'discount' => 'required|numeric'
			);

		public static function rules($id){
		    return array(
	            'rfc' => array('required','min:12','max:13','unique:client_fiscal,rfc,'.$id.',id'),
	            'moral' => 'required|integer|min:0|max:1',
				'name' => 'required|max:255',
				'last_name' => 'max:100',
				'email' => 'required|max:200',
				'state' => 'required|max:100',
				'city' => 'required|max:100',
				'street' => 'required|max:200',
				'suburb' => 'required|max:200',
				'number_int' => 'max:15',
				'number_ext' => 'required|max:15',
				'postal_code' => 'required|integer',
				'phone' => 'max:30',
				'cellphone' => 'max:30',
				'comment' => 'max:500',
				'invoice_day' => 'required|min:0|max:6',
				'discount' => 'numeric'
		        );
		}
	}
?>