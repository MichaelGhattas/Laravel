<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UsersHasSizes extends Eloquent{
    protected $table = 'users_has_sizes';
    
    protected $fillable = ['sizes_id', 'users_id'];

    public $errors;
    
    public static $rules = [
      'sizes_id'=>'required|numeric', 'users_id' => 'required|numeric'
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