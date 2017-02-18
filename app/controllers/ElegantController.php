<?php
	class ElegantController extends Controller 
	{
		public function elegantSimpleInsert($modelName, $modelData = null)
		{
			$model = new $modelName;
			$modelPK = $model->getKeyName();

			if(Input::has($modelPK))
			{
				$model = $model::where($modelPK,'=',Input::get($modelPK))->first();
				if(!$model)
					return array('error'=>true,'message'=>Lang::get('messages.error_not_found'),'data'=>'');
			}

			if($modelData)
				$new = $modelData;
			else
				$new = Input::only($model->getFillable());

			if($model->validate($new,$model->$modelPK))
			{
				$model = $model->inputer($model,$new);
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

		public function elegantDelete($modelName)
		{
			$modelPK = $modelName::getKeyName();

			$model = $modelName::where($modelPK,'=',Input::get('id'))->first();
			if(!$model)
				return array('error'=>true,'message'=>Lang::get('messages.error_not_found_del'),'data'=>'');
			if($model->delete())
				return array('error'=>false,'message'=>Lang::get('messages.deleted'),'data'=>'');
			else
				return array('error'=>true,'message'=>Lang::get('messages.delete_prevented'),'data'=>'');
		}
	}
?>