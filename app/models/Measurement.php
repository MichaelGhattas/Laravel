<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Measurement extends Eloquent{
    protected $table = 'measurements';
    
    protected $fillable = ['measurementType_id', 'cm', 'inches', 'eu', 'us'];

    public $errors;
    
    public static $rules = [
      'measurementType_id'=>'required|numeric', 'cm' => 'required|numeric'
        ,'inches'=>'required|numeric', 'eu' =>'numeric', 'us' => 'numeric'
    ];
    
    public function user()
    {
        return $this->belongsTo('User');
    }
    
    public function isValid(){
            $validation = Validator::make($this->attributes, static::$rules);
            
            if($validation->passes()){
                return true;
            }
            
            $this->errors = $validation->messages();
            return false;
            
        }
    
}
