<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UserMeasurements extends Eloquent{
    protected $table = 'userMeasurements';
    
    protected $fillable = ['neck','shoulder','chest','waist','hip','inseam','height','users_id'];

    public $errors;
    
    public static $rules = [
      'neck' => 'numeric','shoulder' => 'numeric','chest' => 'numeric','waist' => 'numeric',
        'hip' => 'numeric','inseam' => 'numeric','height' => 'numeric','users_id' => 'numeric|required'
    ];
    
    public function isValid(){
            $validation = Validator::make($this->attributes, static::$rules);
            
            if($validation->passes()){
                return true;
            }
            
            $this->errors = $validation->messages();
            return false;
            
        }
    
}

