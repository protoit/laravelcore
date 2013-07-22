<?php

class LoginController extends BaseController {
	
	public function login()
	{				
		$data = array();
		
		$data['status'] = '';
				
		$input = Input::all();
				
		$rules = array(
			'username'  	=> 'required|max:50',
			'password'  	=> 'required|max:50',
		);
		
		$validation = Validator::make($input, $rules);
		
		$data['errors'] = array();
		
		if (Input::get('op'))
		{
			$credentials = array('username' => Input::get('username'), 'password' => Input::get('password'));
	
			if (Auth::attempt($credentials))
			{					
				return Redirect::to('page');
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