<?php

	use OAuth\OAuth2\Token\StdOAuth2Token;

	class DashboardController extends ElegantController 
	{

		public function GetView()
		{
			return View::make('dashboard');
		}

		public function GetAsanaToken()
		{
			return "0/054350929aa7b8925330c86511998f7e";
		}

		public function GetAsanaTasks()
		{
			$ch = curl_init();

			$headers = array( 
				'Authorization: Bearer 0/054350929aa7b8925330c86511998f7e'
	        );


			// set URL and other appropriate options
			curl_setopt($ch, CURLOPT_URL, "https://app.asana.com/api/1.0/projects");
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
			//curl_setopt($ch, CURLOPT_HEADER, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			//curl_setopt($ch, CURLOPT_POST,false);
			curl_setopt($ch, CURLOPT_VERBOSE, true);

			$data = curl_exec($ch); 

			if (curl_errno($ch)) 
			{
				return "Error: " . curl_error($ch); 
	        } 
	        else { 
	            // Show me the result 
	            return $data; 
	            curl_close($ch); 
	        } 
		}
	}
?>