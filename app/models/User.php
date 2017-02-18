<?php
	use Illuminate\Auth\UserInterface;
	use Illuminate\Auth\Reminders\RemindableInterface;
	
	class User extends Elegant implements UserInterface, RemindableInterface
	{
		protected $table = 'user';
		protected $primaryKey = 'id';
		public $timestamps = true;
		protected $fillable = array('username','password','rol_id','active','name','email','remember_token');

		protected $hidden= array('password','remember_token');

		public function getAuthIdentifier()
		{
			return $this->getKey();
		}

		public function getAuthPassword()
		{
			return $this->password;
		} 

		public function getRememberToken()
		{
			return $this->remember_token;
		}

		public function setRememberToken($value)
		{
			$this->remember_token = $value;
		}
		  
		public function getRememberTokenName()
		{
			return "remember_token";
		}
		  
		public function getReminderEmail()
		{
			return $this->email;
		}

		protected $rules = array(
			'username' => array('required','max:45','unique:user','regex:/^\S*$/'),
			'password' => 'required|min:5|max:30',
			'rol_id' => 'required|exists:rol,id',
			'name' => 'required|max:150',
			'email' => 'required|email|max:150',
			'name' => 'max:150'
		);

		public static function rules($id){
			return array(
				'username' => array('required','max:45','unique:user,username,'.$id.',id','regex:/^\S*$/'),
				'password' => 'min:5|max:30',
				'rol_id' => 'required|exists:rol,id',
				'name' => 'required|max:150',
				'email' => 'required|email|max:150',
				'name' => 'max:150'
				);
		}

		public $messsages = array(
			'username.regex'=>'El nombre de usuario debe ser solo letras.'
		);
	}
?>