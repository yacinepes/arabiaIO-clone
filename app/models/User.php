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
        
        public $presenter = 'ArabiaIOClone\Presenters\UserPresenter';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password','password_temp');
        
        protected $fillable = array(
                            'email',
                            'photo',
                            'fullname',
                            'username',
                            'website',
                            'password',
                            'password_temp',
                            'code',
                            'reputation',
                            'bio',
                            'active');
        
        
        
        public function posts() 
        {
            return $this->hasMany('Post','user_id');
        }
        
        public function comments()
        {
            return $this->hasMany('Comment','user_id');
        }
        
        public function votes() 
        {
            return $this->hasMany('Vote','user_id');
        }

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

}