<?php
	class MiscController extends ElegantController 
	{
		public function BrandInsert()
		{
			return $this->elegantSimpleInsert("Brand");
		}

		public function BrandDelete()
		{
			return $this->ElegantDelete("Brand");
		}

		public function BrandGetAll()
		{
			return array('error'=>false,'message'=>Lang::get('messages.result'),'data'=>Brand::all());
		}

		public function ModelInsert()
		{
			return $this->elegantSimpleInsert("Brand");
		}

		public function ModelDelete()
		{
			return $this->ElegantDelete("Brand");
		}

		public function ModelGetAll()
		{
			return array('error'=>false,'message'=>Lang::get('messages.result'),'data'=>Brand::all());
		}
	}
?>