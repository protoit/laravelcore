<?php

class UserController extends BaseController {
               
   protected $layout = 'template';

   protected $user;
	  
    function __construct(User $user)
    {
	   $this->user = $user;
	}
            
	function lists()
	{
		$data = array();

		
		// Titles should be from language files
		$data['title'] 			= Lang::get('menu.reports');
		$data['title_small'] 	= Lang::get('menu.reports_sub.service_reports');
		
		$data['rows'] = $this->user->get();
				
		return View::make('users.lists', $data);
	}
	
	function add()
	{
		$data = array();

		// Titles should be from language files
		$data['title'] 			= Lang::get('menu.reports');
		$data['title_small'] 	= Lang::get('menu.reports_sub.service_reports');
	
		$input = Input::all();
		
		//Rules		
		$rules = array('username' 	 => 'required|max:50|unique:users,username',
					   'firstname' 	 => 'required|max:50',
					   'lastname' 	 => 'required|max:50',
					   'password' 	 => 'required|max:50',
					   're-password' => 'required|max:50|same:password',
					   'email' 		 => 'required|max:50|email|unique:users,email');

		
		//Validation
		$validation = Validator::make($input, $rules);
		
		$data['errors'] = array();
		
		//Submit form 			
		if (Input::get('op'))
		{
				
			if ( $validation->fails() ) {
				$data['errors'] = $validation->messages()->all();
			} else {
											
				$this->user->username 	= Input::get('username');
				$this->user->firstname 	= Input::get('firstname');
				$this->user->lastname 	= Input::get('lastname');
				$this->user->password 	= Hash::make(Input::get('password'));
				$this->user->email 		= Input::get('email');
				$this->user->status 	= Input::get('status');
				$this->user->admin 		= Input::get('admin');
				$this->user->title 		= Input::get('title');
				$this->user->address 	= Input::get('address');
				$this->user->zipcode 	= Input::get('zipcode');
				$this->user->city 		= Input::get('city');
				$this->user->tjenestenr = Input::get('tjenestenr');
				$this->user->phone 		= Input::get('phone');
				$this->user->signature 	= Input::get('signature');
				
				//Upload Photo
				if(Input::hasFile('userpic') != '') {
					$this->user->userpic = $this->uploadFile(Input::file('userpic'), str_random(30).'.png');
				}
				//Upload Signature
				if(Input::hasFile('signature') != '') {				
					$this->user->signature = $this->uploadFile(Input::file('signature'), str_random(30).'.png');
				}
				
				if ($this->user->save()) { 
					
					//use for messaging
					Session::flash('msg', 'User has been saved!');
					return Redirect::to('user/lists');
				}
		
			}
		}
		
		return View::make('users.add', $data);
	}
	
	function edit($id)
	{
		
		$data = array();
		
		// Titles should be from language files
		$data['title'] 			= Lang::get('menu.reports');
		$data['title_small'] 	= Lang::get('menu.reports_sub.service_reports');
		
		//get user info
		$info = $this->user->find($id);
		
		//Inputs
		$input 		= Input::all();
		$username 	= Input::get('username');
		$email 		= Input::get('email');
		
		//set callback
		$username_callback 	= ($username == $info->username) ? '' : '|unique:users,username';
		$email_callback 	= ($email == $info->email) ? '' : '|unique:users,email';
				
		//Rules		
		$rules = array('username' 	=> 'required|max:50'.$username_callback,
					   'firstname' 	=> 'required|max:50',
					   'lastname' 	=> 'required|max:50',
					   'email' 		=> 'required|max:50|email'.$email_callback);

		
		//Validation
		$validation = Validator::make($input, $rules);
		
		$data['errors'] = array();

		if (Input::get('op'))
		{
			if ( $validation->fails() ) {
				//$data['errors'] = $validation->messages()->all();
			} else {
				$u = User::find($id);
											
				$u->username 	= Input::get('username');
				$u->firstname 	= Input::get('firstname');
				$u->lastname 	= Input::get('lastname');
				$u->email 		= Input::get('email');
				$u->status 		= Input::get('status');
				$u->admin 		= Input::get('admin');
				$u->title 		= Input::get('title');
				$u->address 	= Input::get('address');
				$u->zipcode 	= Input::get('zipcode');
				$u->city 		= Input::get('city');
				$u->tjenestenr  = Input::get('tjenestenr');
				$u->phone 		= Input::get('phone');
				
				//Upload Photo
				if(Input::hasFile('userpic')) {
					$userpic = ($info->userpic == '') ? str_random(30).'.png' : $info->userpic;
					$u->userpic = $this->uploadFile(Input::file('userpic'), $userpic);
				}
				//Upload Signature
				if(Input::hasFile('signature')) {				
					$signature = ($info->signature == '') ? str_random(30).'.png' : $info->signature;
					echo $u->signature = $this->uploadFile(Input::file('signature'), $signature);
				}
				
				if ($u->save()) { 
					
					//use for messaging
					Session::flash('msg', 'User has been saved!');
					return Redirect::to('user/lists');
				}
			}
		}
		
		$data['info'] = $info;

		return View::make('users.edit', $data);
	}
	
	function delete($id)
	{
		$this->user->find($id)->delete();
		
		//use for messaging
		Session::flash('msg', 'User has been deleted!');						
		return Redirect::to('user/lists');
	}
	
    function uploadFile($file, $filename) {
		
		//upload photo
		if ($file)
		{
			$destinationPath  = 'uploads/';
			
			$upload_success  = $file->move($destinationPath, $filename);
			
			return $filename; 
		}
	}
  
}        