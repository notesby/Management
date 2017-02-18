<?php
	class UserController extends BaseController 
	{
		public function Insert()
		{
			if(Input::get('password') != Input::get('password2'))
				return array('error'=>true,'message'=>Lang::get('messages.user_create_error'),'data'=>'');

			$new = Input::only(array('username','password','rol_id','name','email'));

			if(Input::has('id'))
			{
				if(!Input::has('password'))
					$new = Input::only(array('username','rol_id','name','email'));
				$model = User::where('id','=',Input::get('id'))->first();
				if(!$model)
					return array('error'=>true,'message'=>Lang::get('messages.error_not_found_edit'),'data'=>'');
			}
			else
				$model = new User();

			if($model->validate($new,$model->id))
			{
				$model = $model->inputer($model,$new);
				if(Input::has('active'))
					$model->active = 1;
				else
					$model->active = 0;
				if(Input::has('password'))
					$model->password = Hash::make(Input::get('password')."bienes");
				if(!$model->save())
					return array('error'=>true,'message'=>Lang::get('messages.error_save'),'data'=>'');
				else
					return array('error'=>false,'message'=>Lang::get('messages.saved'),'data'=>'');
			}
			else
			{
				$errors = $model->errors();
				return array('error'=>true,'message'=>Lang::get('messages.error_save'),'data'=>$errors);
			}
		}

		public function LogIn()
		{
			$model = User::where('username','=',Input::get('username'))->where('active','=','1')->first();
			if(!$model)
				return array('error'=>true,'message'=>Lang::get('messages.error_login'),'data'=>'');
			if(Auth::attempt(array('username' => $model->username, 'password' => Input::get('password')."bienes"),true))
				return array('error'=>false,'message'=>Lang::get('messages.success_login'),'data'=>'');
			else
				return array('error'=>true,'message'=>Lang::get('messages.error_login'),'data'=>'');
		}

		public function LogOut()
		{
			Auth::logout();
			return array('error'=>false,'message'=>'','data'=>'');
		}
	}
?>