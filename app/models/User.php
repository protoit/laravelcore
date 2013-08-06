<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}
	
	public function getFirstnameAttribute($value)
    {
		return utf8_decode($value);
    }
	
	public function getLastnameAttribute($value)
    {
		return utf8_decode($value);
    }
	
	public function getTitleAttribute($value)
    {
		return utf8_decode($value);
    }
	
	public static function getPicture($id, $column)
	{	
		$u = User::find($id);
		
		$userPic = 'uploads/'.$u->$column;
		$default = 'assets/img/no-image.gif';
		
		return (file_exists($userPic) && $u->$column != '') ? $userPic : $default;	
	}

}