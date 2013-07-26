<?php

class LoginController extends BaseController {
	
	public function login()
	{				
		$data = array();
		
		$data['status'] = '';
		
		$data['errors'] = array();
		
		if (Input::get('op'))
		{
			$credentials = array('username' => Input::get('username'), 'password' => Input::get('password'));
	
			if (Auth::attempt($credentials))
			{					
				return Redirect::to('home');
			}
			else
			{
				$data['errors'] = array('error' => 'Invalid Username or Password');
			}		
		}
		
		return View::make('auth.login', $data);
	}
	
	public function logout()
	{					
		Auth::logout();
		return Redirect::to('/');
	}

	
}