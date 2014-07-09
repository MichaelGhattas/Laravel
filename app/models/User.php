<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
        protected $fillable = ['firstName','secondName','email','password'];
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
        
        public $errors;
        
        public static $insertRules = [
            'email' => 'required|email|unique:users',
            'firstName' => 'required',
            'password' => 'required|min:5'
        ];
        
        public static $updateRules = [
            'firstName' => 'required',
            'password' => 'required|min:5'
        ];
        
        /**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
        
        public function isInsertValid(){
            $validation = Validator::make($this->attributes, static::$insertRules);
            
            if($validation->passes()){
                return true;
            }
            
            $this->errors = $validation->messages();
            return false;
            
        }
        
        public function isUpdateValid(){
            $validation = Validator::make($this->attributes, static::$updateRules);
            
            if($validation->passes()){
                return true;
            }
            
            $this->errors = $validation->messages();
            return false;
            
        }

}
